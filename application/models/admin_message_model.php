<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_message_model extends CI_Model{
    
    
    function admin_own_message(){
         $this->db->order_by('message_id','desc');
        $this->db->where('message_recipient_id',$this->session->userdata('user_id'));
        $adminMessage       =   $this->db->get('admin_message');
        return $adminMessage->result();
    }
    function admin_own_sentbox(){
         $this->db->order_by('message_id','desc');
        $this->db->where('message_sender_id',$this->session->userdata('user_id'));
        $adminMessageSent       =   $this->db->get('admin_message');
        return $adminMessageSent->result();
    }
    function read_admin_message_exec($messageId) {
        $data   =   array('message_status'=>0);
        $this->db->where('message_id',$messageId);
        $this->db->update('admin_message',$data);
        redirect(base_url().'admin_inbox');
        exit();
    }
    function replyCustomer_exec($messageId,$message){
        $this->db->where('id',$messageId);
        $query = $this->db->get('costumer_message');
        foreach($query->result() as $row){
            $to = $row->costumer_email;
        }
        $subject = "This is the reply of your message in us.";
        $header = "From:johnrobertjerodiaz@gmail.com \r\n";
        $retval = mail ($to,$subject,$message,$header);
           if( $retval == true )  
           {
               $this->session->set_userdata(array('message_sent_success'=>'Message sent successfully....'));
               redirect(base_url().'guest_message');
               exit();
           }
           else
           {
               $this->session->set_userdata(array('message_sent_error'=>'Message could not be sent...'));
               redirect(base_url().'guest_message');
               exit();
           }
    }
    function delete_admin_message_exec($messageId){
        $newdata    =   array('message_receiver_status'=>0);
            $this->db->where('message_id',$messageId);
            $this->db->update('admin_message',$newdata);
            $data   =   array('delete_message_okay'=>'Message was successfully deleted');
            $this->session->set_userdata($data);
            redirect(base_url().'admin_inbox');
            exit();
    }
    function delete_sentbox_message_exec($messageId){
        $newdata    =   array('message_source_status'=>0);
            $this->db->where('message_id',$messageId);
            $this->db->update('admin_message',$newdata);
            $data   =   array('delete_message_okay'=>'Message was successfully deleted');
            $this->session->set_userdata($data);
            redirect(base_url().'admin_sentbox');
            exit();
    }
    
}