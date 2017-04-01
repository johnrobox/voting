           
            
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Election
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> My Approved Election </a>
                                    </span>
                                    
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
                if($this->session->userdata('user_role')==2) {
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Pending Election</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Election Name</th>
                                    </tr>
                                <?php 
                                $this->db->where('election_created_by',$this->session->userdata('user_id'));
                                $this->db->where('election_screening',1);
                                $this->db->where('election_notify',1);
                                $queryPending = $this->db->get('election_info');
                                foreach($queryPending->result() as $row){
                                    $this->db->where('election_created_by',$this->session->userdata('user_id'));
                                    $this->db->update('election_info',array('election_notify'=>''));
                                    ?>
                                    <tr>
                                        <td>
                                            <?php $this->db->where('election_id',$row->election_u_id);
                                            $queryE = $this->db->get('election');
                                            foreach($queryE->result() as $Erow) {?>
                                            <?php echo ucwords(strtolower($Erow->election_name));
                                            }?>
                                        </td>
                                        <td>
                                            <span class="text-green">Approved</span>
                                        </td>
                                    </tr>
                                 <?php } ?>
                                </table>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                
                <?php } ?>
                
            </div>   
        </div>               
</div>
       

