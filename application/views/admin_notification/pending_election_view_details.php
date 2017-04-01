<div class="panel-body">
                                    <?php 
                                    $pendingPosition    =   0;
                                    foreach($querys as $row){
                                        if($row->election_screening==0){
                                            echo '<b class="text-orange">';
                                            echo $row->election_name;
                                            echo '</b>'; ?>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    Created by:
                                                </div>
                                                <div class="col-sm-7">
                                                    <?php 
                                                    $this->db->where('admin_id',$row->election_created_by);
                                                    $queryRe    =   $this->db->get('admin_member_account');
                                                    foreach($queryRe->result() as $rows){
                                                        echo $rows->admin_firstname.' '.$rows->admin_lastname;
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                    Pending . Waiting to approve
                                    <hr>
                                    <?php
                                    $pendingPosition++;
                                        }
                                    }
                                    if($pendingPosition==0){
                                        echo '<small class="text-red">No pending election</small>';
                                    }
                                    ?>
                                </div>