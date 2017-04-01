<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Position_model extends CI_Model{
    function create_position_exec($positionName,$electionId)
    {
        $this->db->where('election_id',$electionId);
                $getElectionTable   =   $this->db->get('election');
                foreach($getElectionTable->result() as $erow){
                    $electionName   =   $erow->election_name;
                }
        $data   =   array(
            'position_election_id'=>$electionId,
            'position_name'=>$positionName
            );
        $query  =   $this->db->get_where('eposition',$data);
        if($query->num_rows()>0){
		$newdata    =   array('create_position_exist'=>$positionName.' position is already exist in '.$electionName);
                $this->session->set_userdata($newdata);
                redirect(base_url().'create_position');
                exit();
	}else{
            if($this->session->userdata('user_id')==1){
                $screening  =   1;}
            else{ $screening  =   0; }
            $newdatas = array(
                'position_election_id'=>$electionId,
                'position_name'=>$positionName,
                'position_screening'=>$screening,
                'position_created_by'    => $this->session->userdata('user_id')
                );
            //insert first the most important position info
            $this->db->insert('eposition',$newdatas);
            //session message to alert
                $newdata    =   array('create_position_okay'=>'<span style="text-decoration: underline;">'.$positionName.'</span> has been added to '.$electionName.'.');
                $this->session->set_userdata($newdata); 
                redirect(base_url()."create_position"); 
                exit();
        }
        
    }//end of function
    
    function approved_position_exec($positionId){
        $this->db->where('position_id',$positionId);
        $this->db->update('eposition',array('position_screening'=>1,'position_notify'=>1));
        $this->session->set_userdata(array('position_approved_success'=>'Position has been successfuly approved.'));
        redirect(base_url().'create_position');
        exit();
    }//end of function
    function update_position_exec($positionId,$positionName,$pageTitle){
        $checkChanges   =   $this->db->get_where('eposition',array('position_id'=>$positionId,'position_name'=>$positionName));
        if($checkChanges->num_rows()>0){
            $this->session->set_userdata(array('position_name_not_change'=>$positionName.' nothing change.'));
            if($pageTitle=='OV Create Position'){
                redirect(base_url().'create_position');
                exit();
            }else{
                redirect(base_url().'view_positions');
                exit();
            }
        }else{
            $this->db->where('position_id',$positionId);
            $query  =   $this->db->get('eposition');
            foreach($query->result() as $positionRows){
                $electionId =   $positionRows->position_election_id;
            }
            $data   =   array('position_election_id'=>$electionId,'position_name'=>$positionName);
            $checkExist =   $this->db->get_where('eposition',$data);
            if($checkExist->num_rows()>0){
                $this->session->set_userdata(array('position_already_exist'=>$positionName.' is already exist.'));
                if($pageTitle=='OV Create Position'){
                    redirect(base_url().'create_position');
                    exit();
                }else{
                    redirect(base_url().'view_positions');
                    exit();
                }
            }else{ 
                $this->db->where('position_id',$positionId);
                $this->db->update('eposition',array('position_name'=>$positionName));
                $this->session->set_userdata(array('position_update_success'=>$positionName.' has been updated successfuly.'));
                if($pageTitle=='OV Create Position'){
                    redirect(base_url().'create_position');
                    exit();
                }else{
                    redirect(base_url().'view_positions');
                    exit();
                }
            }
        }
    }//end of function
    function delete_position_exec($positionId,$pageTitle){
        $this->db->where('position_id',$positionId);
        $this->db->delete('eposition');
        //delete position from candidate members table
        $this->db->where('candidate_position_id',$positionId);
        $this->db->delete('candidate_member');
        $this->session->set_userdata(array('position_deleted_success'=>$positionName.' has deleted successfuly in election '.$electionName));
        if($pageTitle=='OV Create Position'){
            redirect(base_url().'create_position');
            exit();
        }else{
            redirect(base_url().'view_positions');
            exit();
        }
    }//end of function
    
}
?>