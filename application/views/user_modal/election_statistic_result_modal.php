
<?php
    $this->db->where('election_status',1);
    $query  =   $this->db->get('election_info');
    foreach($query->result() as $row){ 
        $ElectionId     =   $row->election_u_id;
        $this->db->where('election_id',$ElectionId);
        
                $queryElectionName  =   $this->db->get('election');
                foreach($queryElectionName->result() as $eRow){
                    $electionName   =   $eRow->election_name;
                }
        ?>

        <div class="modal fade" id="electionId<?php echo $row->election_u_id;?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style = " background: #428bca;">
                        <center>
                            <h5 class = "text-center" style = "color: #fff;">
                                Election Statistics of <i><?php echo strtoupper($electionName); ?></i>
                                <a href = "" class="fa fa-times pull-right" style = "color: black;" title = "Close" data-dismiss="modal"></a>
                            </h5>
                        </center>
                    </div>
                    <div class="modal-body">
                        
                        
                        <?php
                        //count the registered voters that allow to vote
                        $voter = 0;
                        $queryCourse = $this->db->get('registered_voter');
                        foreach($queryCourse->result() as $rowVoter){
                            $this->db->where('voters_id',$rowVoter->registered_voters_u_id);
                            $queryVoterCourse = $this->db->get('voter_member');
                            foreach($queryVoterCourse->result() as $rowCourse){
                                if($rowCourse->voters_course=='BSED - Bachelor of Science in Secondary Education'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_ed',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BEED - Bachelor of Science in Elementary Education'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('be_ed',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSCRIM - Bachelor of Science in Criminology'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_crim',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSMARE - Bachelor of Science in Marine Engineering'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_mare',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSMT - Bachelor of Science in Marine Transportation'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_mt',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSCE - Bachelor of Science in Civil Engineering'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_ce',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSEE - Bachelor of Science in Electrical Engineering'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_ee',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSME - Bachelor of Science in Mechanical Engineering'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_me',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSIT - Bachelor of Science in Information Technology'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_it',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSBA - Bachelor of Science in Business Administration'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_ba',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSHRM - Bachelor of Science in Hotel and Restaurant Management'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_hrm',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='BSN - Bachelor of Science in Nursing'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('bs_n',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='AHRM - Associate in Hotel and Restaurant Management'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('a_hrm',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } else if($rowCourse->voters_course=='ACT - Associate in Computer Technology'){
                                    $this->db->where('manage_election_id',$ElectionId);
                                    $this->db->where('a_ct',1);
                                    $queryAllow = $this->db->get('election_voter_management');
                                    if($queryAllow->num_rows()==1){
                                        $voter++;
                                    }
                                } 
                            }
                        }
                        
                        ?>
                        
                        
                        
                        <div class="jumbotron">
                            
                            <div class="well">
                                <div class="row">
                                    
                                            <div class="col-sm-3">
                                                <img src="<?php echo base_url().'img/user/avatar3.png' ?>" class = "img-responsive" style = "background-color:blue"/>
                                            </div>
                                    
                                </div>
                            </div>
                            
                                        <?php 
                                        $this->db->where('position_election_id',$ElectionId);
                                        $queryPosition  =   $this->db->get('eposition');
                                        foreach($queryPosition->result() as $rowPosition){ ?>
                                        <table class="table" style = "border: 7px solid #fff;">
                                            <tr>
                                                <td style="background: skyblue;">
                                                    <?php 
                                                    echo $rowPosition->position_name;
                                                    $positionId = $rowPosition->position_id;
                                                    ?>
                                                </td>
                                                <td style="color: #fff; background-color: #428bca;">
                                                    Percentage
                                                </td>
                                            </tr>
                                            
                                                
                                                    <?php
                                                    $this->db->where('candidate_election_id',$ElectionId);
                                                    $this->db->where('candidate_position_id',$rowPosition->position_id);
                                                    $queryCandidate =    $this->db->get('candidate_member');
                                                    foreach($queryCandidate->result() as $rowCandidate){
                                                        $this->db->where('team_id',$rowCandidate->candidate_team_id);
                                                        $queryTeamColor = $this->db->get('team');
                                                        foreach($queryTeamColor->result() as $rowColor){
                                                            
                                                        }
                                                        $candidateId    =   $rowCandidate->candidate_id;
                                                        $this->db->where('voters_id',$rowCandidate->candidate_voters_u_id);
                                                        $queryCandidateInfo = $this->db->get('voter_member');
                                                        foreach($queryCandidateInfo->result() as $rowInfo){ ?>
                                                            <tr>
                                                            <td>
                                                                <?php 
                                                                $this->db->where('candidate_id',$candidateId);
                                                                  $this->db->where('election_id',$ElectionId);
                                                                  $queryResults = $this->db->get('election_result');
                                                                  $vote = $queryResults->num_rows(); 
                                                                  $bar = ($vote/$voter)*100;
                                                                ?>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width: <?php echo (int)$bar; ?>%;" aria-valuenow="<?php echo (int)$bar; ?>" aria-valuemin="0" aria-valuemax="100" >
                                                                        <span class="sr-only"><?php echo (int)$bar; ?>% Complete</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width: 100px;">
                                                              <?php 
                                                                 echo (int)$bar; 
                                                              ?> %
                                                            </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                               
                                            
                                        </table>
                                        <?php } ?>
                                        </div>
                        
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

<?php 
   }

?>
