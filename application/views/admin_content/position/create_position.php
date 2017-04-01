           
            
            <div class="col-sm-9" >
            
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">
                                        <i class="fa fa-pencil-square-o"></i> 
                                        Create
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Position </a>
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
                
                
                <?php if($this->session->userdata('create_position_exist')!=''){?>
                         <div class="alert alert-danger alert-dismissable">
                             <i class="fa fa-times"></i> 
                             <?php echo $this->session->userdata('create_position_exist');?>
                         </div>
                <?php }if($this->session->userdata('create_position_okay')!=''){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i> 
                             <?php echo $this->session->userdata('create_position_okay');?>
                        </div>
                <?php } ?>
                <!---- The validation came from the modal action ends here ------>
                <div class="panel panel-primary">
                     <div class="panel-heading">
                         
                            <h4><i class="fa fa-list"></i>  ELECTION LIST <small class="pull-right" style = "color: #fff;">( Click election name to create position )</small></h4>
                         
                     </div>
                          <div class="panel-body" >
                              <!--- start of: viewing of list election ----->
                                  <?php foreach($querys as $row){ ?>
                                        <div class="col-sm-6">
                                            <a href="#createPosition<?php echo $row->election_id;?>" data-toggle="modal">
                                        <?php $j  =   $row->election_id; ?>
                                            <div class="breadcrumb setbordergray">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <span class="glyphicon glyphicon-th-list"> </span>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <span><?php echo $row->election_name; ?></span>
                                                    </div>
                                                    <div class="col-sm-2">
                                                    <?php if($row->election_screening ==  1){ ?>
                                                        <small class="pull-right text-green">
                                                            Approved
                                                        </small>
                                                    <?php } else if($row->election_screening    ==  0){ ?>
                                                        <small class="pull-right text-orange">
                                                            Pending
                                                        </small>   
                                                    <?php }else{ ?>
                                                        <small class="pull-right text-red">
                                                            Canceled
                                                        </small> 
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                               <?php } ?> <!--- end of: viewing of list election ----->
                               
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
                    
                    'create_position_okay'  =>  '',
                    'create_position_exist' =>  '',
                    
                    'position_already_exist'    =>  '',
                    'position_name_not_change'  =>  ''
                );
                $this->session->unset_userdata($newdata);
                ?>
                <!---- update delete position validation alert ends here    ----->
                <!---- view election position starts here ---->

                           <?php 
                                foreach($querys as $row)
                                {
                                    $Ename   =   $row->election_name;
                                    $Screening  =   $row->election_screening;
                                    $Status =   $row->election_status;
                                    if($row->election_screening==1){
                           ?>
                
                                     <div class="col-sm-6">
                                        <div class="panel panel-primary">
                                                <?php 
                                                $this->db->where('position_election_id',$row->election_id);
                                                $countPositionAvailable  =   $this->db->get('eposition');
                                                ?>
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-sm-12 tocapital">
                                                <?php echo $Ename;?>
                                                    </div>
                                                    <div class="col-sm-12">
                                                <small class="pull-right"> (<span class="text-orange"><?php echo $countPositionAvailable->num_rows(); ?></span>) Position /s found </small>
                                                    </div>
                                                </div>
                                            </div>
                                                <table class="table table-hover" >
                                                <?php if($countPositionAvailable->num_rows()    >   0){
                                                    echo '<tr><th>#</th><th class="tocapital">position</th><th>Action</th></tr>';
                                                }
                                                $positionNumber =   1;
                                                $this->db->where('position_election_id',$row->election_id);
                                                $queryAllPosition  =   $this->db->get('eposition');
                                                foreach($queryAllPosition->result() as $rows)
                                                {  ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $positionNumber; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rows->position_name; ?>
                                                            <small class="pull-right">
                                                                    <?php
                                                                    if($rows->position_screening==1){
                                                                        echo '<i class="text-green">Approved</i>';
                                                                    }else{
                                                                        echo '<i class="text-orange">Pending</i>';
                                                                    } ?>
                                                            </small>
                                                        </td>
                                                    <td>
                                                    <?php   
                                                    if($Screening    ==  1 &&   $Status ==  1){ 
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
                                                      }//end of else
                                                    echo '</td></tr>';
                                                    $positionNumber++;
                                                }?> 
                                                </table>
                                        </div>
                                    </div>   
                
                            <?php
                                } } 
                            ?> 
 
            </div>   
        </div>               
</div>
       
  




