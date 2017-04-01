<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Position_controller extends CI_Controller{
    public function view_positions(){
       if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV View Positions';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/position/view_positions',$data);
            $this->load->view('admin_modal/position_modal/update_position_modal');
            $this->load->view('admin_modal/position_modal/approve_position_modal');
            $this->load->view('admin_modal/position_modal/delete_position_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }
    public function create_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Create Position';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/position/create_position',$data);
            
            $this->load->view('admin_modal/position_modal/create_position_modal');
            $this->load->view('admin_modal/position_modal/approve_position_modal');
            $this->load->view('admin_modal/position_modal/update_position_modal');
            $this->load->view('admin_modal/position_modal/delete_position_modal');
            
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }//end of function
    public function view_pending_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - Pending Position';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/position/pending_position',$data);
            $this->load->view('admin_modal/position_modal/update_position_modal');
            $this->load->view('admin_modal/position_modal/approve_position_modal');
            $this->load->view('admin_modal/position_modal/delete_position_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }
    public function view_myApproved_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - My Approved Position';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/position/myApproved_position',$data);
            $this->load->view('admin_modal/position_modal/update_position_modal');
            $this->load->view('admin_modal/position_modal/approve_position_modal');
            $this->load->view('admin_modal/position_modal/delete_position_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }
    public function create_position_exec(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $positionName   =   ucwords(strtolower($this->input->post('positionName')));
            $electionId   =   $this->input->post('electionId');
            $this->position_model->create_position_exec($positionName,$electionId);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function approved_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $positionId =   $this->input->post('positionId');
            $this->position_model->approved_position_exec($positionId);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function update_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $positionId =   $this->input->post('positionId');
            $positionName =   $this->input->post('positionName');
            $pageTitle  =   $this->input->post('title');
            $this->position_model->update_position_exec($positionId,$positionName,$pageTitle);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function delete_position(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $positionId =   $this->input->post('positionId');
            $pageTitle  =   $this->input->post('title');
            $this->position_model->delete_position_exec($positionId,$pageTitle);
        }else{ header('location:'.base_url().'admin');}
    }
    
}
?>