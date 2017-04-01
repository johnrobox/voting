            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-list"></i> View
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Voters </a>
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
                
                
                <!---- the update delete validation alert starts here   ---->
                <?php  if($this->session->userdata('voters_update_okay')!=''){?>
                <div class="alert alert-info alert-dismissable">
                    <?php echo $this->session->userdata('voters_update_okay'); ?>
                </div>
                <?php }if($this->session->userdata('voters_update_error')!=''){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <?php echo $this->session->userdata('voters_update_error'); ?>
                </div>
                <?php }if($this->session->userdata('voters_delete_okay')!=''){?>
                <div class="alert alert-info alert-dismissable">
                    <?php echo $this->session->userdata('voters_delete_okay'); ?>
                </div>
                <?php } ?>
                <!---- the update delete validation alert ends here -------->
                <!---- unset all session starts here    ----->
                <?php 
                    $newdata    =   array('voters_update_okay'=>'','voters_update_error'=>'','voters_delete_okay'=>'');
                    $this->session->unset_userdata($newdata);
                ?>
                <!---- unset all session ends here      ----->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-table"></i> 
                                List of all voters
                            </div>
                            <table class="table table-hover table-bordered">
                                <tr><th><i class="fa fa-pencil-square-o"></i></th><th>School ID</th><th>Name</th><th>Course</th><th>Gender</th><th>Registered</th><th>Action</th></tr>
                                <?php $numberV  =   1;
                                foreach($query_voters as $voterRow){ ?>
                                <tr>
                                    <td><?php echo $numberV; ?> </td>
                                    <td><?php echo $voterRow->voters_schoolid;?></td>
                                    <td><?php echo $voterRow->voters_firstname.' '.$voterRow->voters_lastname; ?></td>
                                    <td><?php echo $voterRow->voters_course;?></td>
                                    <td><?php echo $voterRow->voters_gender;?></td>
                                    <td>
                                        <?php 
                                        $this->db->where('registered_voters_u_id',$voterRow->voters_id);
                                        $queryRegistered    =   $this->db->get('registered_voter');
                                        $rowNumber  =   $queryRegistered->num_rows();
                                        if($rowNumber>0){
                                            echo '<img src="'.base_url().'img/other/check.png"/>';
                                        }else{
                                            echo '<img src="'.base_url().'img/other/wrong.png"/>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($rowNumber==0){?>
                                        <a href="#updateVoters<?php echo $voterRow->voters_id;?>" class="update" data-toggle="modal" title="Update"> <span class="glyphicon glyphicon-pencil"></span> </a>
                                        |
                                        <a href="#deleteVoters<?php echo $voterRow->voters_id;?>" class="delete" data-toggle="modal" title="Delete"> <span class="glyphicon glyphicon-trash"></span> </a>
                                        <?php }else { ?>
                                        no action
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $numberV++;} ?>
                            </table>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>   

        </div>               
</div>                
