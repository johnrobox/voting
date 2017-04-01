<?php if($this->session->userdata('user_id')==1){ ?>
     <?php 
        $this->db->where('default_reciever',$this->session->userdata('user_id'));
        $queryCostumer = $this->db->get('costumer_message');
        foreach($queryCostumer->result() as $rowMessageView){ ?>
        <div class="modal fade" id="replyGuestMessage<?php echo $rowMessageView->id; ?>" tab-index="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">Reply to  <?php echo strtoupper($rowMessageView->costumer_firstname.' '.$rowMessageView->costumer_lastname);?></div>
                    
                    <?php echo form_open(base_url().'replyCustomerMessage'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="costumerMessage" value="<?php echo $rowMessageView->id;?>"/>
                        <button type="submit" class="btn btn-primary">Ok</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        
                    </div>
                    <?php echo form_close(); ?>
                    
                </div>
            </div>
        </div>
     <?php } ?>
<?php } ?>
