        <title><?php echo $title;?></title>
        <link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" >
<?php 
$this->db->where('election_id',$this->input->post('ElectionId'));
$query  =   $this->db->get('election');
foreach($query->result() as $row){
    $electionName   =   $row->election_name;
    $electionId =   $row->election_id;
    $Id = $row->election_id;
}
?>
<div class = "container-fluid">
    <div class = "row">
        <div class = "col-sm-2">
            <img class = "img-responsive" src = "img/favicon/3.png">
        </div>
        <div class = "col-sm-8">
                <h1 class = "text-center" style = "margin-top: 8%;">Election Result of "<?php echo strtoupper($electionName); ?>"</h1>
        </div>
        <div class = "col-sm-2">
            <img class = "img-responsive" src = "img/favicon/3.png" style = "position: relative;">
        </div>
    </div>
</div>

<div class="jumbotron">
            <?php 
            $this->db->where('position_election_id',$electionId);
            $queryPosition  =   $this->db->get('eposition');
            foreach($queryPosition->result() as $rowPosition){ ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td style="background: skyblue;">
                        <?php 
                        echo $rowPosition->position_name;
                        $positionId = $rowPosition->position_id;
                        ?>
                    </td>
                    <td>
                        Result
                    </td>
                </tr>
                
                    
                        <?php
                        $this->db->where('candidate_election_id',$electionId);
                        $this->db->where('candidate_position_id',$rowPosition->position_id);
                        $queryCandidate =    $this->db->get('candidate_member');
                        foreach($queryCandidate->result() as $rowCandidate){
                            $candidateId    =   $rowCandidate->candidate_id;
                            $this->db->where('voters_id',$rowCandidate->candidate_voters_u_id);
                            $queryCandidateInfo = $this->db->get('voter_member');
                            foreach($queryCandidateInfo->result() as $rowInfo){ ?>
                                <tr>
                                <td>
                                <?php   echo $rowInfo->voters_firstname.' '.$rowInfo->voters_lastname; ?>
                                </td>
                                <td style="width: 100px;">
                                    <?php
                                                              $this->db->where('candidate_id',$candidateId);
                                                              $this->db->where('election_id',$Id);
                                                              $queryResults = $this->db->get('election_result');
                                                              echo $queryResults->num_rows();
                                                              ?>
                                </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                   
                
            </table>
            <?php } ?>
            </div>

