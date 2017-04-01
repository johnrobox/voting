<div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">
                                        <i class="fa fa-envelope-square"></i> 
                                        Guest
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Messages </a>
                                    </span>
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
                <!--- START:    message alert ----->
                <?php if($this->session->userdata('message_sent_okay')!='') { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-check"></i><?php echo $this->session->userdata('message_sent_okay');?>
                        </div>
                    </div>
                </div>
                <?php }if($this->session->userdata('Guest_message_delete_success')!=''||$this->session->userdata('message_sent_success')!='') { ?>
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-check"></i>
                            <?php echo $this->session->userdata('Guest_message_delete_success');?>
                            <?php echo $this->session->userdata('message_sent_success'); ?>
                        </div>
                    </div>
                </div>   
                <?php } ?>
                <?php if($this->session->userdata('message_sent_error')!='') { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            <i class="fa fa-times"></i>
                            <?php echo $this->session->userdata('message_sent_error');?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--- END:    message alert ----->
                
                <!--- START:   unset sent message alert ----->
                <?php $data =   array('message_sent_okay'=>'','Guest_message_delete_success'=>'','message_sent_success'=>'','message_sent_error'=>'');
                $this->session->unset_userdata($data); ?>
                <!--- END:   unset sent message alert ----->
                
    <?php if($this->session->userdata('user_id')==1){ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-envelope"></i> 
                                Messages from the guest
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th></th><th>Sender</th><th>Content</th><th>Action</th>
                                    </tr>
                                    <?php 
                                    $this->db->where('default_reciever',$this->session->userdata('user_id'));
                                    $queryCostumer = $this->db->get('costumer_message');
                                    foreach($queryCostumer->result() as $rowMessageView){ ?>
                                    <tr>
                                        <td>
                                            <?php if($rowMessageView->costumer_message_status==1){?>
                                            <i class="fa fa-folder-open"></i>
                                            <?php }else{ ?>
                                            <i class="fa fa-envelope-o"></i>   
                                            <?php } ?>
                                        </td>
                                        <td>
                                           <?php echo $rowMessageView->costumer_firstname.' '.$rowMessageView->costumer_lastname; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowMessageView->costumer_message;?>
                                        </td>
                                        <td>
                                            <a href="#viewGuestMessage<?php echo $rowMessageView->id; ?>" data-toggle="modal">Read</a>
                                            <br />
                                            <a href="#replyGuestMessage<?php echo $rowMessageView->id; ?>" data-toggle="modal">Reply</a>
                                            <br />
                                            <a href="#deleteGuestMessage<?php echo $rowMessageView->id; ?>" data-toggle="modal">Delete</a>
                                        </td>
                                    </tr>  
                                    <?php  } ?>
                                </table>
                            </div>
                            <div class="panel-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else{ ?>
                <div class="alert alert-danger">
                    <h1>You are not allowed to view this page.</h1>
                </div>
                <?php } ?>
                
</div>
</div>               
</div> 