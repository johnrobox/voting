           
            
            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">
                                        <i class="fa fa-user"></i> 
                                        User
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Add user </a>
                                    </span>
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- this is for error panel---->
               <?php
               if($this->session->userdata('add_admin_okay')!=''){ ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i> 
                    <?php echo $this->session->userdata('add_admin_okay');
                    $newdata    =   array('add_admin_okay'=>'');
                    $this->session->unset_userdata($newdata);
                    ?>
                </div>
               <?php  } ?>
                <!-- the error panel ends here-->
                
                <div class="panel panel-primary">
                    <div class="panel-heading tocapital">
                        <i class="fa fa-pencil-square-o"></i> 
                        Add New
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(base_url().'add_admin_exec'); ?>
                              <div class="form-group">
                                  <label for="admin_username">Username<small><i> (required) </i></small> <small class="text-red"><?php echo form_error('admin_Username');?></small></label>
                                  <div class="row">
                                      <div class="col-sm-11">
                                        <input type="text" class="form-control" name="admin_Username" id="admin_username"  value="<?php echo set_value('admin_Username'); ?>">
                                      </div>
                                      <div class="col-sm-1">
                                      
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="admin_email">E-mail<small><i> (required) </i></small><small class="text-red"><?php echo form_error('admin_Email');?></small></label>
                                  <div class="row"> 
                                      <div class="col-sm-11">
                                        <input type="text" class="form-control" name="admin_Email" id="admin_email" value="<?php echo set_value('admin_Email'); ?>">
                                      </div>
                                      <div class="col-sm-1">
                                        
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="admin_firstname">First Name <small class="text-red"><?php echo form_error('admin_Firstname');?></small></label>
                                  <div class="row">
                                      <div class="col-sm-11">
                                        <input type="text" class="form-control" name="admin_Firstname" id="admin_firstname" value="<?php echo set_value('admin_Firstname'); ?>">
                                      </div>
                                      <div class="col-sm-1">
                                   
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="admin_lastname">Last Name<small class="text-red"><?php echo form_error('admin_Lastname');?></small></label>
                                  <div class="row">
                                      <div class="col-sm-11">
                                        <input type="text" class="form-control" name="admin_Lastname" id="admin_lastname" value="<?php echo set_value('admin_Lastname'); ?>">
                                      </div>
                                      <div class="col-sm-1">
                                       
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="admin_gender">Gender<small class="text-red"><?php echo form_error('admin_Gender');?></small></label>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  male<input type="radio" name="admin_Gender" id="admin_Gender" value="male"/> &nbsp;&nbsp;&nbsp;
                                  female<input type="radio" name="admin_Gender" id="admin_Gender" value="female"/>
                              </div>
                              <div class="form-group">
                                  <label for="admin_website">Website</label>
                                  <div class="row">
                                      <div class="col-sm-11">
                                        <input type="text" class="form-control" name="admin_Website" id="admin_website" value="<?php echo set_value('admin_Website'); ?>" placeholder = "www.example.com">
                                      </div>
                                      <div class="col-sm-1">
                                     
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="admin_password">Password<small><i> (twice, required) </i></small><small class="text-red"><?php echo form_error('admin_Password');?></small></label>
                                  <div class="row">
                                      <div class="col-sm-11">
                                          <input type="password" class="form-control" name="admin_Password" id="status" placeholder = "Enter Password"><br>
                                      </div>
                                      <div class="col-sm-1">
                                     
                                      </div>
                                  </div>
                                  <small class="text-red"><?php echo form_error('admin_PasswordRepeate');?></small>
                                  <div class="row">
                                      <div class="col-sm-11">
                                          <input type="password" class="form-control" name="admin_PasswordRepeate" placeholder = "Re-Enter Password"><br>
                                      </div>
                                      <div class="col-sm-1">
                                         
                                      </div>
                                  </div>
                                  <div class="gray-strength"><span class="view_status">Strength indicator</span></div>
                                  <small>
                                      <b>Hint:</b> The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ & ).
                                  </small>
                              </div>
                             <div class="form-group">
                                  <label for="admin_password">Send Password ? &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                  <input type="checkbox" name="admin_SendPassword" > <span>Send this password to the new user by email.</span>
                              </div>
                             <div class="form-group">
                                 <table><tr><td>
                                  <label for="admin_password">Role &nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
                                  <select class="form-control" name="admin_Role">
                                       <option selected="selected" value="2">Contributor</option>
                                       <option value="1">Administrator</option>
                                  </select></td></tr></table>
                             </div>
                             <div class="form-group pull-right">
                                  <button class="btn btn-default" type="reset">Clear</button>
                                  <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Register</button>
                             </div>
                         <?php echo form_close(); ?>
                    </div>
                </div>
                
            </div>   
        </div>               
</div>
       
      
