            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">User
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> All users </a>
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
                
                
                <?php if($this->session->userdata('manage_okay')!=''){ ?>
                <div class="alert alert-success alert-dismissable">
                    <?php echo $this->session->userdata('manage_okay'); ?>
                </div>
                <?php } 
                $newdata    =   array('manage_okay'=>'');
                $this->session->unset_userdata($newdata);
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading tocapital">
                                <h4 class = "text-center">Admin User List</h4>
                            </div>
                            <table class="table table-bordered table-hover">
                                <tr><th>Image</th><th>Name</th><th>Username</th><th>Email</th><th>Role</th><th>Access</th><th>Action</th></tr>
                                <?php foreach($query_user as $row) { ?>
                                <tr>
                                    <td><img src=""/></td>
                                    <td><?php echo $row->admin_firstname.' '.$row->admin_lastname; ?></td>
                                    <td><?php echo $row->admin_username;?></td>
                                    <td><?php echo $row->admin_email;?></td>
                                    <td>
                                    <?php if($row->admin_role==1){
                                        echo 'Administrator';
                                    }else{
                                        echo 'Contributor';
                                    } ?>
                                    
                                    </td>
                                    <td>
                                    <?php if($row->admin_access==1){
                                        echo 'Enable';
                                    }else{
                                        echo 'Disable';
                                    } ?>
                                    </td>
                                    <td>
                                        <?php if($this->session->userdata('user_role')==1){ ?>
                                        <?php if($row->admin_role==2&&$row->admin_access==1) {?>
                                            <a href="#disable<?php echo $row->admin_id;?>" class="btn btn-danger" data-toggle="modal">Disable</a>
                                        <?php }else if($row->admin_role==2&&$row->admin_access==0) {?>
                                            <a href="#enable<?php echo $row->admin_id;?>" class="btn btn-primary" data-toggle="modal">Enable</a>
                                        <?php }}else{?>
                                        <span class="text-red">No Action</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
</div>  