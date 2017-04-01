<?php

class User_model extends CI_Model{
    function send_message_to_admin_exec($firstname,$lastname,$email,$message){
        $data = array(
            'costumer_firstname'    =>  $firstname,
            'costumer_lastname' =>  $lastname,
            'costumer_email'    =>  $email,
            'costumer_message'  =>  $message,
            'costumer_message_status' => '0',
            'default_reciever'  =>  1
        );
        $this->db->insert('costumer_message',$data);
        $this->session->set_userdata(array('costumer_message_sent'=>'<i class="fa fa-check"></i> Message successfuly sent.'));
        redirect(base_url());
        exit();
    }
    function check_studentId_exec($id){
        $this->db->where('voters_schoolid',$id);
        $query  =   $this->db->get('voter_member');
        if($query->num_rows()==1){
            foreach($query->result() as $row){
                $uId    =   $row->voters_id;
            }
            $this->db->where('registered_voters_u_id',$uId);
            $queryExist =   $this->db->get('registered_voter');
            if($queryExist->num_rows()>0){
                $this->session->set_userdata(array('Member_Already_Registered'=>'SCHOOL ID is already registered.'));
                redirect(base_url());
                exit ();
            }else{
                $newdata    =   array('VOTERS_ID_REGISTER'=>$id);
                $this->session->set_userdata($newdata);
                redirect(base_url().'voters_registration_form');
                exit();
            }
        }
        else{
            $this->session->set_userdata(array('SCHOOL_ID_NOT_FOUND'=>'School ID not found.'));
            redirect(base_url());
            exit ();
        }
    }
 
    
    function check_for_correct_info($uschoolid,$upassword,$uusername,$ufirstName,$umiddleName,$ulastName,$ubDay,$ubMonth,$ubYear,$ugender,$ucStatus,$ucitizenShip,$uaddress,$uemail,$ucontactNo,$ucourse,$ufatherFirstname,$ufatherLastname,$umotherFirstname,$umotherLastname){
        $data   =   array(
               'voters_schoolid'    =>  $uschoolid,
               'voters_firstname'   =>  $ufirstName,
               'voters_middlename'  =>  $umiddleName,
               'voters_lastname'    =>  $ulastName,
               'voters_birthday'    =>  $ubDay,
               'voters_birthmonth'  =>  $ubMonth,
               'voters_birthyear'   =>  $ubYear,
               'voters_course'      =>  $ucourse,
               'voters_fatherfirstname' =>  $ufatherFirstname,
               'voters_fatherlastname'  =>  $ufatherLastname,
               'voters_motherfirstname' =>  $umotherFirstname,
               'voters_motherlastname'  =>  $umotherLastname,
               'voters_gender'      =>  $ugender,
            
        );
        $query_for_correct_member  =   $this->db->get_where('voter_member',$data);
        if($query_for_correct_member->row_array()==true){
                                         //generate passcode=================================================================
                         do{
                             $counter=0;
                                  function generatePassword ($length = 10)
                                     {

                                        // start with a blank password
                                        $password = "";
                                        $possible = "12346789ABCDFGHJKLMNPQRTVWXYZ";

                                        $maxlength = strlen($possible);

                                        if ($length > $maxlength) {
                                          $length = $maxlength;
                                        }

                                        // set up a counter for how many characters are in the password so far
                                        $i = 0; 

                                        // add random characters to $password until $length is reached
                                        while ($i < $length) { 

                                          // pick a random character from the possible ones
                                          $char = substr($possible, mt_rand(0, $maxlength-1), 1);

                                          // have we already used this character in $password?
                                          if (!strstr($password, $char)) { 
                                            // no, so it's OK to add it onto the end of whatever we've already got...
                                            $password .= $char;
                                            // ... and increase the counter by one
                                            $i++;
                                          }

                                        }

                                        // done!
                                        return $password;
                                }

                                $votes = generatePassword (10); //whatever length 
                                //check if the generated passcode is allready exist
                                    if($votes != '') {
                                        $this->db->where('registered_voters_code',$votes);
                                        $qrys111 = $this->db->get('registered_voter');
                                        if($qrys111->num_rows()>0)
                                        {
                                          $counter = 1;
                                        }
                                        else {
                                          $counter  =   0;
                                        }
                                }

                         } while($counter==1);//generating and cheecking for existing passcode ends here
                         //=====================================================================================
                         $this->db->where('voters_schoolid',$uschoolid);
                         $queryUid  =   $this->db->get('voter_member');
                         foreach($queryUid->result() as $vRow){
                             $votersUId =   $vRow->voters_id;
                         }
                            $ready_to_register =   array('registered_voters_u_id'=>$votersUId,
                                                         'registered_voters_password'=>$upassword,
                                                         'registered_voters_code'=>$votes,
                                                         'registered_voters_username'=>$uusername,
                                                         'registered_voters_date'=>date("h:i:sa").' | '.date("l").' '.date("Y-m-d"));
                            $this->db->insert('registered_voter',$ready_to_register);
                            $newdata   =   array('registeredCode'=>$votes,'registeredName'=>$ufirstName);
                             $this->session->set_userdata($newdata);
                            redirect(base_url().'registered_finish');
                            exit ();
            
        } // this close is end for credentials error
        
        else{
            $newdata2   =   array('not_member_error'=>'Credentials inputted did not match.');
            $this->session->set_userdata($newdata2);
            redirect(base_url().'voters_registration_form');
            exit();
        }
    } // this is close for the function 
    
//============================================================================================================================
    
    function validate_voters_exec($votersIdNo,$votersUserName,$votersPassCode,$votersPassword){
        $this->db->where('voters_schoolid',$votersIdNo);
        $queryId    =   $this->db->get('voter_member');
        if($queryId->num_rows()>0){
            foreach($queryId->result() as $row){
                $uId    =   $row->voters_id;
                $uCourse    =   $row->voters_course;
            }
            $data   =   array(
                'registered_voters_u_id'    =>  $uId,
                'registered_voters_password'=>  $votersPassword,
                'registered_voters_code'    =>  $votersPassCode,
                'registered_voters_username'=>  $votersUserName
            );
            $queryVoters    =   $this->db->get_where('registered_voter',$data);
            if($queryVoters->num_rows()>0){
                $this->session->set_userdata($data);
                $this->session->set_userdata(array('registered_voters_course'=>$uCourse));
                redirect(base_url().'choose_election');
                exit();
            }else{
                $this->session->set_userdata(array('wrong_credentials'=>'Mismatch given Information.'));
                redirect(base_url());
                exit();
            }
        }else{
            $this->session->set_userdata(array('wrong_credentials'=>'Mismatch given Information.'));
            redirect(base_url());
            exit();
        }
        
    }
//==========================================================================================================
    function show_election_started(){
        
        $this->db->order_by('election_id','asc');
        $this->db->where('election_status',1);
        $this->db->select('*');
        $this->db->from('election');
        $this->db->join('election_info', 'election_info.election_u_id = election.election_id');
        $query  =   $this->db->get();
        return $query->result();
    }
    
    
    
    
}
?>
