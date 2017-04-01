<?php
$this->db->where('election_screening',0);
$queryPendingElection  =   $this->db->get('election_info');
$election = $queryPendingElection->num_rows();

$this->db->where('position_screening',0);
$queryPendingPosition  =   $this->db->get('eposition');
$position = $queryPendingPosition->num_rows();

$badge = $election + $position;
if($badge>0){ ?>
<span class = "badge badge-danger" style = "background-color: red; color: #53CBE9; margin-left:-2px;"  >
             <?php echo $badge; ?>
</span>
<?php } ?>

