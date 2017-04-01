           
            
            <div class="col-sm-9" >
            
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Create
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Team </a>
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
                
                
                <?php if($this->session->userdata('team_name_exist')!=''){?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-times"></i> 
                                <?php echo $this->session->userdata('team_name_exist');?>
                            </div>
                <?php }if($this->session->userdata('team_created_success')!=''){?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i> 
                                <?php echo $this->session->userdata('team_created_success');?>
                            </div>
                <?php }
                       $unsetData   =   array(
                           'team_name_exist'    =>  '',
                           'team_created_success'  =>  ''
                       );
                       $this->session->unset_userdata($unsetData);
                ?>                
                
                <div class="panel panel-primary">
                    <div class="panel-heading">  
                      <h4><i class="fa fa-list"></i>  ELECTION LIST <small class="pull-right" style = "color: #fff;">( Select election name to create team )</small></h4>
                    </div>
                    <div class="panel-body">
                    <?php foreach($querys as $row){ ?>
                         <div class="col-sm-6">
                             <a href="#createTeam<?php echo $row->election_id;?>" data-toggle="modal">
                                 <div class="breadcrumb setbordergray">
                                     <div class="row">
                                         <div class="col-sm-1">
                                            <span class="glyphicon glyphicon-th-list"> </span>
                                         </div>
                                         <div class="col-sm-8">
                                             <span>
                                                    <?php echo $row->election_name;?>
                                             </span>
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
                                            <?php } else { ?>
                                            <small class="pull-right text-red">
                                                Cancel
                                            </small>    
                                            <?php } ?>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                          </div>
                      <?php } ?>
                     </div>
                 </div>
                <!---- view election name ends here --->
                <!---- alert validate of update and delete team starts here ---->
                <?php if($this->session->userdata('team_update_okay')!=''){?>
                            <div class="alert alert-success alert-dismissable">
                                <?php echo $this->session->userdata('team_update_okay');?>
                            </div>
                <?php } if($this->session->userdata('team_update_exist')!=''){?>
                            <div class="alert alert-danger alert-dismissable">
                                <?php echo $this->session->userdata('team_update_exist');?>
                            </div>
                <?php } if($this->session->userdata('team_nothing_change')!=''){?>
                            <div class="alert alert-warning alert-dismissable">
                                <?php echo $this->session->userdata('team_nothing_change');?>
                            </div>
                <?php } if($this->session->userdata('delete_team_okay')!=''){?>
                            <div class="alert alert-success alert-dismissable">
                                <?php echo $this->session->userdata('delete_team_okay');?>
                            </div>
                <?php }
                $newdata    =   array(
                    'team_update_okay'  =>  '',
                    'team_update_exist' =>  '',
                    'team_nothing_change'  =>  '',
                    'delete_team_okay'  =>  ''
                );
                $this->session->unset_userdata($newdata);
                ?>
                <!---- alert validate of update and delete team ends here   ---->
                <!---- view team name starts here ---->
                           <?php 
                           $this->db->where('election_screening',1);
                           $queryElec   =   $this->db->get('election_info');
                                foreach($queryElec->result() as $rowsElec)
                                {
                                    $this->db->where('team_election_id',$rowsElec->election_u_id);
                                    $queryTeam  =   $this->db->get('team'); ?>

                                        <div class="panel panel-primary">
                                            <div class="panel-heading tocapital"> 
                                               <?php $this->db->where('election_id',$rowsElec->election_u_id);
                                               $queryElectionName   =   $this->db->get('election');
                                               foreach($queryElectionName->result() as $electionRow){
                                                   echo $electionRow->election_name;
                                               }
                                               ?>
                                                <small class="pull-right"> ( <b><span class="text-blue"><?php echo $queryTeam->num_rows();?></span></b> ) Team/s Found </small>
                                            </div>
                                            <div class="panel-body">
                                                 <?php 
                                                $this->db->where('team_election_id',$rowsElec->election_u_id);
                                                $newquery   =   $this->db->get('team');
                                                foreach($newquery->result() as $rowsTeam)
                                                {  
                                                    $team = $rowsTeam->team_name;
                                                    echo '<div class="col-sm-12" style="padding:0">';
                                                    echo '<div class="col-sm-2">';
                                                    echo $rowsTeam->team_name;
                                                    echo '</div>';
                                                    echo '<div class="col-sm-7">';
                                                        $this->db->where('position_election_id',$rowsTeam->team_election_id);
                                                        $newquery1  =   $this->db->get('eposition');
                                                        $position_counter   =   $newquery1->num_rows();
                                                        $this->db->where('candidate_election_id',$rowsTeam->team_election_id);
                                                        $this->db->where('candidate_team_id',$rowsTeam->team_id);
                                                        $newquery2  =   $this->db->get('candidate_member');
                                                        $candidate_counter  =   $newquery2->num_rows();
                                                        $bar_width  =   ($candidate_counter / $position_counter)*100;
                                                    echo '<div class="progress">
                                                          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="'.$bar_width.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$bar_width.'%">
                                                          <span class="sr-only">'.(int)$bar_width.'% Complete</span>
                                                          </div>
                                                          </div>';
                                                    echo '</div>';
                                                    
                                                    echo '<div class="col-sm-1">';
                                                    echo (int)$bar_width .'%';
                                                    echo '</div>';
                                                    
                                                    echo '<div class="col-sm-2">';
                                                    echo '<a href="#updateTeam'.$rowsTeam->team_id.'" class="update" data-toggle="modal"> <span class="glyphicon glyphicon-pencil"></span> </a>';
                                                    echo ' | ';
                                                    echo '<a href="#deleteTeam'.$rowsTeam->team_id.'" class="delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>';
                                                    echo '</div>';
                                                    
                                                    echo '</div><hr>'; 
                                                } //this is the end close of while-loop in displaying all team
                                                ?>
                                        </div>
                                        </div>
                
                            <?php
                            
                                }  //this is the end close of while-loop in displaying all election name
                            ?> 
 
                

                
                
            </div>   
        </div>               
</div>
<script src="<?php echo base_url();?>js/js_controller/colorController.js"></script>
       
  



   