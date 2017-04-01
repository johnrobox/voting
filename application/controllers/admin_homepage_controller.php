<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_homepage_controller extends CI_Controller{
    

    
    public function admin_homepage(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - Dashboard';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $data['querys_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_content/admin_member/admin_index',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/election_modal/manage_elections_modal');
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_message_modal/view_message_modal');
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }
    
    
}
?>
