<?php 
    $queryElection = $this->db->get('election');
    foreach($queryElection->result() as $electionrow){
        $this->db->where('position_election_id',$electionrow->election_id);
        $queryPosition = $this->db->get('eposition');
        if($queryPosition->num_rows()!=0){  ?>
        <div class="modal fade" id="<?php echo $electionrow->election_id; ?>IndependentRegistration" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">Register Independent Candidate for <b><?php echo $electionrow->election_name; ?></b></div>
                    <?php echo form_open(base_url().'register_independent_candidate'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="schoolid">School Id</label>
                            <input type="text" name="schoolId" id="schoolid" class="form-control" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstName" id="firstname" class="form-control" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="middlename">Middle name</label>
                            <input type="text" name="middleName" id="middlename" class="form-control" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastName" id="lastname" class="form-control" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select name="positionId" class="form-control" required="">
                                <option value="">. . .  select position . . .</option>
                                <?php
                                $this->db->where('position_election_id',$electionrow->election_id);
                                $queryElectionPosition = $this->db->get('eposition');
                                foreach($queryElectionPosition->result() as $positionRows){ ?>
                                    <option value="<?php echo $positionRows->position_id; ?>">
                                        <?php echo $positionRows->position_name; ?>
                                    </option> 
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="electionId" value="<?php echo  $electionrow->election_id;?>"/>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Register</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
<?php 
        }
    }
?>