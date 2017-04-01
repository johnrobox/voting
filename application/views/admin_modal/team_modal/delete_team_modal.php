<?php
$queryAllTeam   =   $this->db->get('team');
foreach($queryAllTeam->result() as $teamRows){ ?>
<div class="modal fade" id="deleteTeam<?php echo $teamRows->team_id; ?>" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-trash-o"></i> Delete team <?php echo $teamRows->team_name; ?></div>
            <div class="modal-body">
                <b>Note : </b>
                Deletion of team, will also delete its candidate.
            </div>
            <?php echo form_open(base_url().'delete_team'); ?>
            <div class="modal-footer">
                <input type="hidden" name="teamId" value="<?php echo $teamRows->team_id;?>"/>
                <button class="btn btn-primary" type="submit"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php 
}
?>