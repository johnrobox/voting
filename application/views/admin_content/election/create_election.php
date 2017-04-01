           
            
            <div class="col-sm-9" >
            
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Create
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Election </a>
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
                    $returnPage =   array('return_page'=>'create_election');
                    $this->session->set_userdata($returnPage);
                ?>
                <!---- The session for the return page ends here   ----->
                <!---- The update delete position modal alert starts here --->
                <?php 
                if (($this->session->userdata('delete_election_okay')!='')||($this->session->userdata('update_election_okay')!='')||($this->session->userdata('create_election_okay')!='')){?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i> 
                            <?php 
                            echo $this->session->userdata('create_election_okay');
                            echo $this->session->userdata('delete_election_okay');
                            echo $this->session->userdata('update_election_okay');
                            ?>
                        </div>
                        <?php }?>
                <?php if($this->session->userdata('election_exist')!=''){ ?>
                <div class="alert alert-danger">
                    <i class="fa fa-times"></i>
                    <?php echo $this->session->userdata('election_exist'); ?>
                </div>
                <?php } ?>
                
                <?php
                $newdata    =   array(
                                'delete_election_okay'=>'',
                                'create_election_okay'=>'',
                                'update_election_okay'=>'',
                                'election_exist'=>'');
                            $this->session->unset_userdata($newdata);
                ?>
                
                <!---- The update delete position modal alert starts here --->
                <div class="row">
                    <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>CREATE ELECTION</h4>
                        </div>
                        <div class="panel-body">
                        <form role="form" action="<?php echo base_url();?>create_election_exec" method="post">
                             <div class="form-group">
                                  <label for="ElectionName">Election Name</label>
                                  <i class="text-red"><?php echo form_error('electionName');?></i>
                                  <input type="text" class="form-control" name="electionName" id="ElectionName" value="<?php echo set_value('electionName');?>">
                             </div>
                             <div class="form-group">
                                  <label for="ElectionDescription">Description</label>
                                  <i class="text-red"><?php echo form_error('electionDescription');?></i>
                                  <textarea class="form-control" rows="2" name="electionDescription" id="ElectionDescription"><?php echo set_value('electionDescription');?></textarea>
                             </div>
                             <div class="form-group pull-right">
                                  <button class="btn btn-default" type="reset">Clear</button>
                                  <button class="btn btn-primary" type="submit">Create</button>
                             </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Election List 
                            <small class="pull-right">
                            ( <b>
                                <span>
                                    <?php $queryNumberOfElection = $this->db->get('election'); echo $queryNumberOfElection->num_rows();?>
                                </span>
                            ) Election found
                            </b>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                            approved ( <span class="text-green">
                                         <?php
                                         $this->db->where('election_screening',1);
                                         $queryApproved = $this->db->get('election_info');
                                         echo $queryApproved->num_rows();
                                         ?>
                                       </span>)
                            pending  ( <span class="text-orange">
                                         <?php
                                         $this->db->where('election_screening',2);
                                         $queryApproved = $this->db->get('election_info');
                                         echo $queryApproved->num_rows();
                                         ?>
                                       </span> )
                            canceled ( <span class="text-red">
                                         <?php
                                         $this->db->where('election_screening',3);
                                         $queryApproved = $this->db->get('election_info');
                                         echo $queryApproved->num_rows();
                                         ?>
                                       </span> )
                            </small>
                        </div>
                        
                        <table class="table">
                            <tr><th>#</th><th> Name </th><th></th><th>Action</th></tr>
                            <?php
                             $number    =   1;
                             foreach($querys as $row){ ?>
                                  <tr>
                                      <td>
                                          <?php echo $number; ?>
                                      </td>
                                      <td class="sethover">
                                        <button class="electionnameSetButton popover-dismisss"  data-toggle="popover" title="Description" 
                                                data-content="<?php echo $row->election_description;?>
                                                Created by :<?php $this->db->where('admin_id',$row->election_created_by);
                                                    $queryRe    =   $this->db->get('admin_member_account');
                                                    foreach($queryRe->result() as $rows){
                                                        echo $rows->admin_firstname.' '.$rows->admin_lastname;
                                                    }?>">
                                            <?php echo $row->election_name; ?>
                                        </button>
                                      </td>
                                 <?php
                                  if($row->election_screening  ==  1 &&  $row->election_status ==  0){
                                 ?>
                                      <td class="text-green">
                                          <span id="get<?php echo $number; ?>" data-toggle="tooltip" data-placement="top" 
                                                title="created by :<?php $this->db->where('admin_id',$row->election_created_by);
                                                    $queryRe    =   $this->db->get('admin_member_account');
                                                    foreach($queryRe->result() as $rows){
                                                        echo $rows->admin_firstname.' '.$rows->admin_lastname;
                                                    }?>">
                                              <?php if($row->election_screening==1){ ?>
                                                     Approved
                                              <?php }else if ($row->election_screening==0){ ?>
                                                     Pending
                                              <?php }else{ ?>
                                                     Cancel
                                              <?php } ?>
                                          </span>
                                      </td>
                                  <?php }
                                  else if($row->election_screening    ==  1 &&   $row->election_status ==  1){ ?>
                                      <td> 
                                          <small class="pull-right text-blue">This election is already started </small>
                                      </td>
                                  <?php }
                                  else if($row->election_screening    ==  0){ ?>
                                      <td class="text-orange">
                                          <span id="get<?php echo $number; ?>" data-toggle="tooltip" data-placement="top" 
                                               title="created by :
                                                        <?php $this->db->where('admin_id',$row->election_created_by);
                                                        $queryRe    =   $this->db->get('admin_member_account');
                                                        foreach($queryRe->result() as $rows){
                                                        echo $rows->admin_firstname.' '.$rows->admin_lastname;}?>">
                                              Pending
                                          </span>
                                      </td> 
                                 <?php }
                                  else{ ?>
                                      <td class="text-red">
                                          <span id="get<?php echo $number;?>" data-toggle="tooltip" data-placement="top" 
                                                 title="created by :<?php $this->db->where('admin_id',$row->election_created_by);
                                                        $queryRe    =   $this->db->get('admin_member_account');
                                                        foreach($queryRe->result() as $rows){
                                                        echo $rows->admin_firstname.' '.$rows->admin_lastname;}?>">
                                              <?php echo $row->election_screening; ?>
                                          </span>
                                      </td>
                                      <?php
                                  }if($row->election_status  != 1){?>
                                  <td> 
                                        <a href="#update<?php echo $row->election_id;?>" class="update" data-toggle="modal"><span class="glyphicon glyphicon-pencil" title=" update "></span> </a>
                                        |
                                        <a href="#delete<?php echo $row->election_id;?>" class="delete" data-toggle="modal" ><span class="glyphicon glyphicon-trash" title=" delete "></span> </a>
                                  </td>
                                  <?php }else{ echo '<td></td>';} ?>
                                  </tr>
                                  <?php
                                          $number++;
                            }?>
                        </table>   
                    </div>
                    </div>
                </div>
                
                
            </div>   
        </div>               
</div>
       
