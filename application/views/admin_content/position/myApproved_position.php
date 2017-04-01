           
            
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;">Position
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> My Approved Position </a>
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
                            <div class="panel-heading">Pending Position</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                <tr class="active"><th> Position Name</th><th></th></tr>
                            <?php $numberP  =   1;
                            $this->db->where('position_created_by',$this->session->userdata('user_id'));
                            $this->db->where('position_screening',1);
                            $this->db->where('position_notify',1);
                            $query_position = $this->db->get('eposition');
                                foreach($query_position->result() as $rows){ ?>
                                <?php
                                $this->db->where('position_created_by',$this->session->userdata('user_id'));
                                $this->db->update('eposition',array('position_notify'=>''));
                                ?>
                                <tr>
                                    <td class="info">
                                        <i class="fa fa-adn"></i> 
                                        <?php echo $rows->position_name; ?>
                                    </td>
                                    <td>
                                        <span class="text-green">
                                        Approved
                                        </span>
                                        - in 
                                        <?php 
                                        $this->db->where('election_id',$rows->position_election_id);
                                        $queryElect = $this->db->get('election');
                                        foreach($queryElect->result() as $row){
                                            echo $row->election_name;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php 
                            $numberP++;
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
       

