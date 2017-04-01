            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-list"></i> View
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Positions </a>
                                    </span>
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---- update delete position validation alert starts here    ----->
                               <?php if($this->session->userdata('position_approved_success')!=''||$this->session->userdata('position_name_not_change')!=''||$this->session->userdata('position_update_success')!=''||$this->session->userdata('position_deleted_success')!='') { ?>
                                    <div class="alert alert-success">
                                        <i class="fa fa-check"></i> 
                                        <?php echo $this->session->userdata('position_approved_success'); ?>
                                        <?php echo $this->session->userdata('position_name_not_change'); ?>
                                        <?php echo $this->session->userdata('position_update_success'); ?>
                                        <?php echo $this->session->userdata('position_deleted_success'); ?>
                                    </div>
                                    <?php }if($this->session->userdata('position_already_exist')!=''){ ?>
                                    <div class="alert alert-danger">
                                        <i class="fa fa-times"></i>
                                        <?php echo $this->session->userdata('position_already_exist'); ?>
                                    </div>
                                    <?php } ?>
                                    <?php
                                    $newdata    =   array(
                                        'position_update_success'  =>  '',
                                        'position_approved_success' =>  '',
                                        'position_deleted_success'  =>  '',
                                        'position_already_exist'    =>  '',
                                        'position_name_not_change'  =>  ''
                                    );
                                    $this->session->unset_userdata($newdata);
                                    ?>
                            <!---- update delete position validation alert ends here    ----->
                
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
                
                
                <!---- The session for the return page starts here ----->
                <?php 
                    $returnPage =   array('return_page'=>'view_positions');
                    $this->session->set_userdata($returnPage);
                ?>
                <!---- The session for the return page ends here   ----->
                <?php foreach($querys as $row) { 
                   $Screening = $row->election_screening;
                   $Status  =   $row->election_status;
                   $this->db->where('position_election_id',$row->election_id);
                   $this->db->order_by('position_election_id','asc');
                   $query_position =   $this->db->get('eposition');
                   if($query_position->num_rows()>0){
                    ?>
                <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> 
                            This are the positions list of 
                            <span class="text-white tocapital">
                                <b><?php echo $row->election_name;?></b>
                            </span>
                            <span><?php if($Screening    ==  1 &&   $Status ==  1){ ?>
                                      <small class="pull-right text-green" style = "background: #fff;">This election is currently started </small>
                                  <?php }else{ ?>
                                      <small class="pull-right text-red" style = "background: #fff;">This election is not yet started </small>
                                  <?php } ?>
                            </span>
                        </div>
                            
                            <table class="table table-bordered table-hover">
                                <tr class="active"><th> No.</th><th> Position Name</th><th></th><th> Position Created by</th><th><i class="fa fa-circle"></i> Action</th></tr>
                            <?php $numberP  =   1;
                                foreach($query_position->result() as $rows){ ?>
                                <tr>
                                    <td>
                                        <?php echo $numberP;?>
                                    </td>
                                    <td class="info">
                                        <i class="fa fa-adn"></i> 
                                        <?php echo $rows->position_name; ?>
                                    </td>
                                    <td>
                                        <?php if($rows->position_screening==1){ ?>
                                        <span class="text-green">Approved</span>
                                        <?php }else{ ?>
                                        <span class="text-orange">Pending</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-user"></i> 
                                        <?php 
                                        $this->db->where('admin_id',$rows->position_created_by);
                                        $queryAdmin =   $this->db->get('admin_member_account');
                                        foreach($queryAdmin->result() as $adminRows){
                                            echo $adminRows->admin_firstname.' '.$adminRows->admin_lastname;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                  <?php if($Screening    ==  1 &&   $Status ==  1){ 
                                                        echo '<small class="text-blue">Election is currently started</small>';
                                                      } else {
                                                          if($this->session->userdata('user_role')==1){ ?>
                                                               <?php if($rows->position_screening==0) {?>
                                                                <a href="#approvedPosition<?php echo $rows->position_id; ?>" title="Approved" class="update" data-toggle="modal"> <span class="glyphicon glyphicon-arrow-up"></span> </a>
                                                                |
                                                                <a href="#deletePosition<?php echo $rows->position_id; ?>" title="Delete" class="delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                                               <?php }else{ ?>
                                                            
                                                               <a href="#updatePosition<?php echo $rows->position_id; ?>" title="Update" class="update" data-toggle="modal"> <span class="glyphicon glyphicon-pencil"></span> </a>
                                                                |
                                                                <a href="#deletePosition<?php echo $rows->position_id; ?>" title="Delete" class="delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                                   <?php     }
                                                          }else {
                                                              if($rows->position_created_by==$this->session->userdata('user_id')&&$rows->position_screening==0){ ?>
                                                               <a href="#updatePosition<?php echo $rows->position_id; ?>" title="Update" class="update" data-toggle="modal"> <span class="glyphicon glyphicon-pencil"></span> </a>
                                                                |
                                                                <a href="#deletePosition<?php echo $rows->position_id; ?>" title="Delete" class="delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>   
                                                   <?php       }
                                                          }
                                                      } ?>
                                </td>
                                </tr>
                            <?php 
                            $numberP++;
                            } ?>
                            </table>
                    </div>
                </div>
                    </div>
                <?php } }?>
            </div>
        </div>               
</div>                
