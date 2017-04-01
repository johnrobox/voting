            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-list"></i> Manage
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Manage Election Voters </a>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                This are the list of course/s allowed to vote in <?php echo ucwords($row->election_name); ?>
                                <a href="#addCourse<?php echo $row->election_id; ?>" class="btn btn-primary pull-right" data-toggle="modal">Add Course</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr><th>Name of course</th><th>Action</th></tr>
                                    <?php 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $queryCourse    =   $this->db->get('election_voter_management');
                                    foreach($queryCourse->result() as $courseRow){ ?>
                                    <?php 
                                        if($courseRow->bs_ed==1){ ?>
                                            <tr>
                                                <td>
                                                    BSED - Bachelor of Science in Secondary Education
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>1" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->be_ed==1) {?>
                                            <tr>
                                                <td>
                                                    BEED - Bachelor of Science in Elementary Education
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>2" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_crim==1) {?>    
                                            <tr>
                                                <td>
                                                    BSCRIM - Bachelor of Science in Criminology
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>3" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_mare==1) {?>    
                                            <tr>
                                                <td>
                                                    BSMARE - Bachelor of Science in Marine Engineering
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>4" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_mt==1) {?>
                                            <tr>
                                                <td>
                                                    BSMT - Bachelor of Science in Marine Transportation
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>5" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ce==1) {?>
                                            <tr>
                                                <td>
                                                    BSCE - Bachelor of Science in Civil Engineering
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>6" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ee==1) {?>
                                            <tr>
                                                <td>
                                                    BSEE - Bachelor of Science in Electrical Engineering
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>7" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_me==1) {?>
                                            <tr>
                                                <td>
                                                    BSME - Bachelor of Science in Mechanical Engineering
                                                </td>
                                                <td>
                                                   <a href="#disable<?php echo $row->election_id; ?>8" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_it==1) {?>
                                            <tr>
                                                <td>
                                                    BSIT - Bachelor of Science in Information Technology
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>9" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ba==1) {?>
                                            <tr>
                                                <td>
                                                    BSBA - Bachelor of Science in Business Administration
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>10" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_hrm==1) {?>
                                            <tr>
                                                <td>
                                                    BSHRM - Bachelor of Science in Hotel and Restaurant Management
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>11" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_n==1) {?>
                                            <tr>
                                                <td>
                                                    BSN - Bachelor of Science in Nursing
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>12" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                     <?php } if($courseRow->a_hrm==1) {?>
                                            <tr>
                                                <td>
                                                    AHRM - Associate in Hotel and Restaurant Management
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>13" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                     <?php } if($courseRow->a_ct==1) {?>
                                            <tr>
                                                <td>
                                                    ACT - Associate in Computer Technology
                                                </td>
                                                <td>
                                                    <a href="#disable<?php echo $row->election_id; ?>14" class="btn btn-danger btn-xs" data-toggle="modal">Disable</a>
                                                </td>
                                            </tr>
                                     <?php } ?>
                                   <?php } ?>
                                </table>
                            </div>
                            <div class="panel-footer"></div>
                        </div> 
                        
                    </div>
                </div>
                </div>
                <?php } ?>
                
                
            </div>   

        </div>               
</div>                
