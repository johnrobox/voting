            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-list"></i> View
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Elections </a>
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
                    $returnPage =   array('return_page'=>'view_elections');
                    $this->session->set_userdata($returnPage);
                ?>
                <!---- The session for the return page ends here   ----->
                <!---- The update delete position modal alert starts here --->
                <?php 
                if (($this->session->userdata('delete_election_okay')!='')||($this->session->userdata('update_election_okay')!='')||($this->session->userdata('create_election_okay')!='')){?>
                        <div class="alert alert-success alert-dismissable">
                            <?php 
                            echo $this->session->userdata('create_election_okay');
                            echo $this->session->userdata('delete_election_okay');
                            echo $this->session->userdata('update_election_okay');
                            $newdata    =   array(
                                'delete_election_okay'=>'',
                                'create_election_okay'=>'',
                                'update_election_okay'=>'');
                            $this->session->unset_userdata($newdata);
                            ?>
                        </div>
                        <?php }?>
                <!---- The update delete position modal alert starts here --->
                <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4><i class="fa fa-table"></i> Election List </h4></div>
                        <table class="table table-hover table-bordered">
                            <tr class="active">
                                <th>No.</th><th>Election Name</th><th></th><th>Status</th><th>#ofPosition</th><th>#ofTeam</th><th>Create by</th><th>Action</th>
                            </tr>
                            <?php 
                            $numberE    =   1;
                            foreach($querys as $row){ ?>
                                <tr>
                                    <td>
                                            <?php echo $numberE; ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-check-square-o"></i>
                                            <?php echo $row->election_name; ?>
                                    </td>
                                    <td>
                                            <?php if($row->election_screening==1){ ?>
                                               <span class="text-green">Approved</span>
                                            <?php }if($row->election_screening==0){ ?>
                                               <span class="text-orange">Pending</span>
                                            <?php }if($row->election_screening=='Canceled'){ ?>
                                               <span class="text-red">Canceled</span>
                                            <?php } ?>
                                    </td>
                                    <td>
                                            <?php if($row->election_status==1){ ?>
                                                Started
                                            <?php }else{ ?>
                                                Stoped
                                            <?php } ?>
                                    </td>
                                    <?php
                                    $this->db->where('position_election_id',$row->election_id);
                                    $queryP =   $this->db->get('eposition'); ?>
                                    <td>
                                        <?php echo $queryP->num_rows(); ?>
                                    </td>
                                    <?php
                                    $this->db->where('team_election_id',$row->election_id);
                                    $queryT =   $this->db->get('team'); ?>
                                    <td>
                                        <?php echo $queryT->num_rows(); ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-user"></i> 
                                        <?php 
                                        $this->db->where('admin_id',$row->election_created_by);
                                        $queryAdmin =   $this->db->get('admin_member_account');
                                        foreach($queryAdmin->result() as $adminRow){
                                            echo $adminRow->admin_firstname.' '.$adminRow->admin_lastname;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <?php if($row->election_screening    ==  1 &&   $row->election_status == 1){ ?>
                                            <span class="text-green">This election is now started</span>
                                    <?php }else{ ?>
                                        <a href="#update<?php echo $row->election_id;?>" title="Update" class="update" data-toggle="modal"><span class="glyphicon glyphicon-pencil" ></span> </a>
                                        |
                                        <a href="#delete<?php echo $row->election_id;?>" title="Delete" class="delete" data-toggle="modal" ><span class="glyphicon glyphicon-trash" ></span> </a>   
                                    <?php } ?>
                                    
                                </td>
                                <?php
                                echo '</tr>';
                                $numberE++;
                            }
                            ?>
                        </table>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
            </div>
           </div>
        </div>               
</div>                
