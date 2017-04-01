<div class="panel-body">
                                    <?php 
                                    $approvedElection   =   0;
                                    foreach($querys as $row){
                                        if($row->election_screening==1){
                                        echo '<b class="text-green">';
                                        echo $row->election_name; 
                                        echo '</b>'; ?>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            Created by :
                                        </div>
                                        <div class="col-sm-7">
                                            <small>
                                            <?php 
                                            $this->db->where('admin_id',$row->election_created_by);
                                            $queryRe    =   $this->db->get('admin_member_account');
                                            foreach($queryRe->result() as $rows){
                                                echo $rows->admin_firstname.' '.$rows->admin_lastname;
                                            }
                                                ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            Status :
                                        </div>
                                        <div class="col-sm-7">
                                            <small>
                                            <?php if($row->election_status==0){ ?>
                                                Stoped
                                            <?php }else { ?>
                                                Started
                                                <?php } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            # of position's
                                        </div>
                                        <div class="col-sm-7">
                                            <small>
                                            <?php 
                                            $this->db->where('position_election_id',$row->election_id);
                                            $queryPosition  =   $this->db->get('eposition');
                                            $numberPosition =   0;
                                            foreach($queryPosition->result() as $rowPosition){
                                              $numberPosition++;  
                                            }
                                            echo $numberPosition;
                                            ?>
                                            </small>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                    $approvedElection++;
                                        }
                                    }
                                    if($approvedElection==0){ ?>
                                        <small class="text-red">
                                            No Approved Election
                                        </small>
                                        <?php
                                    }
                                    ?>
</div>