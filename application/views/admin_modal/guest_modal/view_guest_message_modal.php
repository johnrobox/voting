<?php if($this->session->userdata('user_id')==1){ ?>
     <?php 
        $this->db->where('default_reciever',$this->session->userdata('user_id'));
        $queryCostumer = $this->db->get('costumer_message');
        foreach($queryCostumer->result() as $rowMessageView){ ?>
        <div class="modal fade" id="viewGuestMessage<?php echo $rowMessageView->id; ?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">Message from <?php echo strtoupper($rowMessageView->costumer_firstname.' '.$rowMessageView->costumer_lastname);?></div>
                    <div class="modal-body">
                        <?php echo $rowMessageView->costumer_message; ?>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open(base_url().'readCustomerMessage'); ?>
                        <input type="hidden" name="costumerMessage" value="<?php echo $rowMessageView->id;?>"/>
                        <button type="submit" class="btn btn-primary">Ok</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
     <?php } ?>
<?php } ?>
