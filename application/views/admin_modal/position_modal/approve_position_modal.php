<?php
$this->db->where('position_screening',0);
$queryPendingPosition   =   $this->db->get('eposition');
foreach($queryPendingPosition->result() as $positionRow){ ?>
    <div class="modal fade" id="approvedPosition<?php echo $positionRow->position_id; ?>" tab-index="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Want to approved this position ?
                </div>
                <div class="modal-body">
                    <?php echo $positionRow->position_name; ?>
                </div>
                <div class="modal-footer">
                    <?php echo form_open(base_url().'approved_position'); ?>
                    <input type="hidden" name="positionId" value="<?php echo $positionRow->position_id;?>"/>
                    <button class="btn btn-primary" type="submit">Approved</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>      
<?php
}
?>
