<?php foreach($query_user as $row) { ?>
<?php if($this->session->userdata('user_role')==1){ ?>
    <?php if($row->admin_role==2&&$row->admin_access==1) {?>
        <div class="modal fade" id="disable<?php echo $row->admin_id;?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><b>Disable access</b></div>
                    <div class="modal-body">
                        <h5 class="text-blue"><?php echo $row->admin_firstname.' '.$row->admin_lastname;?></h5>
                    </div>
                    <?php echo form_open(base_url().'manage_user_admin'); ?>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $row->admin_id;?>"/>
                        <input type="hidden" name="access" value="<?php echo $row->admin_access;?>"/>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Disable Access</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>                                    
    <?php }else if($row->admin_role==2&&$row->admin_access==0) {?>
        <div class="modal fade" id="enable<?php echo $row->admin_id;?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><b>Enable access</b></div>
                    <div class="modal-body">
                        <h5 class="text-blue"><?php echo $row->admin_firstname.' '.$row->admin_lastname;?></h5>
                    </div>
                    <?php echo form_open(base_url().'manage_user_admin'); ?>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $row->admin_id;?>"/>
                        <input type="hidden" name="access" value="<?php echo $row->admin_access;?>"/>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Enable Access</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
<?php }

}//end of first if 
}//end of foreach ?>