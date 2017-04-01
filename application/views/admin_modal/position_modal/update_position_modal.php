<?php

$queryAllPosition = $this->db->get('eposition');
foreach($queryAllPosition->result() as $positionRow){ ?>
<div class="modal fade" id="updatePosition<?php echo $positionRow->position_id; ?>" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-pencil-square-o"></i> 
                Modify Position Name 
            </div>
            <?php echo form_open(base_url().'update_position'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="positionname">Position Name :</label>
                    <input type="text" name="positionName" id="positionname" class="form-control" value="<?php echo $positionRow->position_name;?>"/>
                    <input type="hidden" name="positionId" value="<?php echo $positionRow->position_id; ?>"/>
                    <input type="hidden" name="title" value="<?php echo $title; ?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Modify</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php 
}
?>
