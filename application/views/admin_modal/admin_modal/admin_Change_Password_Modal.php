
    <div class="modal fade" id="changePassword<?php echo $this->session->userdata('user_id');?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <?php echo form_open(base_url().'admin_change_password'); ?>
                    <input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id');?>"/>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-sm-12">
                                              <label for="admin_password"> New Password</label>
                                              <input type="password" class="form-control" name="admin_Password" id="status" placeholder="enter new password . . ." required=""/><br>
                                      </div>
                                      <div class="col-sm-12">
                                      <label for="admin_password">Repeat new password</label>
                                          <input type="password" class="form-control" name="admin_PasswordRepeate" placeholder="repeate new password . . ." required=""/>
                                      </div>
                                  <div class="col-sm-12">
                                  <div class="gray-strength"><span class="view_status">Strength indicator</span></div>
                                  <small>
                                      <b>Hint:</b> The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ & ).
                                  </small>
                                      </div>
                                  </div>
                              </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                             <label for="admin_password">Enter Old Password</label>
                                             <input type="password" class="form-control" name="admin_OldPassword" placeholder="enter old password . . ." required=""/><br>
                                        </div>      
                                    </div>
                    <div class="modal-footer">
                    <div class="form-group pull-right">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  <button class="btn btn-primary" type="submit">Change</button>
                             </div>
                    </div>
                    <?php echo form_close(); ?>
                    
                </div>
            </div>
        </div>
    </div>
