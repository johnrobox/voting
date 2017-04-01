<?php foreach($adminMessage as $rowMessageModal) {?>
<div class="modal fade" id="viewMessage<?php echo $rowMessageModal->message_id; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-pencil"></i> Message</h4>
      </div>
        <div class="modal-body">
            <?php echo $rowMessageModal->message_content; ?>
        </div>
        <div class="modal-footer">
            <?php 
            $this->db->where('admin_id',$rowMessageModal->message_sender_id);
            $querySender    =   $this->db->get('admin_member_account');
            foreach($querySender->result() as $rowSender){
                echo '<small class="pull-left"> From : ';
                echo $rowSender->admin_firstname.' '.$rowSender->admin_lastname.' - ('.$rowSender->admin_username.')';
                echo '</small>';
            }
            ?>
            <?php echo form_open(base_url().'read_admin_message'); ?>
            <input type="hidden" name="message_id" value="<?php echo $rowMessageModal->message_id;?>"/>
            <button type="submit" class="btn btn-primary"> Ok </button>
            <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>
<?php } ?>