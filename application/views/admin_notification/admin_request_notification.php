<?php
$query  =   $this->db->get('admin_request');
$requestCounter =   0;
foreach($query->result() as $rows) {
    $data   =   array('admin_u_id'=>$rows->contributor_id,'admin_access'=>0);
    $querySender    =   $this->db->get_where('admin_member_information',$data);
    foreach($querySender->result() as $rowSender){
        $requestCounter++;
    }
}
if($requestCounter>0){ ?>
<span class = "badge badge-danger" style = "background-color: red; color: #53CBE9; margin-left:-2px;"  >
             <?php echo $requestCounter?>
</span>
<?php 
    $data   =   array('warning_active' =>  'yes');
    $this->session->set_userdata($data);
}else{
    $data   =   array('warning_active' =>  '');
    $this->session->unset_userdata($data); 
}
?>

