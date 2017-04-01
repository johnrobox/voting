<div class="modal fade" id="request" dialog="modal" tab-index="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header"> Enable Account - Request Form</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'send_administrator_request');?>
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your firstname" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your lastname" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="usernameF">Username</label>
                        <input type="text" class="form-control" name="username" id="usernameF" placeholder="Enter your username" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="passwordF">Password</label>
                        <input type="password" class="form-control" name="password" id="passwordF" placeholder="Enter your password" required=""/>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Send Request</button>
                    </div>
                <?php echo form_close();?>  
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>