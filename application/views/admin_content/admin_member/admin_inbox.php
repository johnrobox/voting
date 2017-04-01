<div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">
                                        <i class="fa fa-envelope-square"></i> 
                                        SMS
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Inbox </a>
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
                <?php }if($this->session->userdata('delete_message_okay')!='') { ?>
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-check"></i><?php echo $this->session->userdata('delete_message_okay');?>
                        </div>
                    </div>
                </div>   
                <?php } ?>
                <!--- END:    message alert ----->
                
                <!--- START:   unset sent message alert ----->
                <?php $data =   array('message_sent_okay'=>'','delete_message_okay'=>'');
                $this->session->unset_userdata($data); ?>
                <!--- END:   unset sent message alert ----->
                
    
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-envelope"></i> 
                                Inbox
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th></th><th>Sender</th><th>Content</th><th>Date</th><th>Action</th>
                                    </tr>
                                    <?php 
                                    foreach($adminMessage as $rowMessageView){ 
                                        if($rowMessageView->message_receiver_status==1){?>
                                    <tr>
                                        <td>
                                            <?php if($rowMessageView->message_status==0){?>
                                            <i class="fa fa-folder-open"></i>
                                            <?php }else{ ?>
                                            <i class="fa fa-envelope-o"></i>   
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php $this->db->where('admin_id',$rowMessageView->message_sender_id);
                                                  $querySender  =   $this->db->get('admin_member_account'); 
                                                  foreach($querySender->result() as $rowSenderView){
                                                      echo $rowSenderView->admin_firstname.' '.$rowSenderView->admin_lastname.' - ('.$rowSenderView->admin_username.')';
                                            } ?>
                                        </td>
                                        <td>
                                            <?php echo $rowMessageView->message_content;?>
                                        </td>
                                        <td>
                                            <?php echo $rowMessageView->message_date_sent.' - '.$rowMessageView->message_time_sent; ?>
                                        </td>
                                        <td>
                                            <a href="#viewMessage<?php echo $rowMessageView->message_id; ?>" data-toggle="modal">Read</a>
                                            <br />
                                            <a href="#replyMessage<?php echo $rowMessageView->message_id; ?>" data-toggle="modal">Reply</a>
                                            <br />
                                            <a href="#deleteMessage<?php echo $rowMessageView->message_id; ?>" data-toggle="modal">Delete</a>
                                        </td>
                                    </tr>  
                                    <?php } } ?>
                                </table>
                            </div>
                            <div class="panel-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>               
</div> 