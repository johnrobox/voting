<div  class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <a href="#" style="color:white;" class="navbar-brand" >Online Voting System</a>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" style="color:white;" class="dropdown-toggle" data-toggle="dropdown"> Welcome &nbsp;<span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('registered_voters_username');?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url().'logout_voter';?>">Logout</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="container ">
            <div style="margin-top: 80px;">
                
                <!-- START: alert session display ---->
                <?php if($this->session->userdata('already_vote')!=''){?>
                <div class="alert alert-warning alert-dismissable">
                    <?php echo $this->session->userdata('already_vote'); ?>
                </div>
                <?php }if($this->session->userdata('vote_success')!=''){ ?>
                <div class="alert alert-success alert-dismissable">
                    <?php echo $this->session->userdata('vote_success'); ?>
                </div>
                <?php } ?>
                <!-- END: alert session display ---->
                
                <!-- START: session unset here  ---->
                <?php $newdata  =   array('already_vote'=>'','vote_success'=>'');
                $this->session->unset_userdata($newdata);
                ?>
                <!-- END  : session unset here  ---->
                
                <div class="row">
                    <!-- START viewing of ballots --->
                    <div class="col-sm-7">
                        <div class="breadcrumb">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><b>BALLOT</b></div>
                                <div class="panel-body">
                                    <div class="alert alert-success alert-dismissable">
                                        <?php 
                                        echo form_open(base_url().'view_balotsN');
                                        $this->db->where('position_election_id',$this->session->userdata('electionId_Choosen'));
                                        $queryPosition =   $this->db->get('eposition');
                                        foreach($queryPosition->result() as $positionRow){ ?>
                                        <div class="form-group">
                                            <label><?php echo $positionRow->position_name; ?></label>
                                            <select name="<?php echo $positionRow->position_id; ?>" class="form-control" required="">
                                                <option value="">. . . . Select candidate for <?php echo $positionRow->position_name; ?> . . . .</option>
                                                <?php 
                                                $this->db->where('candidate_election_id',$this->session->userdata('electionId_Choosen'));
                                                $this->db->where('candidate_position_id',$positionRow->position_id);
                                                $queryCandidate =   $this->db->get('candidate_member');
                                                foreach($queryCandidate->result() as $candidateRow){
                                                    $candidateId    =   $candidateRow->candidate_id;
                                                    $this->db->where('voters_id',$candidateRow->candidate_voters_u_id);
                                                    $queryCandidateInfo =   $this->db->get('voter_member');
                                                    foreach($queryCandidateInfo->result() as $candidateInfoRow){ ?>
                                                        <option value="<?php echo $candidateId; ?>">
                                                            <?php echo $candidateInfoRow->voters_firstname.' '.$candidateInfoRow->voters_firstname; ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php } ?>
                                            <div style="margin-top:20px;margin-bottom: 50px;">
                                            <input type="submit" value="Submit Vote" class="btn btn-primary pull-right"/>
                                            <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                                            <a href="<?php echo base_url().'choose_election';?>" class="btn btn-default pull-right">Back</a>
                                            </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END viewing of ballots ---->
                    <!-- START  viewing of candidate together the team they belong ---->
                    <div class="col-sm-5">
                        <div class="breadcrumb">
                            <div class="panel panel-primary">
                                <div class="panel-heading">PARTYLIST'S</div>
                                <div class="panel-body">
                                    <?php 
                                    $this->db->where('team_election_id',$this->session->userdata('electionId_Choosen'));
                                    $queryTeam  =   $this->db->get('team');
                                    foreach($queryTeam->result() as $teamRow){
                                    ?>
                                        <div class = "panel panel-info">
                                            <div class = "panel panel-heading text-center">TEAM <?php echo $teamRow->team_name; ?></div>
                                                <div class = "panel panel-body">
                                                    <table class="table table-bordered table-hover">
                                                      
                                                                <?php
                                                                $this->db->where('position_election_id',$this->session->userdata('electionId_Choosen'));
                                                                $queryPosition  =   $this->db->get('eposition');
                                                                foreach($queryPosition->result() as $positionRow){
                                                                    echo '<tr><td><small>';
                                                                    echo $positionRow->position_name;
                                                                    echo '</small></td>';
                                                                    echo '<td><small>';
                                                                    $this->db->where('candidate_election_id',$this->session->userdata('electionId_Choosen'));
                                                                    $this->db->where('candidate_team_id',$teamRow->team_id);
                                                                    $this->db->where('candidate_position_id',$positionRow->position_id);
                                                                    $queryCandidate =   $this->db->get('candidate_member');
                                                                    foreach($queryCandidate->result() as $candidateRow){
                                                                        $this->db->where('voters_id',$candidateRow->candidate_voters_u_id);
                                                                        $queryCandidateInfo =   $this->db->get('voter_member');
                                                                        foreach($queryCandidateInfo->result() as $candidateInforRow){
                                                                            echo $candidateInforRow->voters_firstname.' '.$candidateInforRow->voters_lastname;
                                                                        }
                                                                        
                                                                    }
                                                                    echo '</small></td>';
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                    </table>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $this->db->where('candidate_election_id',$this->session->userdata('electionId_Choosen'));
                                    $this->db->where('candidate_team_id',0);
                                    $queryIndependent = $this->db->get('candidate_member');
                                    if($queryIndependent->num_rows()>0){
                                    ?>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">Independent Candidate/s</div>
                                        <div class="panel-body">
                                    <?php 
                                    $this->db->where('candidate_election_id',$this->session->userdata('electionId_Choosen'));
                                    $this->db->where('candidate_team_id',0);
                                    $queryIndependent = $this->db->get('candidate_member');
                                    foreach($queryIndependent->result() as $crows){
                                        $this->db->where('voters_id',$crows->candidate_voters_u_id);
                                        $queryName  =   $this->db->get('voter_member');
                                        foreach($queryName->result() as $row){
                                            echo $row->voters_firstname.' '.$row->voters_lastname;
                                        }
                                        $this->db->where('position_id',$crows->candidate_position_id);
                                        $queryPosition = $this->db->get('eposition');
                                        foreach($queryPosition->result() as $row){
                                            echo ' - <small style="color:orange">';
                                            echo $row->position_name;
                                            echo '</small>';
                                        }
                                    } ?>
                                        </div>
                                        <div class="panel-footer"></div>
                                    </div>
                                   <?php } ?>
                                </div>
                            </div>
                        </div>
                        <p class = "text-center" style = "color: #eee;"> Online Voting System <br/> Copyright &copy; 2015 </p>
                    </div>
                    <!-- END  viewing of candidate together the team they belong ---->
                    
                </div>
            </div>
        </div>
