<?php foreach($adminMessageSent as $rowMessageModal) {?>
<div class="modal fade" id="deleteSend<?php echo $rowMessageModal->message_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Delete Message </h4>
      </div>
      <?php echo form_open(base_url().'delete_sentbox_message'); ?>
      <div class="modal-body">
                    Sure? want to delete this message ?
                    <input type="hidden" name="message_id" value="<?php echo $rowMessageModal->message_id;?>"/>
      </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary"><i class="fa fa-share"></i> Ok!</button>
       <button class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php } ?>