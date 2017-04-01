<div class="modal fade" id="showContactUsForm" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style = " background: #428bca; color: #fff;">
                Feel free to Contact Us
                <a href = "" class="fa fa-times pull-right"  style = "color: #fff;" data-dismiss="modal"></a>
            </div>
            <?php echo form_open(base_url().'send_message_to_admin'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="firstname">Firstname : </label>
                    <input type="text" name="cfirstname" id="firstname" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname : </label>
                    <input type="text" name="clastname" id="lastname" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="email" name="cemail" id="email" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="message">Message : </label>
                    <textarea name="cmessage" id="message" rows="5" class="form-control" required="">

                    </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="submit"><i class="fa fa-send"></i> Send Message</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>