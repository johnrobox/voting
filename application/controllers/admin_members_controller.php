<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_members_controller extends CI_Controller{
    public function index(){
        if  ((($this->session->userdata('user_id')=='')&&
            ($this->session->userdata('user_firstname')==''))&&
            (($this->session->userdata('user_lastname')=='')&&
            ($this->session->userdata('user_username')==''))&&
            (($this->session->userdata('user_role')=='')&&
            ($this->session->userdata('logged_in')=='')))
        {
            $this->load->view('admin_format/login_header');
            $this->load->view('admin_content/login');
            $this->load->view('admin_modal/admin_request_disabled_account_modal');
        }else{
            redirect(base_url().'admin_homepage');
        }
        
    }// end of function
    public function admin_login_exec(){
        $validate_user  =   array(
            array(
            'field' =>  'username',
            'label' =>  'User Name',
            'rules' =>  'required|xss_clean'
                ),
            array(
                'field' =>  'password',
                'label' =>  'Password',
                'rules' =>  'required|xss_clean'
            )
        );
        $this->form_validation->set_rules($validate_user);
        if($this->form_validation->run()==FALSE){
            $this->index();
        }
        else{
        $username   =   $this->input->post('username');
        $password   =   $this->input->post('password');
        $result =   $this->admin_member_model->admin_login_exec($username,$password);  
        if($result){
            header('location:'.base_url().'admin_homepage');
        }
        else{
            $this->index();
        }
        }
    }//end of function
    public function view_admin_users(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV View-admin Member';
            $this->load->model('admin_model');
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['query_user'] =   $this->admin_member_model->admin_users_getall();
            $this->load->view('admin_content/admin_member/view_all_admin_users',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_modal/admin_modal/enable_disable_admin_user_modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }//end of function
    public function manage_user_admin(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $id =   $this->input->post('id');
            $access =   $this->input->post('access');
            $this->admin_member_model->manage_user_admin_exec($id,$access);
        }else{ redirect(base_url().'admin');}
    }//end of function
    public function admin_settings(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Admin Settings';
            $this->load->model('admin_model');
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['queryAdminInfo'] =   $this->admin_member_model->adminUserAccountInfo();
            $this->load->view('admin_content/admin_member/admin_settings',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }//end of function
    public function admin_change_info(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $id =   $this->input->post('id');
            $admin_Password  =   $this->input->post('admin_Password');
            $admin_Username =   $this->input->post('admin_Username');
            $admin_Email    =   $this->input->post('admin_Email');
            $admin_Firstname    =   $this->input->post('admin_Firstname');
            $admin_Lastname =   $this->input->post('admin_Lastname');
            $admin_Gender   =   $this->input->post('admin_Gender');
            $admin_Website  =   $this->input->post('admin_Website');
            $this->admin_member_model->admin_change_info_exec($id,$admin_Password,$admin_Username,$admin_Email,$admin_Firstname,$admin_Lastname,$admin_Gender,$admin_Website);
        }else{ redirect(base_url().'admin');}
    }//end of 
    
    public function admin_change_password(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $id    =   $this->input->post('id');
            $adminNewPassword    =   $this->input->post('admin_Password');
            $adminNewPasswordRepeate    =   $this->input->post('admin_PasswordRepeate');
            $adminOldPassword    =   $this->input->post('admin_OldPassword');
            $this->admin_member_model->admin_change_password_exec($id,$adminNewPassword,$adminNewPasswordRepeate,$adminOldPassword);
        }else{ redirect(base_url().'admin');} 
    }//end of function
        
    public function add_admin_member(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Add-admin Member';
            $this->load->model('admin_model');
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $this->load->view('admin_content/admin_member/add_admin_member');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }
    public function add_admin_member_exec(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $addAdminValidation =   array(
                array(
                'field' =>  'admin_Username',
                'label' =>  'Username',
                'rules' =>  'trim|required|min_length[5]|max_length[12]|is_unique[admin_member_account.admin_username]|xss_clean'
                    ),
                array(
                    'field' =>  'admin_Email',
                    'label' =>  'Admin Email',
                    'rules' =>  'required|valid_email'
                ),
                array(
                    'field' =>  'admin_Firstname',
                    'label' =>  'First name',
                    'rules' =>  'trim|required'
                ),
                array(
                    'field' =>  'admin_Lastname',
                    'label' =>  'Last name',
                    'rules' =>  'trim|required'
                ),
                array(
                    'field' =>  'admin_Gender',
                    'label' =>  'Gender',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'admin_Password',
                    'label' =>  'Password',
                    'rules' =>  'trim|required|matches[admin_PasswordRepeate]'
                ),
                array(
                    'field' =>  'admin_PasswordRepeate',
                    'label' =>  'Repeate Password',
                    'rules' =>  'trim|required'
                )
            );
            $this->form_validation->set_rules($addAdminValidation);
            if($this->form_validation->run()==FALSE){
                $this->add_admin_member();
            }else{
            $username   =   $this->input->post('admin_Username');
            $email  =   $this->input->post('admin_Email');
            $firstname  = ucwords(strtolower($this->input->post('admin_Firstname')));
            $lastname   = ucwords(strtolower($this->input->post('admin_Lastname'))); 
            $gender =   $this->input->post('admin_Gender');
            $website    =   $this->input->post('admin_Website');
            $password   =   $this->input->post('admin_Password');
            $passwordrepeate    =   $this->input->post('admin_PasswordRepeate');
            $role   =   $this->input->post('admin_Role');
            $this->admin_member_model->add_admin_member_exec($username,$email,$firstname,$lastname,$gender,$website,$password,$role);
        }
        }else{ redirect(base_url().'admin');}
    }//end of function
    
    public function admin_logout(){ 
        $this->admin_member_model->admin_logout(); 
    }// end of function
    
    
    
}
?>
