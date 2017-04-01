<?php

class Admin_member_model extends CI_Model{
            function admin_login_exec($username,$password){ 
                    //Function to sanitize values received from the form. Prevents SQL injection
                    function clean($str) {
                            $str = @trim($str);
                            if(get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                            }
                            return mysql_real_escape_string($str);
                    }	
                    $data   =   array(
                        'admin_username'    =>  clean($username),
                        'admin_password'    =>  md5(clean($password))
                    );
                    $query  =   $this->db->get_where('admin_member_account',$data);
                    if($query->num_rows()>0){
                        foreach($query->result() as $rows){
                            $id =   $rows->admin_id;
                            $firstname  =   $rows->admin_firstname;
                            $lastname   =   $rows->admin_lastname;
                            $username   =   $rows->admin_username;
                            $email  =   $rows->admin_email;
                        }// end of foreach
                        $this->db->where('admin_u_id',$id);
                        $newQuery  =   $this->db->get('admin_member_information');
                        foreach($newQuery->result() as $rowss){
                                $role   =   $rowss->admin_role;
                                $access =   $rowss->admin_access;
                        }//end of foreach
                        $newdata    =   array(
                                'user_id'   =>  $id,
                                'user_firstname'    =>  $firstname,
                                'user_lastname' =>  $lastname,
                                'user_username' =>  $username,
                                'user_email'    =>  $email,  
                                'user_role' =>  $role,
                                'logged_in' =>  TRUE
                            );// end of array
                        if($access==0){
                            $this->session->set_userdata('error_logged_in','Your account is disabled by the Administrator. <br> <a href="#request" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-earphone"></span>&nbsp;Click here to send request to the Administrator </a>');
                            return false;
                        }// end of IF - condition of accessability of the system user
                        else{
                        $this->session->set_userdata($newdata);
                        $data   =   array(
                            'admin_status'=>1,
                            'admin_last_login'=>date("h:i:sa").' | '.date("l").' '.date("Y-m-d")
                            );
                        $this->db->where('admin_u_id',$id);
                        $this->db->update('admin_member_information',$data);
                        return true;
                        }
                    }// end of IF query for inputed username and password
                    $this->session->set_userdata('error_logged_in','Incorrect Username / Password');
                    return false;

                } // end of functions
    
     function admin_users_getall()
    {
        $this->db->order_by('admin_lastname','asc');
        $this->db->select('*');
        $this->db->from('admin_member_account');
        $this->db->join('admin_member_information', 'admin_member_information.admin_u_id = admin_member_account.admin_id');
        $query_user  =   $this->db->get();
        return $query_user->result();   
    }//end of function
    function manage_user_admin_exec($id,$access){
        if($access==1){
            $this->db->where('admin_u_id',$id);
            $importantData  =   array('admin_access'=>0,'admin_status'=>0);
            $this->db->update('admin_member_information',$importantData);
            $newdata    =   array('manage_okay'=>$username.' account is disabled. ');
            $this->session->set_userdata($newdata);
            redirect(base_url().'view_admin_users');
            exit();
        }else if($access==0){
            $this->db->where('contributor_id',$id);
            $this->db->delete('admin_request');
            
            $this->db->where('admin_u_id',$id);
            $importantData  =   array('admin_access'=>1);
            $this->db->update('admin_member_information',$importantData);
            $newdata    =   array('manage_okay'=>$username.' account is enable. ');
            $this->session->set_userdata($newdata);
            redirect(base_url().'view_admin_users');
            exit();
        }
    }//end of function
    function adminUserAccountInfo(){
        $this->db->where('admin_id',$this->session->userdata('user_id'));
        $queryAdminInfo =   $this->db->get('admin_member_account');
        return $queryAdminInfo->result();
    }//end of function
    
    function admin_change_info_exec($id,$admin_Password,$admin_Username,$admin_Email,$admin_Firstname,$admin_Lastname,$admin_Gender,$admin_Website){
        $readyData  =   array(
            'admin_username'    =>  $admin_Username,
            'admin_email'   =>  $admin_Email,
            'admin_firstname'   =>  $admin_Firstname,
            'admin_lastname'    =>  $admin_Lastname,
            'admin_website' =>  $admin_Website,
            'admin_gender'    =>  $admin_Gender
        );
        $this->db->where('admin_id',$id);
        $query  =   $this->db->get('admin_member_account');
        foreach($query->result() as $row){
            $password   =   $row->admin_password;
        }
        if($password    == md5($admin_Password)){
            $this->db->where('admin_id',$id);
            $this->db->update('admin_member_account',$readyData);
            $newData    =   array('update_okay'=>$admin_Firstname.' has been modify');
            $this->session->set_userdata($newData);
            redirect(base_url().'admin_settings');
            exit();
        }else{
            $newData    =   array('update_error'=>'Incorrect Password');
            $this->session->set_userdata($newData);
            redirect(base_url().'admin_settings');
            exit();
        }
    }//end of function
    
    function admin_change_password_exec($id,$adminNewPassword,$adminNewPasswordRepeate,$adminOldPassword){
        if($adminNewPassword==$adminNewPasswordRepeate){
            $this->db->where('admin_id',$id);
            $query  =   $this->db->get('admin_member_account');
            foreach($query->result() as $row){
                $password   = $row->admin_password;
            }
            if($password    ==  md5($adminOldPassword)){
                $newPassword    =   array('admin_password'=>md5($adminNewPassword));
                $this->db->where('admin_id',$id);
                $this->db->update('admin_member_account',$newPassword);
                $newdata    =   array('password_change_okay'=>'Your password is succesfully change.');
                $this->session->set_userdata($newdata);
                redirect(base_url().'admin_settings');
                exit();
            }else{
                $newdata    =   array('password_change_error'=>'Your old password is incorrect.');
                $this->session->set_userdata($newdata);
                redirect(base_url().'admin_settings');
                exit();
            }
        }else{
           $newdata    =   array('password_change_error'=>'Password not match.');
           $this->session->set_userdata($newdata);
           redirect(base_url().'admin_settings');
           exit(); 
        }
    }//end of function
    
        function add_admin_member_exec($username,$email,$firstname,$lastname,$gender,$website,$password,$role){
                $adminMemberData    =   array(
                    'admin_username'    =>  $username,
                    'admin_email'   =>  $email,
                    'admin_firstname'   =>  $firstname,
                    'admin_lastname'    =>  $lastname,
                    'admin_website' =>  $website,
                    'admin_password'    =>  md5($password),
                    'admin_gender'  =>  $gender

                );
                $this->db->insert('admin_member_account',$adminMemberData);
                $query  =   $this->db->get_where('admin_member_account',$adminMemberData);
                foreach($query->result() as $row){
                    $id =   $row->admin_id;
                }
                $adminMemberInfo    =   array(
                    'admin_u_id'    =>  $id,
                    'admin_role'    =>  $role,
                    'admin_status'  =>  0,
                    'admin_access'  =>  1,
                    'admin_last_login'  =>  ''
                );
                $this->db->insert('admin_member_information',$adminMemberInfo);
                $newdata    =   array('add_admin_okay'=>'Member successfuly added.');
                $this->session->set_userdata($newdata);
                header('location:'.base_url().'add_admin');
                exit();
            }//end of function
            
            
 function admin_logout(){
        $data = array(
               'admin_status' => 0
            );
        $this->db->where('admin_u_id',$this->session->userdata('user_id'));
        $this->db->update('admin_member_information', $data);
        $newdata    =   array(
            'user_id'   =>  '',
            'user_firstname'    =>  '',
            'user_lastname' =>  '',
            'user_username' =>  '',
            'user_role' =>  '',
            'logged_in' =>  FALSE  
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url()."admin");
    }
    
    
    
    
}   
    ?>