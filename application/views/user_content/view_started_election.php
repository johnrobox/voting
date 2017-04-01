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
                <div class="well">
                    <?php $viewer =   0; foreach($query as $row){$viewer++;}?>
                    <?php if($viewer>0){?>
                    <div class="panel panel-info">
                        <div class="panel-heading">Choose elections</div>
                        <div class="panel-body">
                        <?php foreach($query as $row){ ?>
                            
                            
                            <?php if($this->session->userdata('registered_voters_course')=='BSED - Bachelor of Science in Secondary Education'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_ed',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BEED - Bachelor of Science in Elementary Education'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('be_ed',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSCRIM - Bachelor of Science in Criminology'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_crim',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSMARE - Bachelor of Science in Marine Engineering'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_mare',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSMT - Bachelor of Science in Marine Transportation'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_mt',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSCE - Bachelor of Science in Civil Engineering'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_ce',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSEE - Bachelor of Science in Electrical Engineering'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_ee',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSME - Bachelor of Science in Mechanical Engineering'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_me',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSIT - Bachelor of Science in Information Technology'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_it',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSBA - Bachelor of Science in Business Administration'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_ba',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSHRM - Bachelor of Science in Hotel and Restaurant Management'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_hrm',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='BSN - Bachelor of Science in Nursing'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('bs_n',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='AHRM - Associate in Hotel and Restaurant Management'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('b_hrm',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php }if($this->session->userdata('registered_voters_course')=='ACT - Associate in Computer Technology'){ 
                                    $this->db->where('manage_election_id',$row->election_id);
                                    $this->db->where('a_ct',1);
                                    $queryAllowed   =   $this->db->get('election_voter_management');
                                       if($queryAllowed->num_rows()==1){ ?>
                                            <div class="alert alert-success alert-dismissable">
                                              <div class = "row" style = "margin: 0 auto;">
                                                <div class = "col-sm-3">
                                                    <div class = "col-sm-12 text-center" style = "background: #428bca; color: #fff; padding: 1%;">
                                                        <span>
                                                            <b><h3><?php echo strtoupper($row->election_name); ?></h3></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-7">
                                                    <div class = "col-sm-12" style = "background: #fff; color: #428bca; margin-top: .5%; padding: 1%;">
                                                        <span class = "text-center"><b> Description: </b>
                                                            <?php echo strtoupper($row->election_description); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-2">
                                                    <?php echo form_open(base_url().'session_electionChoosen'); ?>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="hidden" name="electionName" value="<?php echo $row->election_name; ?>"/>
                                                    <input type="submit" class="btn btn-primary" value="Click me to vote."/>
                                                    <?php echo form_close(); ?>
                                                </div>
                                              </div>    
                                            </div>
                                       <?php } ?>
                            <?php } ?>
                            
                            
                            
                        <?php } ?>
                        </div>
                        
                    </div>
                    <?php }else{ ?>
                    <div class="alert  alert-danger alert-dismissable">
                        No election started as now.
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
