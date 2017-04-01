           
            
            <div class="col-sm-9" >
            
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-pencil-square-o"></i> Register
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
                
                
                <!---- The session for the return page starts here ----->
                <?php 
                    $returnPage =   array('return_page'=>'register_candidates');
                    $this->session->set_userdata($returnPage);
                ?>
                <!---- The session for the return page ends here   ----->
                
                
                <!---- The register update delete validation alert starts here  ------>
                  
                     <?php if($this->session->userdata('candidate_exist')!=''||$this->session->userdata('wrong_credentials')!=''){?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-times"></i> 
                                        <?php echo $this->session->userdata('candidate_exist');?>
                                        <?php echo $this->session->userdata('wrong_credentials'); ?>
                                    </div>
                
                     <?php }if($this->session->userdata('candidate_registered_success')!=''||$this->session->userdata('candidate_updated_success')!=''||$this->session->userdata('delete_candidate_okay')!=''){?>
                                    <div class="alert alert-info">
                                        <i class="fa fa-check"></i> 
                                        <?php echo $this->session->userdata('candidate_registered_success');?>
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
                        'delete_candidate_okay' =>  '',
                         'candidate_registered_success'   =>  '');
                     $this->session->unset_userdata($newdata);?> 
                <!---- The register update delete validation alert ends here  ------>
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
                <!--- end --->

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
                            <div class="row"><br/>
                            <div class="col-sm-12">
                                <h5>This are the list of TEAMS for <span style = "color: blue;" class = "tocapital"><?php echo $electionName;?></span></h5> 
                               <?php $this->db->where('position_election_id',$Id);
                               $queryPosition = $this->db->get('eposition');
                               if($queryPosition->num_rows()!=0) { ?>
                                <span class="pull-right">
                                    <a href="#<?php echo $Id ?>IndependentRegistration" data-toggle="modal" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-square-o"></i> 
                                        Register Independent Candidate?
                                    </a>
                                </span>
                                <?php } ?>
                                
                                <?php if($electionStatusModalControl==1){ ?>
                                  <span class="pull-right"><b>Note : </b><span class="text-green">Election has been started</span></span>
                                <?php } 
                                $this->db->where('team_election_id',$Id);
                                $query1 =   $this->db->get('team');
                                foreach ($query1->result() as $rows)
                                {
                                   $teamName    =   $rows->team_name; 
                                   $teamId  =   $rows->team_id; ?>
                                   <table class="table table-bordered table-hover">
                                       <tr>
                                           <th class="info"><i class="fa fa-group"></i> <?php echo $teamName;?></th>
                                       </tr>
                                       <tr class="active">
                                           <th>Position Name</th><th> Registered </th><th> Candidates Name </th><th> Action </th>
                                       </tr>
                                    <?php
                                    $this->db->where('position_election_id',$Id);
                                    $query2  =   $this->db->get('eposition');
                                    foreach($query2->result() as $rows1)
                                    {
                                       $positionName   =   $rows1->position_name;
                                       $positionId  =   $rows1->position_id;?>
                                       <tr>
                                           <td><?php echo $positionName;?></td>
                                           <td>
                                               <?php 
                                               $this->db->where('candidate_election_id',$Id);
                                               $this->db->where('candidate_team_id',$teamId);
                                               $this->db->where('candidate_position_id',$positionId);
                                               $query3  =   $this->db->get('candidate_member');
                                               if($query3->num_rows()>0){ ?>
                                              <img src="<?php echo base_url();?>img/other/check.png">
                                               <?php }else { ?>
                                              <img src="<?php echo base_url();?>img/other/wrong.png">
                                              <?php
                                              if($rows1->position_screening==0){ ?>
                                              <small class="text-orange">Position Pending</small>
                                             <?php }} ?>
                                           </td>
                                        <?php
                                        if($query3->num_rows()==0&&$rows1->position_screening==1) { ?>
                                           <td>
                                               <a href="#candidate<?php echo $Id.'_'.$positionId.'_'.$teamId; ?>" data-toggle="modal" title="Click here to register candidate."><i class="fa fa-pencil-square-o"></i> Click to Register Candidate</a>
                                           </td>
                                           <td></td>
                                        <?php    
                                        }else{
                                            $this->db->where('candidate_election_id',$Id);
                                            $this->db->where('candidate_team_id',$teamId);
                                            $this->db->where('candidate_position_id',$positionId);
                                            $query4 =   $this->db->get('candidate_member');
                                            foreach($query4->result() as $rows2)
                                                { ?>
                                            <td>
                                                <?php 
                                                $this->db->where('voters_id',$rows2->candidate_voters_u_id);
                                                $queryCandidateInfo =   $this->db->get('voter_member');
                                                foreach($queryCandidateInfo->result() as $crows){ ?>
                                                <i class="fa fa-user"></i> 
                                                <?php
                                                    echo $crows->voters_firstname.' '.$crows->voters_lastname;
                                                }
                                                ?>
                                            </td>
                                                <?php $candidateId    =   $rows2->candidate_id; ?>
                                            <td>
                                                <?php if($electionStatusModalControl==0){ ?>
                                                        <a href="#updateCandidate<?php echo $Id.'_'.$teamId.'_'.$positionId.'_'.$candidateId; ?>" class="update" title="Update" data-toggle="modal"> <span class="glyphicon glyphicon-pencil"></span> </a>
                                                         | 
                                                        <a href="#deleteCandidate<?php echo $candidateId; ?>" class="delete" title="Delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                                <?php }else{ ?>
                                                            no action
                                                <?php } ?>
                                             </td>
                                        <?php } 
                                        }//end of else   ?>
                                     </tr>   
                                  <?php }//end of foreach ?>
                                    
                                   </table>
                             <?php }//end of foreach ?>
                                
                            
                            </div> <!--- end of col-sm 12 ---->
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"> Independent Candidates of <?php echo $electionName; ?></div>
                                        <div class="panel-body">
                                            <?php
                                            $this->db->where('candidate_election_id',$Id);
                                            $this->db->where('candidate_team_id',0);
                                            $queryI =   $this->db->get('candidate_member');
                                            if($queryI->num_rows()>0){ ?>
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th>Candidate Name</th><th>Position Name</th><th>Action</th>
                                                </tr>
                                                    <?php
                                                    foreach($queryI->result() as $row){ ?>
                                                    <tr>
                                                        <td>
                                                        <?php
                                                        $this->db->where('voters_id',$row->candidate_voters_u_id);
                                                        $queryCandidate = $this->db->get('voter_member');
                                                        foreach($queryCandidate->result() as $row1){
                                                            echo $row1->voters_firstname.' '.$row1->voters_lastname;
                                                        } ?>
                                                        </td><td>
                                                            <?php
                                                        $this->db->where('position_id',$row->candidate_position_id);
                                                        $queryPosition = $this->db->get('eposition');
                                                        foreach($queryPosition->result() as $row2){
                                                            echo $row2->position_name;
                                                        } ?>
                                                        </td>
                                                        <td>
                                                            <?php if($electionStatusModalControl==0){ ?>
                                                                    <a href="#deleteCandidate<?php echo $row->candidate_id; ?>" class="delete" title="Delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                                            <?php }else{ ?>
                                                                        no action
                                                            <?php } ?>
                                                         </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                
                                            </table>
                                            <?php
                                            }else{
                                                echo 'No Independent Candidate of this election.';
                                            }
                                            ?>
                                        </div>
                                        <div class="panel-footer">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                            </div> <!--- end of tab-content ---->
                
                           <?php }?>
                        </div>

                    
                
                
            </div>   
        </div>               
</div>
       
      
