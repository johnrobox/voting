            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">
                                        <i class="fa fa-list"></i>
                                        Election
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Election result </a>
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
                
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                This are the election's result
                            </div>
                            <div class="panel-body">
                                
                                
                                <ul class="nav nav-tabs" role="tablist" id="myTab">
                                    <?php
                                    foreach($querys as $row){
                                        if($this->session->userdata('LastElectionId')==$row->election_id){
                                            echo '<li class="active"><a href="#'.$row->election_id.'" role="tab" data-toggle="tab">'.ucwords(strtoupper($row->election_name)).'</a></li>';
                                        }else{
                                            echo '<li ><a href="#'.$row->election_id.'" role="tab" data-toggle="tab">'.ucwords(strtolower($row->election_name)).'</a></li>';
                                        }
                                    } ?>

                                </ul>
                                
                                <div class="tab-content">
                            <?php
                                foreach($querys as $row)
                                {
                                    $electionStatusModalControl =   $row->election_status;
                                    $electionName   =   $row->election_name;
                                    $Id =   $row->election_id;
                                    if($this->session->userdata('LastElectionId')==$row->election_id){ 
                                    echo '<div class="tab-pane fade in active" id="'.$Id.'">';
                                    }else{
                                      echo '<div class="tab-pane fade in" id="'.$Id.'">';  
                                    }//end of else
                            ?>
                                    <br>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Election Result of <?php echo strtoupper($row->election_name); ?>
                                            <form action="<?php echo base_url().'generate_election_result' ?>" method="post" enctype="multipart/form-data" target="_blank">
                                                <input type="hidden" name="ElectionId" value="<?php echo $row->election_id;?>"/>
                                                <button type="submit" class="btn btn-danger pull-right" style="margin-top:-27px;">Generate Result</button>
                                            </form>
                                        </div>
                                        <div class="panel-body">
                                        <?php 
                                        $this->db->where('position_election_id',$row->election_id);
                                        $queryPosition  =   $this->db->get('eposition');
                                        foreach($queryPosition->result() as $rowPosition){ ?>
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td style="background: #eee;">
                                                    <?php 
                                                    echo $rowPosition->position_name;
                                                    $positionId = $rowPosition->position_id;
                                                    ?>
                                                     (Position)
                                                </td>
                                                <td class = "text-center">
                                                    Total Votes
                                                </td>
                                            </tr>
                                            
                                                
                                                    <?php
                                                    $this->db->where('candidate_election_id',$Id);
                                                    $this->db->where('candidate_position_id',$rowPosition->position_id);
                                                    $queryCandidate =    $this->db->get('candidate_member');
                                                    foreach($queryCandidate->result() as $rowCandidate){
                                                        $candidateId    =   $rowCandidate->candidate_id;
                                                        $this->db->where('voters_id',$rowCandidate->candidate_voters_u_id);
                                                        $queryCandidateInfo = $this->db->get('voter_member');
                                                        foreach($queryCandidateInfo->result() as $rowInfo){ ?>
                                                            <tr>
                                                            <td>
                                                            <?php   echo $rowInfo->voters_firstname.' '.$rowInfo->voters_lastname; ?>
                                                            </td>
                                                            <td class = "text-center">
                                                              <?php
                                                              $this->db->where('candidate_id',$candidateId);
                                                              $this->db->where('election_id',$Id);
                                                              $queryResults = $this->db->get('election_result');
                                                              echo $queryResults->num_rows();
                                                              ?>
                                                            </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                               
                                            
                                        </table>
                                        <?php } ?>
                                        </div>
                                        <div class="panel-footer">
                                            
                                        </div>
                                    </div>
                            </div> <!--- end of tab-content ---->
                
                           <?php }?>
                            
                            
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
</div> 