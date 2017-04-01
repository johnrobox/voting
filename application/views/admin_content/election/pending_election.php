           
            
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Election
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Pending Election </a>
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
                if($this->session->userdata('user_role')==1) {
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Pending Election</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Election Name</th><th></th><th>Action</th>
                                    </tr>
                                <?php 
                                $this->db->where('election_screening',0);
                                $queryPending = $this->db->get('election_info');
                                foreach($queryPending->result() as $row){
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
                                            <span class="text-orange">Pending</span>
                                        </td>
                                        <td>
                                            <a href="#approve<?php echo $row->election_u_id; ?>" class="btn btn-success" data-toggle="modal">Approve it now!</a>
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
                <div class="alert alert-danger">
                    <h1> You are not allowed to view this page. </h1>
                </div>
                <?php } ?>
                
            </div>   
        </div>               
</div>
       

