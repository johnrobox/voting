            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-list"></i> View
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Candidates </a>
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
                
                
              <?php if($this->session->userdata('candidate_exist')!=''||$this->session->userdata('wrong_credentials')!=''){?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-times"></i> 
                                        <?php echo $this->session->userdata('candidate_exist');?>
                                        <?php echo $this->session->userdata('wrong_credentials'); ?>
                                    </div>
                
                     <?php }if($this->session->userdata('candidate_updated_success')!=''||$this->session->userdata('delete_candidate_okay')!=''){?>
                                    <div class="alert alert-info">
                                        <i class="fa fa-check"></i> 
                                        <?php echo $this->session->userdata('candidate_updated_success'); ?>
                                        <?php echo $this->session->userdata('delete_candidate_okay'); ?>
                                    </div>
                   <?php } if($this->session->userdata('nothing_change')!=''){ ?>
                                    <div class="alert alert-info">
                                        <i class="fa fa-info"></i> 
                                        <?php echo $this->session->userdata('nothing_change'); ?>
                                    </div>
                    <?php } $newdata   =   array(
                         'candidate_exist'  =>  '',
                         'wrong_credentials'=>'',
                        'nothing_change'    =>  '',
                        'candidate_updated_success' =>  '',
                        'delete_candidate_okay' =>  '');
                     $this->session->unset_userdata($newdata);?> 
                
                <?php foreach($querys as $row) { 
                    $Id =   $row->election_id;
                 $this->db->where('candidate_election_id',$row->election_id);
                 $this->db->order_by('candidate_team_id','asc');
                 $query =   $this->db->get('candidate_member');
                 if($query->num_rows()>0){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-table"></i> 
                                <span class="text-white tocapital">
                                    <b><?php echo $row->election_name; ?></b>
                                </span> 
                                list of candidates
                            </div>
                        
                            <table class="table table-hover table-bordered">
                                <tr><th>#</th><th><i class="fa fa-check-square-o"></i> Candidate Name</th><th><i class="fa fa-check-square-o"></i> Position Name</th><th><i class="fa fa-check-square-o"></i> Team Name</th><th><i class="fa fa-check-square-o"></i> Action</th></tr>
                                <?php $numberC=1;
                                foreach($query->result() as $rows){ 
                                    $candidateId    =   $rows->candidate_id;
                                    ?>
                                <tr>
                                    <td><?php echo $numberC;?></td>
                                    <td class="info">
                                        <i class="fa fa-user"></i> 
                                        <?php
                                        $this->db->where('voters_id',$rows->candidate_voters_u_id);
                                        $queryCandidateName =   $this->db->get('voter_member');
                                        foreach($queryCandidateName->result() as $candidateRow){
                                            echo $candidateRow->voters_firstname.' '.$candidateRow->voters_lastname;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $this->db->where('position_id',$rows->candidate_position_id);
                                        $queryPositionName  =   $this->db->get('eposition');
                                        foreach($queryPositionName->result() as $positionRow){
                                            $positionId =   $positionRow->position_id;
                                            echo $positionRow->position_name;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $teamId='';
                                        $this->db->where('team_id',$rows->candidate_team_id);
                                        $queryTeamName  =   $this->db->get('team');
                                        foreach($queryTeamName->result() as $teamRow){
                                            $teamId =   $teamRow->team_id;
                                            echo $teamRow->team_name;
                                        }
                                        if($teamId==''){
                                            echo '<small class="text-red">( INDEPENDENT CANDIDATE )</small>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($row->election_status==0){?>
                                        <?php if($teamId!=''){ ?>
                                        <a href="#updateCandidate<?php echo $Id.'_'.$teamId.'_'.$positionId.'_'.$candidateId; ?>" class="update" title="Update" data-toggle="modal"> <span class="glyphicon glyphicon-pencil"></span> </a>
                                                    |
                                        <a href="#deleteCandidate<?php echo $candidateId; ?>" class="delete" title="Delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                        <?php } else{ ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="#deleteCandidate<?php echo $candidateId; ?>" class="delete" title="Delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                       <?php  }}else{ ?>
                                        <small class="text-red">no action</small>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $numberC++; }?>
                            </table>
                                            <div class="panel-footer">
                                                <?php if($row->election_status=='started'){?>
                                                &nbsp;
                                                <span class="pull-right">
                                                Note: <small class="text-green">This election is currently started.</small>
                                                </span>
                                                <?php } ?>
                                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
                
            </div>   

        </div>               
</div>                
