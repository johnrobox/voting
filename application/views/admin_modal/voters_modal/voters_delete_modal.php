<?php foreach($query_voters as $voterRow){ ?>
    <div class="modal fade" id="deleteVoters<?php echo $voterRow->voters_id;?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open(base_url().'voters_delete');?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?php echo $voterRow->voters_id; ?>"/>
                        <input type="hidden" name="voters_school_id" id="voters_schoolId" value="<?php echo $voterRow->voters_schoolid; ?>"/>
                        Are you sure you want to delete <b><?php echo $voterRow->voters_schoolid; ?></b> ?
                    </div>
                <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Delete</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>