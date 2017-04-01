
<?php foreach($querys as $row){ 
    $i = $row->election_id;
    ?>
    <div class="modal fade" id="createTeam<?php echo $row->election_id;?>" tab-index="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php if($row->election_screening==0){?>
                    <div class="modal-header"></div>
                    <div class="modal-body">
                        No, action. Election is Pending / Canceled
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                <?php } ?>
                <?php if($row->election_status==1&&$row->election_screening==1) { ?>
                    <div class="modal-header"></div>
                    <div class="modal-body">
                        No, action. The elections are now started.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                <?php } ?>
                <?php if($row->election_status==0&&$row->election_screening==1) { ?>
                <?php $this->db->where('position_election_id',$row->election_id);
                      $queryPositions   =   $this->db->get('eposition');
                      if($queryPositions->num_rows()==0){ ?>
                            <div class="modal-header"></div>
                            <div class="modal-body">
                                Cannot create team. <br>The elections has no positions. <br>Create position first before to create a team name.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Ok</button>
                            </div>
                <?php }else{ ?>
                           <div class="modal-header">
                               <i class="fa fa-pencil-square-o"></i>
                               Create Team name
                           </div>
                            <?php echo form_open(base_url().'create_team_exec'); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="teamname">Enter Team name :</label>
                                    <input type="text" name="teamName" id="teamname" class="form-control" required=""/>
                                </div>
                                
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id;?>"/>
                                
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Create</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                            <?php echo form_close(); ?>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div> 
<?php } ?>

