           
            
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Position
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Pending Position </a>
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
                            <div class="panel-heading">Pending Position</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                <tr class="active"><th> Position Name</th><th></th><th> Position Created by</th><th><i class="fa fa-circle"></i> Action</th></tr>
                            <?php $numberP  =   1;
                            $this->db->where('position_screening',0);
                            $query_position = $this->db->get('eposition');
                                foreach($query_position->result() as $rows){ ?>
                                <tr>
                                    <td class="info">
                                        <i class="fa fa-adn"></i> 
                                        <?php echo $rows->position_name; ?>
                                    </td>
                                    <td>
                                        <span class="text-orange">Pending</span>
                                        - in 
                                        <?php 
                                        $this->db->where('election_id',$rows->position_election_id);
                                        $queryElect = $this->db->get('election');
                                        foreach($queryElect->result() as $row){
                                            echo $row->election_name;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-user"></i> 
                                        <?php 
                                        $this->db->where('admin_id',$rows->position_created_by);
                                        $queryAdmin =   $this->db->get('admin_member_account');
                                        foreach($queryAdmin->result() as $adminRows){
                                            echo $adminRows->admin_firstname.' '.$adminRows->admin_lastname;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                         <a href="#approvedPosition<?php echo $rows->position_id; ?>" title="Approved" class="update" data-toggle="modal"> <span class="glyphicon glyphicon-arrow-up"></span> </a>
                                                                |
                                         <a href="#deletePosition<?php echo $rows->position_id; ?>" title="Delete" class="delete" data-toggle="modal"> <span class="glyphicon glyphicon-trash"></span> </a>
                                                             
                                </td>
                                </tr>
                            <?php 
                            
                            } ?>
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
       

