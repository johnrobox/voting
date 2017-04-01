<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Election_model extends CI_Model{
    
    function create_election_exec($ElectionName,$ElectionDescription){
        
        $electionData   =   array(
            'election_name' =>  $ElectionName,
            'election_description'  =>  $ElectionDescription,
            'election_date_created' =>  date("h:i:sa").' | '.date("l").' '.date("Y-m-d")
        );
        
        //insert data
        $this->db->insert('election',$electionData);
        //get data
        $query  =   $this->db->get_where('election',$electionData);
        foreach($query->result() as $row){
            $id =   $row->election_id;
        }
        $this->session->unset_userdata(array('key'=>''));
        if($this->session->userdata('user_role') == 1){
            $election_info   =   array(
                    'election_u_id' =>  $id,
                    'election_created_by'  => $this->session->userdata('user_id'),
                    'election_status'   =>  0,
                    'election_screening'    =>  1,
                );
        }
        else{
            $election_info   =   array(
                    'election_u_id' =>  $id,
                    'election_created_by'  => $this->session->userdata('user_id'),
                    'election_status'   =>  0,
                    'election_screening'    =>  0,
                );
        }
        
        $this->db->insert('election_info',$election_info);
	$newdata    =   array(
            'create_election_okay'  =>   '<b>'.$ElectionName.' </b>has been created.'
        ); 
        $manageVoterData    =   array(
            'manage_election_id'    =>  $id,
            'bs_ed' =>  1,
            'be_ed' =>  1,
            'bs_crim'   =>  1,
            'bs_mare'   =>  1,
            'bs_mt' =>  1,
            'bs_ce' =>  1,
            'bs_ee' =>  1,
            'bs_me' =>  1,
            'bs_it' =>  1,
            'bs_ba' =>  1,
            'bs_hrm'    =>  1,
            'bs_n'  =>  1,
            'a_hrm'   =>  1,
            'a_ct'    =>  1
        );
        $this->db->insert('election_voter_management',$manageVoterData);
        $this->session->set_userdata($newdata);
        header("location:".base_url()."create_election");
        exit(); 
    }//end of function
    function update_election($electionName,$electionDescription,$electionId,$returnPage){
        $query = $this->db->get_where('election',array('election_id'=>$electionId,'election_name'=>$electionName));
        if($query->num_rows()==1){
            $this->db->where('election_id',$electionId);
            $this->db->update('election',array('election_description'=>$electionDescription));
            $newdata    =   array('update_election_okay'  =>  '<b>'.$electionName.'</b> Election has been updated.');
            $this->session->set_userdata($newdata);
                if($returnPage=='OV Create Election'){
                    header('location:'.base_url().'create_election');
                    exit();  
                }else if($returnPage=='OV View Elections'){
                    header('location:'.base_url().'view_elections');
                    exit();  
                }
        }else{
            $this->db->where('election_name',$electionName);
            $queryExist = $this->db->get('election');
            if($queryExist->num_rows==0){
                $data = array('election_name'=>$electionName,'election_description'=>$electionDescription);
                $this->db->where('election_id',$electionId);
                $this->db->update('election',$data);
                $newdata    =   array('update_election_okay'  =>  '<b>'.$electionName.'</b> Election has been updated.');
                $this->session->set_userdata($newdata);
                    if($returnPage=='OV Create Election'){
                        header('location:'.base_url().'create_election');
                        exit();  
                    }else if($returnPage=='OV View Elections'){
                        header('location:'.base_url().'view_elections');
                        exit();  
                    }
            }else{
                $this->session->set_userdata(array('election_exist'=>$electionName.' is already exist.'));
                if($returnPage=='OV Create Election'){
                        header('location:'.base_url().'create_election');
                        exit();  
                    }else if($returnPage=='OV View Elections'){
                        header('location:'.base_url().'view_elections');
                        exit();  
                    }
            }
        }
        
    }//end of function
    function delete_election_exec($electionId,$returnPage)
    {
       $this->db->where('election_id',$electionId);
       $query   =   $this->db->get('election');
       foreach($query->result() as $rows){
           $electionDeleted =   $rows->election_name;
       }
       $this->db->where('election_id',$electionId);
       $this->db->delete('election');
       $this->db->where('election_u_id',$electionId);
       $this->db->delete('election_info');
       $this->session->set_userdata(array('delete_election_okay'   =>  '<b>'.$electionDeleted.'</b> election successfuly deleted.'));
       $this->db->where('position_election_id',$electionId);
       $this->db->delete('eposition');
       $this->db->where('team_election_id',$electionId);
       $this->db->delete('team');
       if($returnPage=='OV Create Election'){
                        header('location:'.base_url().'create_election');
                        exit();  
           }else if($returnPage=='OV View Elections'){
                    header('location:'.base_url().'view_elections');
                    exit();  
                }
    }//end of function
    function electionname_getall()
    {
        $this->db->order_by('election_id','asc');
        $this->db->select('*');
        $this->db->from('election');
        $this->db->join('election_info', 'election_info.election_u_id = election.election_id');
        $querys  =   $this->db->get();
        return $querys->result();
    }//end of function
    function manage_election_exec($electionId,$request){
        if($request=='start'){
            // get number of position in selected election
            $this->db->where('position_election_id',$electionId);
            $query  =   $this->db->get('eposition');
            $numberOfPosition   =   $query->num_rows();
            // get number of team in selected election
            $this->db->where('team_election_id',$electionId);
            $query1 =   $this->db->get('team');
            $numberOfTeam   =   $query1->num_rows();
            //
            $this->db->where('candidate_team_id',0);
            $this->db->where('candidate_election_id',$electionId);
            $query3 =   $this->db->get('candidate_member');
            $independent = $query3->num_rows();
            // get number of candidates in selected election
            $this->db->where('candidate_election_id',$electionId);
            $query2 =   $this->db->get('candidate_member');
            $numberOfCandidate  =   $query2->num_rows();
            $numberOfCandidate = $numberOfCandidate - $independent;
            if($numberOfPosition==0||$numberOfTeam==0){
                $this->session->set_userdata(array('election_request_error'=>'Cannot start election, maybe the election has no candidates registered.'));
                redirect(base_url().'admin_homepage');
                exit();
            }
            if ($numberOfCandidate==$numberOfPosition*$numberOfTeam){
                $data   =   array('election_started_by'=>$this->session->userdata('user_id'),'election_status'=>1);
                $this->db->where('election_u_id',$electionId);
                $this->db->update('election_info',$data);
                $this->session->set_userdata(array('election_request_success'=>'Election Started Successfuly.'));
                redirect(base_url().'admin_homepage');
                exit();
            }else{
                $this->session->set_userdata(array('election_request_error'=>'Cannot start election, maybe some position that has no candidates registered.'));
                redirect(base_url().'admin_homepage');
                exit();
            }
        }//end of first if
        if($request=='stop'){
            $data   =   array('election_stoped_by'=>$this->session->userdata('user_id'),'election_status'=>0);
                $this->db->where('election_u_id',$electionId);
                $this->db->update('election_info',$data);
                $this->session->set_userdata(array('election_request_success'=>'Election Stoped Successfuly.'));
                redirect(base_url().'admin_homepage');
                exit();
        }//end of stop if
        if($request=='cancel'){
            $data   =   array('election_screening'=>5);
                $this->db->where('election_u_id',$electionId);
                $this->db->update('election_info',$data);
                $this->session->set_userdata(array('election_request_success'=>'Election Canceled Successfuly.'));
                redirect(base_url().'admin_homepage');
                exit();
        }//end of cancel if
        if($request=='resume'){
            $data   =   array('election_screening'=>0);
                $this->db->where('election_u_id',$electionId);
                $this->db->update('election_info',$data);
                $this->session->set_userdata(array('election_request_success'=>'Election Resume Successfuly.'));
                redirect(base_url().'admin_homepage');
                exit();
        }//end of approved if
        if($request=='approve'){
            $data   =   array('election_screening'=>1,'election_notify'=>1);
                $this->db->where('election_u_id',$electionId);
                $this->db->update('election_info',$data);
                $this->session->set_userdata(array('election_request_success'=>'Election Approved Successfuly.'));
                redirect(base_url().'admin_homepage');
                exit();
        }
    }//end of function
}
?>
