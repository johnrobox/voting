<div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">SMS
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Sentbox </a>
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
                            <div class="panel-heading">Sentbox</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr><th></th><th>Receiver</th><th>Message</th><th>Date</th><th>Action</th></tr>
                                    <?php foreach($adminMessageSent as $rowSentMessage){ 
                                       if($rowSentMessage->message_source_status==1){?>
                                    <tr>
                                        <td>
                                            <i class="fa fa-check-square-o"></i>
                                        </td>
                                        <td>
                                        <?php $this->db->where('admin_id',$rowSentMessage->message_recipient_id);
                                        $queryReceiver  =   $this->db->get('admin_member_account');{
                                            foreach($queryReceiver->result() as $rowReceiver){
                                                echo $rowReceiver->admin_firstname.' '.$rowReceiver->admin_lastname.' - ('.$rowReceiver->admin_username.')';
                                            }
                                        } ?>
                                        </td>
                                        <td><?php echo $rowSentMessage->message_content; ?></td>
                                        <td><?php echo $rowSentMessage->message_date_sent.' - ('.$rowSentMessage->message_time_sent.')'; ?></td>
                                        <td>
                                            <a href="#resendSend<?php echo $rowSentMessage->message_id; ?>" data-toggle="modal">Resend</a>
                                            <br />
                                            <a href="#deleteSend<?php echo $rowSentMessage->message_id; ?>" data-toggle="modal">Delete</a>
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