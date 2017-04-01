<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Team_controller extends CI_Controller{
    public function create_team(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Create Team';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/team/create_team',$data);
            $this->load->view('admin_modal/team_modal/create_team_modal');
            $this->load->view('admin_modal/team_modal/update_team_modal');
            $this->load->view('admin_modal/team_modal/delete_team_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');  
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function create_team_exec(){
        $teamName   = strtoupper($this->input->post('teamName'));
        $electionId =    $this->input->post('electionId');
        $this->team_model->create_team_exec($teamName,$electionId);
    }//end of function
    public function update_team(){
        $teamName   =   strtoupper($this->input->post('teamName'));
        $teamId =   $this->input->post('teamId');
        $this->team_model->update_team_exec($teamName,$teamId);
    }//end of function
    public function delete_team(){
        $teamId =   $this->input->post('teamId');
        $this->team_model->delete_team_exec($teamId);
    }
}
?>