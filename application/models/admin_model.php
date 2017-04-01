<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_model extends CI_Model{
    
    
   
    function send_administrator_request_exec($firstname,$middlename,$lastname,$username,$password){
        $data   =   array(
            'admin_firstname'   =>  $firstname,
            'admin_lastname'    =>  $lastname,
            'admin_username'    =>  $username,
            'admin_password'    => md5($password)
        );
        $query  =   $this->db->get_where('admin_member_account',$data);
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $this->db->where('contributor_id',$row->admin_id);
                $checkExistRequest  =   $this->db->get('admin_request');
                if($checkExistRequest->num_rows()>0){
                    $requestExist   =   array('request_exist'=>'You have been already requested. You can only request once.');
                    $this->session->set_userdata($requestExist);
                    redirect(base_url().'admin');
                    exit();
                }else{
                $newdata = array(
                    'contributor_id'    =>  $row->admin_id,
                    'request'   => 'Enable account'
                );
                $this->db->insert('admin_request',$newdata);
                $requestokay    =   array('request_successfuly_sent'=>'Your request has been successfuly sent!');
                $this->session->set_userdata($requestokay);
                redirect(base_url().'admin');
                exit();
                }//end of else
            }//end of foreach
        }else{
                $requesterror   =   array('request_error'=>'Your request is not send! Maybe the information you\'ve inputed was incorrect.');
                $this->session->set_userdata($requesterror);
                redirect(base_url().'admin');
                exit();
        }
    }
    
    
   
    
}
?>
