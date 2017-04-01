<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Candidate_model extends CI_Model{

    function register_candidate_exec($schoolId,$firstName,$middleName,$lastName,$electionId,$positionId,$teamId){
        $this->session->set_userdata(array('LastElectionId'=>$electionId));
        $data = array(
            'voters_schoolid'   =>  $schoolId,
            'voters_firstname'  =>  $firstName,
            'voters_middlename' =>  $middleName,
            'voters_lastname'   =>  $lastName
        );
        $query  =   $this->db->get_where('voter_member',$data);
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                $votersId = $rows->voters_id;
            }
            $newdata    =   array(
                'candidate_voters_u_id' =>  $votersId,
                'candidate_election_id' =>  $electionId
            );
            $queryCandidateExist    =   $this->db->get_where('candidate_member',$newdata);
            if($queryCandidateExist->num_rows()==0){
                $verynewdata    =   array(
                   'candidate_voters_u_id' =>  $votersId,
                   'candidate_election_id' =>  $electionId, 
                   'candidate_position_id' => $positionId,
                   'candidate_team_id'  =>  $teamId,
                   'candidate_registered_by'    =>  $this->session->userdata('user_id')
                );
                $this->db->insert('candidate_member',$verynewdata);
                $this->session->set_userdata(array('candidate_registered_success'=>$firstName.' successfuly registered.'));
                redirect(base_url().'register_candidates');
                exit();
            }else{
              $this->session->set_userdata(array('candidate_exist'=>'The candidate was already registered.'));
              redirect(base_url().'register_candidates');
              exit();  
            }
        }else{
            $this->session->set_userdata(array('wrong_credentials'=>'You/v Inputed a wrong candidates.'));
            redirect(base_url().'register_candidates');
            exit();
        }
    }//end of function
    
    function register_independent_candidate_exec($schoolId,$firstName,$middleName,$lastName,$electionId,$positionId){
        $data = array(
            'voters_schoolid'   =>  $schoolId,
            'voters_firstname'  =>  $firstName,
            'voters_middlename' =>  $middleName,
            'voters_lastname'   =>  $lastName
            );
        $query = $this->db->get_where('voter_member',$data);
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $votersId = $row->voters_id;
            }
             $newdata    =   array(
                'candidate_voters_u_id' =>  $votersId,
                'candidate_election_id' =>  $electionId
            );
            $queryCandidateExist    =   $this->db->get_where('candidate_member',$newdata);
            if($queryCandidateExist->num_rows()==0){
                $verynewdata    =   array(
                   'candidate_voters_u_id' =>  $votersId,
                   'candidate_election_id' =>  $electionId, 
                   'candidate_position_id' => $positionId,
                   'candidate_team_id'  =>  0,
                   'candidate_registered_by'    =>  $this->session->userdata('user_id')
                );
                $this->db->insert('candidate_member',$verynewdata);
                $this->session->set_userdata(array('candidate_registered_success'=>$firstName.' successfuly registered.'));
                redirect(base_url().'register_candidates');
                exit();
            }else{
              $this->session->set_userdata(array('candidate_exist'=>'The candidate was already registered.'));
              redirect(base_url().'register_candidates');
              exit();  
            }
        }else{
            $this->session->set_userdata(array('wrong_credentials'=>'You/v Inputed a wrong candidates.'));
            redirect(base_url().'register_candidates');
            exit();
        }
        
    }
    
    function update_candidate_exec($pageTitle,$schoolId,$firstName,$middleName,$lastName,$electionId,$positionId,$teamId,$candidateId){
        $this->session->set_userdata(array('LastElectionId'=>$electionId));
        $data = array(
            'voters_schoolid'   =>  $schoolId,
            'voters_firstname'  =>  $firstName,
            'voters_middlename' =>  $middleName,
            'voters_lastname'   =>  $lastName
        );
        $query  =   $this->db->get_where('voter_member',$data);
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                $votersId = $rows->voters_id;
            }
            $newdata   =   array(
                    'candidate_id'  =>  $candidateId,
                    'candidate_voters_u_id' =>  $votersId,
                    'candidate_election_id' =>  $electionId, 
                    'candidate_position_id' => $positionId,
                    'candidate_team_id'  =>  $teamId,
                );
            $queryCheckChanges  =   $this->db->get_where('candidate_member',$newdata);
            if($queryCheckChanges->num_rows()>0){
                $this->session->set_userdata(array('nothing_change'=>'Nothing Change.'));
                if($pageTitle=='OV Register Candidates'){
                    redirect(base_url().'register_candidates');
                    exit();
                }else{
                    redirect(base_url().'view_candidates');
                    exit();
                }
            }else{
                $this->db->where('candidate_voters_u_id',$votersId);
                $this->db->where('candidate_election_id',$electionId);
                $queryExistCandidate    =   $this->db->get('candidate_member');
                if($queryExistCandidate->num_rows()>0){
                    $this->session->set_userdata(array('candidate_exist'=>'The candidate was already registered.'));
                    if($pageTitle=='OV Register Candidates'){
                        redirect(base_url().'register_candidates');
                        exit();
                    }else{
                        redirect(base_url().'view_candidates');
                        exit();
                    }
                }else{
                   $verynewdata    =   array(
                           'candidate_voters_u_id' =>  $votersId,
                           'candidate_election_id' =>  $electionId, 
                           'candidate_position_id' => $positionId,
                           'candidate_team_id'  =>  $teamId,
                           'candidate_registered_by'    =>  $this->session->userdata('user_id')
                        );
                   $this->db->where('candidate_id',$candidateId);
                   $this->db->update('candidate_member',$verynewdata);
                   $this->session->set_userdata(array('candidate_updated_success'=>'Candidate was updated successfuly.'));
                   if($pageTitle=='OV Register Candidates'){
                        redirect(base_url().'register_candidates');
                        exit();
                   }else{
                        redirect(base_url().'view_candidates');
                        exit();
                   }
                }
            }
        }else{
            $this->session->set_userdata(array('wrong_credentials'=>'You/v Inputed a wrong candidates.'));
            if($pageTitle=='OV Register Candidates'){
                    redirect(base_url().'register_candidates');
                    exit();
            }else{
                    redirect(base_url().'view_candidates');
                    exit();
            }
        }
        
        
    }//end of function
    
    function delete_candidate_exec($pageTitle,$candidateId,$electionId){
        $this->session->set_userdata(array('LastElectionId'=>$electionId));
        $this->db->where('candidate_id',$candidateId);
        $this->db->delete('candidate_member');
        $this->session->set_userdata(array('delete_candidate_okay'=>'Candidate successfuly deleted.'));
        if($pageTitle=='OV Register Candidates'){
            redirect(base_url().'register_candidates');
            exit();
        }else{
            redirect(base_url().'view_candidates');
            exit();
        }
    }
}
?>
