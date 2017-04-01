<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_message_controller extends CI_Controller{
    public function guest_message(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Guest Messages';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $this->load->view('admin_content/admin_member/guest_message');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/guest_modal/view_guest_message_modal');
            $this->load->view('admin_modal/guest_modal/reply_guest_message_modal');
            $this->load->view('admin_modal/guest_modal/delete_guest_message_modal');
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }
    public function readCustomerMessage(){
        $this->db->where('id',$this->input->post('costumerMessage'));
        $this->db->update('costumer_message',array('costumer_message_status'=>1));
        redirect(base_url().'guest_message');
        exit();
    }
    public function deleteCustomerMessage(){
        $this->db->where('id',$this->input->post('costumerMessage'));
        $this->db->delete('costumer_message');
        $this->session->set_userdata(array('Guest_message_delete_success'=>'Guest message successfuly deleted.'));
        redirect(base_url().'guest_message');
        exit();
    }
    public function replyCustomerMessage(){
        $messageId = $this->input->post('costumerMessage');
        $message = $this->input->post('message');
        $this->admin_message_model->replyCustomer_exec($messageId,$message);
    }
    public function send_administrator_request(){
        $firstname  =   $this->input->post('firstname');
        $middlename  =   $this->input->post('middlename');
        $lastname  =   $this->input->post('lastname');
        $username  =   $this->input->post('username');
        $password  =   $this->input->post('password');
        $this->admin_model->send_administrator_request_exec($firstname,$middlename,$lastname,$username,$password);
    }//end of function
    
    public function send_admin_message_exec(){
        date_default_timezone_set("Asia/Manila");
        $data   =   array(
            'message_content'   =>  $this->input->post('message'),
            'message_recipient_id'  =>  $this->input->post('recipient'),
            'message_sender_id' =>  $this->session->userdata('user_id'),
            'message_date_sent' =>  date("Y-m-d").' '.date("l"),
            'message_time_sent' =>  date("h:i:sa"),
            'message_status'    =>  1,
            'message_source_status' =>  1,
            'message_receiver_status'   =>  1
        );
        $this->db->insert('admin_message',$data);
        $newdata    =   array('message_sent_okay'=>'Your message was successfully sent.');
        $this->session->set_userdata($newdata); 
        $pageReturn =   $this->input->post('pageReturn');
        if($pageReturn=='OV Dashboard'){
            redirect(base_url().'admin_homepage');
            exit();
        } else if($pageReturn=='OV Create Election'){
            redirect(base_url().'create_election');
            exit();
        } else if($pageReturn=='OV Create Position'){
            redirect(base_url().'create_position');
            exit();
        } else if($pageReturn=='OV Create Team'){
            redirect(base_url().'create_team');
            exit();
        } else if($pageReturn=='OV Register Voters'){
            redirect(base_url().'register_voters');
            exit();
        } else if($pageReturn=='OV Register Candidates'){
            redirect(base_url().'register_candidates');
            exit();
        } else if($pageReturn=='OV View Elections'){
            redirect(base_url().'view_elections');
            exit();
        } else if($pageReturn=='OV View Positions'){
            redirect(base_url().'view_positions');
            exit();
        } else if($pageReturn=='OV View Candidates'){
            redirect(base_url().'view_candidates');
            exit();
        } else if($pageReturn=='OV View Voters'){
            redirect(base_url().'view_voters');
            exit();
        } else if($pageReturn=='OV View Election Result'){
            redirect(base_url().'view_election_result');
            exit();
        } else if($pageReturn=='OV Add-admin Member'){
            redirect(base_url().'add_admin');
            exit();
        } else if($pageReturn=='OV View-admin Member'){
            redirect(base_url().'view_admin_users');
            exit();
        } else if($pageReturn=='OV Admin Settings'){
            redirect(base_url().'admin_settings');
            exit();
        } else if($pageReturn=='OV Admin Inbox'){
            redirect(base_url().'admin_inbox');
            exit();
        } else if($pageReturn=='OV Admin Sentbox'){
            redirect(base_url().'admin_sentbox');
            exit();
        } else {
            redirect(base_url().'admin_sentbox');
            exit();
        }
    }
    
    public function read_admin_message(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $messageId  =   $this->input->post('message_id');
            $this->admin_message_model->read_admin_message_exec($messageId);
        }else{ redirect(base_url().'admin');}
    }
    public function admin_inbox(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Admin Inbox';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $this->load->view('admin_content/admin_member/admin_inbox');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_message_modal/view_message_modal');
            $this->load->view('admin_modal/admin_message_modal/reply_message_modal');
            $this->load->view('admin_modal/admin_message_modal/delete_message_modal');
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
        
    }
    public function delete_admin_message(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $messageId= $this->input->post('message_id');
            $this->admin_message_model->delete_admin_message_exec($messageId);
        }else{ redirect(base_url().'admin');}
    }
    public function admin_sentbox(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Admin Sentbox';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['adminMessageSent']   =   $this->admin_message_model->admin_own_sentbox();
            $this->load->view('admin_content/admin_member/admin_sentbox',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/resend_sentbox_modal',$data);
            $this->load->view('admin_modal/admin_message_modal/delete_sentbox_modal');
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
        
    }
    public function delete_sentbox_message(){
       if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
           $messageId   =   $this->input->post('message_id');
           $this->admin_message_model->delete_sentbox_message_exec($messageId);
       }else{ redirect(base_url().'admin');}   
    }
    public function inable_request(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
           $requestId   =   $this->input->post('requestId');
           $this->admin_message_model->inable_request_exec($requestId);
       }else{ redirect(base_url().'admin');}
    }

}
?>
