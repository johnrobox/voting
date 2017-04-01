<?php 
$this->db->where('election_created_by',$this->session->userdata('user_id'));
$this->db->where('election_screening',1);
$this->db->where('election_notify',1);
$queryElection1 = $this->db->get('election_info');
       foreach($queryElection1->result() as $row) { 
           ?>
                 <li class="messageListHover" style="padding: 5px 5px 5px 5px;">
                     <a href="<?php echo base_url().'view_myApproved_election';?>" class="messageListHover" >
                         <div style="background-color: black;color:orange;">
                        <?php 
                        $this->db->where('election_id',$row->election_u_id);
                        $query1 = $this->db->get('election');
                        foreach($query1->result() as $erow){
                            echo ucwords(strtolower($erow->election_name));
                        }
                         ?>
                         </div>
                         
                         <small>
                         (Election type) 
                         </small>
                         <br>
                         <span style="color:green">
                         Been Approved
                         </span>
                     </a>
                     
                 </li>
                 
                 <div class="divider"></div>
 <?php 
       } ?>
<?php
$this->db->where('position_created_by',$this->session->userdata('user_id'));
$this->db->where('position_screening',1);
$this->db->where('position_notify',1);
$queryPosition1 = $this->db->get('eposition');
foreach($queryPosition1->result() as $prow){ ?>
 
                <li class="messageListHover" style="padding: 5px 5px 5px 5px;">
                     <a href="<?php echo base_url().'view_myApproved_position';?>" class="messageListHover" >
                         <div style="background-color: black;color:orange;">
                        <?php 
                        echo ucwords(strtolower($prow->position_name));
                        $this->db->where('election_id',$prow->position_election_id);
                        $queryE1 = $this->db->get('election'); ?>
                             in
                             <br> 
                             <?php
                        foreach($queryE1->result() as $row){
                            echo $row->election_name;
                        }
                         ?>
                         </div>
                         
                         <small>
                         (Position type)
                         </small>
                         <br>
                         <span style="color:green">
                         Been Approved
                         </span>
                     </a>
                     
                 </li>
                 
                 <div class="divider"></div>           
<?php                  
}
?>
