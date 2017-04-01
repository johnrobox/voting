<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_notification_controller extends CI_Controller{
    public function myApproved_List(){
        $this->load->view('admin_notification/myApproved_List');
    }
    public function myApproved(){
        $this->load->view('admin_notification/myApproved');
    }
    public function admin_request_notification_view(){
        $this->load->view('admin_notification/admin_request_notification_view');
    }//end of function
    
    public function admin_request_notification(){
            $this->load->view('admin_notification/admin_request_notification');
    }//end of function
    public function show_manila_time(){
            $this->load->view('admin_notification/show_manila_time');
    }//end of function
    
    public function system_user_control(){
            $this->load->view('admin_notification/system_user_control'); 
    }// end of function
    
    public function admin_message_notification_unread(){
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_notification/admin_UnreadMessage_notification',$data); 
    }// end of function
    
    public function admin_message_list_unread_notification(){
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_notification/admin_ListMessage_notification',$data);
    }//end of function
    
    public function approved_election_notification(){
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_notification/approved_Election_notification',$data);
    }// end of function
    
    public function approved_election_view_details(){
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_notification/approved_Election_view_details',$data);
    }// end of function
    
    public function pending_election_notification(){
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_notification/pending_Election_notification',$data);
    }// end of function
    
    public function pending_list(){
        $this->load->view('admin_notification/pending_list');
    }
    public function pending_list_view(){
        $this->load->view('admin_notification/pending_list_view');
    }
    
    public function pending_election_view_details(){
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_notification/pending_election_view_details',$data);
    }// end of function
    
    public function user_login_status_notification(){
            $data['querys_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_notification/user_login_notification',$data);
    }// end of function
    
    
}
?>
