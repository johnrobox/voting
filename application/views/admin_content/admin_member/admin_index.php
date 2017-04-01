           
            
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Dashboard
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Online voting </a>
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
                
                
                
                <!--- START : for first row ---->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id = "ApprovedElectionNotification"></div>
                                        <div>Approved Election's</div>
                                    </div>
                                </div>
                            </div>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div id="ApprovedElectionViewDetails"></div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"id = "PendingElectionNotification"></div>
                                        <div>Pending Election's</div>
                                    </div>
                                </div>
                            </div>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div id="PendingElectionViewDetails"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- END : for first row ---->
                
                
                <div class="row">
                <div class="col-sm-12">
             <?php if($this->session->userdata('election_request_error')!='') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-times"></i> 
                    <?php echo $this->session->userdata('election_request_error'); ?>
                </div>
             <?php } if($this->session->userdata('election_request_success')!=''){ ?>
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-check"></i> 
                        <?php echo $this->session->userdata('election_request_success'); ?>
                    </div>
             <?php } 
             $newdata    =   array(
                 'election_request_error'=>'',
                 'election_request_success'=>'');
             $this->session->unset_userdata($newdata);
             ?>
                    </div>
                </div>
                
             <?php if($this->session->userdata('user_role')==1){?> 
                <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Manage Election's
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Election Name</th><th></th><th>Status</th><th>Action</th>
                                </tr>
                            <?php foreach($querys as $row){
                                ?>
                                <tr>
                                    <td><?php echo $row->election_name;?></td>
                                    <td>
                                    <?php if ($row->election_screening==1){?>
                                            <span class="text-green">Approved</span>
                                    <?php }else if($row->election_screening==0){ ?>
                                            <span class="text-orange">Pending</span>
                                    <?php }else{ ?>
                                          <span class="text-red">Canceled</span>
                                    <?php } ?>
                                    </td>
                                    <td>
                                    <?php if($row->election_status==0){?>
                                        stoped
                                    <?php }else{ ?>
                                        started
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($row->election_screening==1&&$row->election_status==0){
                                            echo '<a href="#start'.$row->election_id.'" class="btn btn-primary" data-toggle="modal">Start it now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                                        } if($row->election_screening==0&&$row->election_status==0){
                                            echo '<a href="#approve'.$row->election_id.'" class="btn btn-success" data-toggle="modal">Approve it now!</a>';
                                        } if($row->election_screening==1&&$row->election_status==1){
                                            echo '<a href="#stop'.$row->election_id.'" class="btn btn-info" data-toggle="modal">Stop it now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                                        } if($row->election_screening==5&&$row->election_status==0){
                                            echo 'no action';
                                        }
                                        ?>
                                    </td>
                                </tr>
                             <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>
                <?php if($this->session->userdata('user_role')==2){?>  
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Election's
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Election Name</th><th></th><th>Status</th><th>Action</th>
                                </tr>
                            <?php     $loginName  =   $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname');
                            foreach($querys as $row){
                                //if($loginName==$row->election_created_by){?>
                                <tr>
                                    <td><?php echo $row->election_name;?></td>
                                    <td>
                                        <?php if ($row->election_screening==1){ ?>
                                                <span class="text-green">Approved</span>
                                        <?php }else if ($row->election_screening==0){ ?>
                                                <span class="text-orange">Pending</span>
                                        <?php }else  { ?>
                                                <span class="text-red">Canceled</span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php if($row->election_status==1){?>
                                                Started
                                        <?php }else{ ?>
                                                Stoped
                                        <?php } ?>
                                    </td>
                                    <td>
                                     <?php if(($row->election_created_by==$this->session->userdata('user_id'))&&($row->election_screening==0)) {?>
                                        <a href="#cancel<?php echo $row->election_id;?>" class="btn btn-danger" data-toggle="modal">Cancel it now!</a>
                                     <?php }else if(($row->election_created_by==$this->session->userdata('user_id'))&&($row->election_screening==5)){?>
                                        <a href="#resume<?php echo $row->election_id;?>" class="btn btn-warning" data-toggle="modal">Resume it now!</a>
                                     <?php }else { ?>
                                        No action
                                     <?php } ?>
                                       </td>
                                </tr>
                             <?php }//} ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>
                <span id="AdminUsers"></span> 
                
            </div>   
        </div>               
</div>
       

