<?php 
       foreach($adminMessage as $rowMessage1) { 
        if($rowMessage1->message_status==1){ 
           ?>
                 <li class="messageListHover">
                     <a href="<?php echo base_url().'admin_inbox';?>" class="messageListHover" data-toggle="modal">
                        <i class="fa fa-fw fa-envelope"></i>
                        <?php 
                            $this->db->where('admin_id',$rowMessage1->message_sender_id);
                            $querySender    =   $this->db->get('admin_member_account');
                               foreach($querySender->result() as $rowSender){ 
                                    echo $rowSender->admin_firstname.' '.$rowSender->admin_lastname.' - ('.$rowSender->admin_username.') '; 
                                    $this->db->where('admin_u_id',$rowMessage1->message_sender_id);
                                    $queryStatus    =   $this->db->get('admin_member_information');
                                    foreach($queryStatus->result() as $row){
                                        if($row->admin_status==1){
                                            echo '<span class="text-green pull-right status-margin">online</span>';
                                        }else{
                                            echo '<span class="text-red pull-right status-margin">offline</span';
                                        }
                                    }
                                } ?>
                     </a>
                     
                 </li>
                 
                 <div class="divider"></div>
 <?php 
       }} ?>

 <?php
$this->db->where('default_reciever',$this->session->userdata('user_id'));
$this->db->where('costumer_message_status','0');
$queryCostumer = $this->db->get('costumer_message');
foreach($queryCostumer->result() as $row){ ?>
  <li class="messageListHover">
                     <a href="<?php echo base_url().'guest_message';?>" class="messageListHover" data-toggle="modal">
                        <i class="fa fa-fw fa-envelope"></i>
                        <?php echo $row->costumer_firstname.' '.$row->costumer_lastname; ?>
                        <br>
                        <small style="color:green">( Guest message )</small>
                     </a>
                     
                 </li>
                 
                 <div class="divider"></div>
 <?php
}
 
 ?>
