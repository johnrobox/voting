<div class="modal fade" id="createMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-pencil"></i> Create Message</h4>
      </div>
      <div class="modal-body">
                <?php echo form_open(base_url().'send_admin_message_exec'); ?>
                    <input type="hidden" name="pageReturn" value="<?php echo (isset($title)) ? $title : "Online Voting" ?>"/>
                    <label>Recipient</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <select name="recipient" class="form-control">
                      <?php 
                      foreach($query_user as $rowAdmin){
                          if($rowAdmin->admin_id!=$this->session->userdata('user_id')){
                              echo '<option value="'.$rowAdmin->admin_id.'">';
                              echo $rowAdmin->admin_firstname.' '.$rowAdmin->admin_lastname.' - ( '.$rowAdmin->admin_username.' )';
                              echo '</option>';
                          }
                      }
                      ?>
                      </select>
                    </div>
                    <label> Message <i class="fa fa-envelope"></i></label>
                    <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                    <br />
                    <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Send Message Now!</button>
               <?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>