<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Team_model extends CI_Model{

    function create_team_exec($teamName,$electionId){
        $this->db->where('election_id',$electionId);
            $querye =   $this->db->get('election');
            foreach($querye->result() as $row){
                $electionName   =   $row->election_name;
            }
        $data   =   array(
            'team_election_id'  =>  $electionId,
            'team_name' =>  $teamName
        );
        $query  =   $this->db->get_where('team',$data);
        if($query->num_rows()>0){
            $this->session->set_userdata(array('team_name_exist'=>$teamName.' is already exist in '.$electionName));
            redirect(base_url().'create_team');
            exit();
        }else{
            $newdata    =   array(
                    'team_election_id'  =>  $electionId,
                    'team_name' =>  $teamName,
                    'team_created_by'   =>  $this->session->userdata('user_id')
                );
            $this->db->insert('team',$newdata);
            $this->session->set_userdata(array('team_created_success'=>$teamName.' has been created in '.$electionName));
            redirect(base_url().'create_team');
            exit();
        }
    }//end of function 
    
    function update_team_exec($teamName,$teamId){
        $this->db->where('team_id',$teamId);
        $query  =   $this->db->get('team');
        foreach($query->result() as $row){
            if($row->team_name==$teamName){
                $this->session->set_userdata(array('team_nothing_change'=>'<i class="fa fa-info"></i> '.$teamName.' , Nothing has change.'));
                redirect(base_url().'create_team');
                exit();
            }else{
                $this->db->where('team_election_id',$row->team_election_id);
                $this->db->where('team_name',$teamName);
                $queryAgain =   $this->db->get('team');
                if($queryAgain->num_rows()>0){
                    $this->session->set_userdata(array('team_update_exist'=>'<i class="fa fa-times"></i> '.$teamName.' is already exist.'));
                    redirect(base_url().'create_team');
                    exit();
                }else{
                    $this->db->where('team_id',$teamId);
                    $this->db->update('team',array('team_name'=>$teamName));
                    $this->session->set_userdata(array('team_update_okay'=>'<i class="fa fa-check"></i> '.$teamName.' already has been modify.'));
                    redirect(base_url().'create_team');
                    exit();
                }
            }
        }
    }//end of function
    
    function delete_team_exec($teamId){
        $this->db->where('team_id',$teamId);
        $this->db->delete('team');
        $this->db->where('candidate_team_id',$teamId);
        $this->db->delete('candidate_member');
        $this->session->set_userdata(array('delete_team_okay'=>'<i class="fa fa-check"></i> Team has been successfuly deleted.'));
        redirect(base_url().'create_team');
        exit();
    }
}