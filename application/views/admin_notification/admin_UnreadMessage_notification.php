<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$unreadMessageCounter   =   0;
foreach($adminMessage as $rowMessage1) { 
           if(($rowMessage1->message_status==1)&&($rowMessage1->message_receiver_status==1)){ 
            $unreadMessageCounter++;
           }
        }
$this->db->where('default_reciever',$this->session->userdata('user_id'));
$this->db->where('costumer_message_status','0');
$queryCostumer = $this->db->get('costumer_message');
$all = $unreadMessageCounter + $queryCostumer->num_rows();
        if($all>0){
?>
        <span class = "badge badge-danger" style = "background-color: red; margin-left: -15px;"  >
             <?php echo $all;?>
        </span>
<?php 
} ?>

