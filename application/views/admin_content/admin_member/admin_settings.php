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
                                        <a href=""> Settings </a>
                                    </span>
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--- START:    sent message alert ----->
                <?php if($this->session->userdata('message_sent_okay')!='') { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <?php echo $this->session->userdata('message_sent_okay');?>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!--- END:    sent message alert ----->
                
                <!--- START:   unset sent message alert ----->
                <?php $data =   array('message_sent_okay'=>'');
                $this->session->unset_userdata($data); ?>
                <!--- END:   unset sent message alert ----->
                
                
                <!--- the update validation alert starts here   ---->
                <?php if($this->session->userdata('update_error')!=''){?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-times"></i> 
                    <?php echo $this->session->userdata('update_error');?>
                </div>
                <?php }if($this->session->userdata('update_okay')!=''){?>
                <div class="alert alert-info alert-dismissable">
                    <i class="fa fa-check"></i> 
                    <?php echo $this->session->userdata('update_okay'); ?>
                </div>
                <?php }if($this->session->userdata('password_change_error')!=''){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-times"></i> 
                    <?php echo $this->session->userdata('password_change_error');?>
                </div>
                <?php }if($this->session->userdata('password_change_okay')!=''){?>
                <div class="alert alert-info alert-dismissable">
                    <i class="fa fa-check"></i> 
                    <?php echo $this->session->userdata('password_change_okay'); ?>
                </div>
                <?php } ?>
                <!--- the update validation alert ends here -------->
                <!--- unset session starts here ---->
                <?php $newdata  =   array('update_error'=>'','update_okay'=>'','password_change_error'=>'','password_change_okay'=>'');
                $this->session->unset_userdata($newdata);
                ?>
                <!--- unset session ends   here ---->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-user"></i> 
                                Manage Account
                                <span class="pull-right">
                                    <a href="#changePassword<?php echo $this->session->userdata('user_id');?>"class="change" data-toggle="modal">
                                        <i class="fa fa-pencil-square-o"></i> 
                                        Change password?
                                    </a>
                                </span>
                            </div>
                            <div class="panel-body">
                                <?php 
                                foreach($queryAdminInfo as $row){ ?>
                                    <?php echo form_open(base_url().'admin_change_info'); ?>
                                <input type="hidden" name="id" value="<?php echo $row->admin_id;?>"/>
                                <div class="row">
                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="admin_username">Username <small class="text-red"><?php echo form_error('admin_Username');?></small></label>
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="admin_Username" id="admin_username"  value="<?php echo $row->admin_username; ?>" required=""/>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="admin_email">E-mail<small class="text-red"><?php echo form_error('admin_Email');?></small></label>
                                              <div class="row"> 
                                                  <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="admin_Email" id="admin_email" value="<?php echo $row->admin_email; ?>" required=""/>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="admin_firstname">First Name <small class="text-red"><?php echo form_error('admin_Firstname');?></small></label>
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="admin_Firstname" id="admin_firstname" value="<?php echo $row->admin_firstname; ?>" required=""/>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="admin_lastname">Last Name<small class="text-red"><?php echo form_error('admin_Lastname');?></small></label>
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="admin_Lastname" id="admin_lastname" value="<?php echo $row->admin_lastname; ?>"required=""/>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-6">
                              <div class="form-group">
                                            <label>Gender</label>
                                                <div class="row">
                                                  <div class="col-sm-12">
                                                        <select class="form-control" name="admin_Gender">
                                                            <?php
                                                            if($row->admin_gender=='male'){ ?>
                                                            <option value="male">male</option>
                                                            <option value="female">female</option>
                                                            <?php }else{ ?>
                                                            <option value="female">female</option>
                                                            <option value="male">male</option>
                                                            <?php } ?>
                                                        </select>
                                                  </div>
                                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="admin_website">Website</label>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" name="admin_Website" id="admin_website" value="<?php echo $row->admin_website; ?>" required="">
                                      </div>
                                  </div>
                              </div>
                            </div></div>
                                <hr>
                            <div class="row">
                                        <div class="col-sm-12">
                                             <label for="admin_password">Enter Your Password</label>
                                             <input type="password" class="form-control" name="admin_Password" placeholder="enter old password . . ." required=""/><br>
                                        </div>      
                                    </div>
                   
                               
                                
                             <div class="form-group pull-right">
                                 <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Change</button>
                             </div>
                         <?php echo form_close(); ?>
                                <?php }?>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
</div>  