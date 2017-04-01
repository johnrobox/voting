<?php if($this->session->userdata('user_id')==1){ ?>
     <?php 
        $this->db->where('default_reciever',$this->session->userdata('user_id'));
        $queryCostumer = $this->db->get('costumer_message');
        foreach($queryCostumer->result() as $rowMessageView){ ?>
        <div class="modal fade" id="deleteGuestMessage<?php echo $rowMessageView->id; ?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><i class="fa fa-trash-o">Delete</i></div>
                    <div class="modal-body">
                        Delete this messge ?
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open(base_url().'deleteCustomerMessage'); ?>
                        <input type="hidden" name="costumerMessage" value="<?php echo $rowMessageView->id;?>"/>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete </button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
     <?php } ?>
<?php } ?>
