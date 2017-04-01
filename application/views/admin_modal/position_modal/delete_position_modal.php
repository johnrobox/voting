<?php
$queryAllPosition   =   $this->db->get('eposition');
foreach($queryAllPosition->result() as $positionRow){
    if(($this->session->userdata('user_role')==1)||($positionRow->position_screening==0&&$positionRow->position_created_by==$this->session->userdata('user_id'))) { 
 ?>
<div class="modal fade" id="deletePosition<?php echo $positionRow->position_id; ?>" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-trash-o"></i> Delete this position ?</div>
            <div class="modal-body">
                <?php echo $positionRow->position_name;?>
            </div>
            <div class="modal-footer">
               <?php echo form_open(base_url().'delete_position');?>
                <input type="hidden" name="positionId" value="<?php echo $positionRow->position_id;?>"/>
                <input type="hidden" name="title" value="<?php echo $title; ?>"/>
                <button class="btn btn-primary" type="submit"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
               <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php         
    } 
}
?>
