<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * author   :   JOHNRO
 */

 class User_index_controller extends CI_Controller{
     public function index()
     {    
         $newdata   =   array('VOTERS_ID_REGISTER'=>'');
         $this->session->unset_userdata($newdata);
         $data['title'] = "Online Voting System";
         $this->load->view('user_format/header',$data);
         $this->load->view('user_content/index');
         $this->load->view('user_modal/registration_modal');
         $this->load->view('user_modal/vote_modal');
         $this->load->view('user_modal/election_statistic_result_modal');
         $this->load->view('user_modal/costumer_contact_us_modal');
         $this->load->view('user_modal/register_video_modal');
         $this->load->view('user_modal/vote_video_modal');
         $this->load->view('user_format/footer');
     }
     public function sample()
     {
         $newdata   =   array('VOTERS_ID_REGISTER'=>'');
         $this->session->unset_userdata($newdata);
         $this->load->view('user_format/header1');
         $this->load->view('user_format/nav');
         $this->load->view('user_content/homepage');
         $this->load->view('user_modal/registration_modal');
         $this->load->view('user_modal/vote_modal');
         $this->load->view('user_modal/election_statistic_result_modal');
         $this->load->view('user_modal/costumer_contact_us_modal');
         $this->load->view('user_format/footer');
     }
     public function check_id_for_register()
     {
         $id   =    $this->input->post('student_id');
         $this->user_model->check_studentId_exec($id);  
     }
     public function voters_registration_form()
     {   
         if($this->session->userdata('VOTERS_ID_REGISTER')!=''){
         $this->load->view('user_content/register_form');
         }else{
             redirect(base_url());
             exit();
         }
     }
     public function check_for_correct_voters()
     {
        $newdata    =   array( 
            array(
                'field' =>  'password',
                'label' =>  'Password',
                'rules' =>  'required|is_unique[registered_voter.registered_voters_password]|min_length[8]'
            ),
            array(
                'field' =>  'username',
                'label' =>  'Username',
                'rules' =>  'required|is_unique[registered_voter.registered_voters_username]|min_length[3]'
            ),
            array(
                'field' =>  'firstName',
                'label' =>  'First Name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'middleName',
                'label' =>  'Middle Name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'lastName',
                'label' =>  'Last Name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'bDay',
                'label' =>  'Day',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'bMonth',
                'label' =>  'Month',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'bYear',
                'label' =>  'Year',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'gender',
                'label' =>  'Gender',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'cStatus',
                'label' =>  'Status',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'citizenShip',
                'label' =>  'Citizenship',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'address',
                'label' =>  'Address',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'email',
                'label' =>  'Email',
                'rules' =>  'required|valid_email'
            ),
            array(
                'field' =>  'contactNo',
                'label' =>  'Contact no',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'course',
                'label' =>  'Course',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'address',
                'label' =>  'Address',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'fatherFirstname',
                'label' =>  'Father/s First name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'fatherLastname',
                'label' =>  'Father/s Last name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'motherFirstname',
                'label' =>  'Mother/s First name',
                'rules' =>  'required'
            ),
            array(
                'field' =>  'motherLastname',
                'label' =>  'Mother/s Last name',
                'rules' =>  'required'
            )
            
            
        );
        $this->form_validation->set_rules($newdata);
        if($this->form_validation->run()==FALSE){
            $this->voters_registration_form();
        }else{ 
        $uschoolid  =   $this->input->post('schoolId');
        $upassword  =   $this->input->post('password');
        $uusername  =   $this->input->post('username');
        $ufirstName  = ucwords(strtolower($this->input->post('firstName')));
        $umiddleName  =   ucwords(strtolower($this->input->post('middleName')));
        $ulastName  =   ucwords(strtolower($this->input->post('lastName')));
        $ubDay  =   $this->input->post('bDay');
        $ubMonth  =   $this->input->post('bMonth');
        $ubYear  =   $this->input->post('bYear');
        $ugender  =   $this->input->post('gender');
        $ucStatus  =   $this->input->post('cStatus');
        $ucitizenShip  = strtolower($this->input->post('citizenShip'));
        $uaddress  =   strtolower($this->input->post('address'));
        $uemail  =   $this->input->post('email');
        $ucontactNo  =   $this->input->post('contactNo');
        $ucourse  =   $this->input->post('course');
        $ufatherFirstname  = ucwords(strtolower($this->input->post('fatherFirstname')));
        $ufatherLastname  =   ucwords(strtolower($this->input->post('fatherLastname'))); 
        $umotherFirstname  =   ucwords(strtolower($this->input->post('motherFirstname')));
        $umotherLastname  =   ucwords(strtolower($this->input->post('motherLastname')));
        $this->user_model->check_for_correct_info($uschoolid,$upassword,$uusername,$ufirstName,$umiddleName,$ulastName,$ubDay,$ubMonth,$ubYear,$ugender,$ucStatus,$ucitizenShip,$uaddress,$uemail,$ucontactNo,$ucourse,$ufatherFirstname,$ufatherLastname,$umotherFirstname,$umotherLastname); 
         }
     }
     
     public function registered_finish(){
         if(($this->session->userdata('registeredCode')!='')&&($this->session->userdata('registeredName')!='')){
             $data['title'] = "OVS - Generated Passcode";
             $this->load->view('user_format/private_header',$data);
             $this->load->view('user_content/view_generated_code');
             $this->load->view('user_format/private_footer');
         }else{
             redirect(base_url());
         }
     }
     public function validate_voters (){
        $votersIdNo =   $this->input->post('idno');
        $votersUserName =   $this->input->post('username');
        $votersPassCode =   $this->input->post('passcode');
        $votersPassword =   $this->input->post('password');
        $this->user_model->validate_voters_exec($votersIdNo,$votersUserName,$votersPassCode,$votersPassword);
     }
     public function choose_election(){
        if((($this->session->userdata('registered_voters_u_id')!='')&&($this->session->userdata('registered_voters_password')!=''))&&(($this->session->userdata('registered_voters_code')!='')&&($this->session->userdata('registered_voters_username')!=''))){
            $data['title'] = "OVS - Choose Election";
             $this->load->view('user_format/private_header',$data);
            $data['query']  =   $this->user_model->show_election_started();
            $this->load->view('user_content/view_started_election',$data);
            $this->load->view('user_format/private_footer');
        }else{
            redirect(base_url());
            exit();
        }
     }
     public function session_electionChoosen(){
        if((($this->session->userdata('registered_voters_u_id')!='')&&($this->session->userdata('registered_voters_password')!=''))&&(($this->session->userdata('registered_voters_code')!='')&&($this->session->userdata('registered_voters_username')!=''))){
            $data   =   array(
                'electionId_Choosen'=>$this->input->post('electionId'),
                'electionName_Choosen'=>$this->input->post('electionName'),
                'electionTable_Choosen'=>$this->input->post('electionTable'));
            $this->session->set_userdata($data);
            redirect(base_url().'view_balots');
            exit();
        }else{
            redirect(base_url());
            exit();
        }
     }
     public function view_balots(){
      if((($this->session->userdata('registered_voters_u_id')!='')&&($this->session->userdata('registered_voters_password')!=''))&&(($this->session->userdata('registered_voters_code')!='')&&($this->session->userdata('registered_voters_username')!=''))){ 
            $data['title'] = "OVS - Ballot";
            $this->load->view('user_format/private_header',$data);
            $this->load->view('user_content/view_balots');
            $this->load->view('user_format/private_footer');
       }else{
         redirect(base_url());
           exit();
       }
     }
     public function view_balotsN(){
        if((($this->session->userdata('registered_voters_u_id')!='')&&($this->session->userdata('registered_voters_password')!=''))&&(($this->session->userdata('registered_voters_code')!='')&&($this->session->userdata('registered_voters_username')!=''))){
            $date = date("h:i:sa").' | '.date("l").' '.date("Y-m-d");
            $this->db->where('voters',$this->session->userdata('registered_voters_code'));
            $this->db->where('election_id',$this->session->userdata('electionId_Choosen'));
            $queryExist = $this->db->get('election_result');
            if($queryExist->num_rows()==0){
                $this->db->where('position_election_id',$this->session->userdata('electionId_Choosen'));
                $query = $this->db->get('eposition');
                foreach($query->result() as $row){
                    $votes = array(
                    'voters'=>$this->session->userdata('registered_voters_code'),
                    'election_id'=>$this->session->userdata('electionId_Choosen'),
                    'position_id'=>$row->position_id,
                    'candidate_id'=>$this->input->post($row->position_id),
                    'date_voted'=>$date );
                    $this->db->insert('election_result',$votes);
                }
                $newdata    =   array('vote_success'=>'<i>You have successfully submitted your votes. Thank you for voting. Please <a href="logout_voter" style="color:#004e49;"><u>Logout.</u></i>');
                    $this->session->set_userdata($newdata);
                    redirect(base_url().'view_balots');
                    exit();
            }else{
                $newdata    =   array('already_vote'=>'<i>You already submitted your votes. Please <a href="logout_voter" style="color:#004e49;"><u>Logout.</u></a></i>');
                $this->session->set_userdata($newdata);
                redirect(base_url().'view_balots');
                exit();
            }
            
            
                            
                       ;
                        
            
        }else{
            redirect(base_url());
            exit();
        }
     }//end of function
     
     
     public function send_message_to_admin(){
         $firstname =   $this->input->post('cfirstname');
         $lastname  =   $this->input->post('clastname');
         $email =   $this->input->post('cemail');
         $message   =   $this->input->post('cmessage');
         $this->user_model->send_message_to_admin_exec($firstname,$lastname,$email,$message);
     }
     public function statistic(){
         $this->load->view('statistic');
     }
     
     public function logout_voter(){
         $newdata   =   array(
             'registered_voters_u_id'   =>  '',
             'registered_voters_password'   =>  '',
             'registered_voters_code'   =>  '',
             'registered_voters_course' =>  '',
             'registered_voters_username'   =>  '',
             'voters_status'=>FALSE,
             'electionId_Choosen'=>'',
             'electionName_Choosen'=>'',
             'electionTable_Choosen'=>''
         );
         
         $this->session->unset_userdata($newdata);
         $this->session->sess_destroy();
         redirect(base_url());
         exit();
     }
     
     
     
     
     
 }
 


?>
