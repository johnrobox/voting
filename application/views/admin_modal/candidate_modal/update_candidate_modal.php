<?php 
foreach($querys as $row){
    $this->db->where('team_election_id',$row->election_id);
    $queryTeam  =   $this->db->get('team');
    foreach($queryTeam->result() as $teamrows){
        $this->db->where('position_election_id',$row->election_id);
        $queryPosition  =   $this->db->get('eposition');
        foreach($queryPosition->result() as $positionrows){ 
            $data = array(
                'candidate_election_id' =>  $row->election_id,
                'candidate_position_id' =>  $positionrows->position_id,
                'candidate_team_id' =>  $teamrows->team_id
            );
            $queryCandidate =   $this->db->get_where('candidate_member',$data);
            foreach($queryCandidate->result() as $candidaterows){
                $this->db->where('voters_id',$candidaterows->candidate_voters_u_id);
                $queryCV =  $this->db->get('voter_member');
                foreach($queryCV->result() as $CVrow){
                    $school_id  =   $CVrow->voters_schoolid;
                    $first_name =   $CVrow->voters_firstname;
                    $middle_name    =   $CVrow->voters_middlename;
                    $last_name  =   $CVrow->voters_lastname;
                }
            ?>

                    <div class="modal fade" id="updateCandidate<?php echo $row->election_id.'_'.$teamrows->team_id.'_'.$positionrows->position_id.'_'.$candidaterows->candidate_id;?>" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header"><i class="fa fa-pencil-square-o"></i> Modify Candidates for <b> <?php echo $positionrows->position_name.'</b> in team <b>'.$teamrows->team_name.'</b> of <b>'.$row->election_name;?></b> </div>
                                <?php echo form_open(base_url().'update_candidate'); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="schoolid">School Id</label>
                                        <input type="text" name="schoolId" id="schoolid" class="form-control" value="<?php echo $school_id; ?>" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstName" id="firstname" class="form-control" value="<?php echo $first_name; ?>"required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="middlename">Middle name</label>
                                        <input type="text" name="middleName" id="middlename" class="form-control" value="<?php echo $middle_name; ?>"required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last name</label>
                                        <input type="text" name="lastName" id="lastname" class="form-control" value="<?php echo $last_name; ?>"required=""/>
                                    </div>
                                 </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="electionId" value="<?php echo  $row->election_id;?>"/>
                                    <input type="hidden" name="positionId" value="<?php echo  $positionrows->position_id?>"/>
                                    <input type="hidden" name="teamId" value="<?php echo  $teamrows->team_id;?>"/>
                                    <input type="hidden" name="candidateId" value="<?php echo  $candidaterows->candidate_id;?>"/>
                                    <input type="hidden" name="votersUId" value="<?php echo  $candidaterows->candidate_voters_u_id;?>"/>
                                    <input type="hidden" name="title" value="<?php echo $title;?>"/>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Register</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

 <?php   }        
        }
    }
    
}