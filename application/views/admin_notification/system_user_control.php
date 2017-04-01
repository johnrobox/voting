<?php 
$query  =   $this->db->get('admin_request');
foreach($query->result() as $rows){ 
         $data   =   array('admin_id'=>$rows->contributor_id,'access'=>'enable');
         $query1    =   $this->db->get_where('admin_member',$data);
         foreach($query1->result() as $row){ 
             $this->db->where('contributor_id',$row->admin_id);
             $this->db->delete('admin_request');
         }//end of foreach
}//end of foreach 
       
$this->db->where('admin_id',$this->session->userdata('user_id'));
$this->db->where('admin_username',$this->session->userdata('user_username'));
$this->db->where('access','disable');
$queryAccess =  $this->db->get('admin_members');
        if($queryAccess->num_rows()==1){
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
        }
?>