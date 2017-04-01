<?php 
$queryAllTeam   =   $this->db->get('team');
foreach($queryAllTeam->result() as $teamRows){ ?>
<div class="modal fade" id="updateTeam<?php echo $teamRows->team_id;?>" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-pencil-square-o"></i> Rename team <?php echo $teamRows->team_name; ?></div>
            <?php echo form_open(base_url().'update_team'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="teamname">Enter team name :</label>
                    <input type="text" name="teamName" id="teamname" class="form-control" value="<?php echo $teamRows->team_name;?>"/>
                    <input type="hidden" name="teamId" value="<?php echo $teamRows->team_id;?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Modify </button>
                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php 
}
?>