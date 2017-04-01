<!--- vote pop-up starts here  ----------->
<div class="modal fade" id="vote" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="validate_voters">
                <div class="modal-header" style = "background: #428bca;">
                    <h2 class = "text-center" style = "color: #fff;">Login Voter</h2>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="breadcrumb" style="background-color:white;">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Student ID</span>
                        <input type="text" class="form-control" name="idno" id="idno" placeholder="Enter your Student ID number " required=""/>  
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="input-group">
                          <span class="input-group-addon">Username</span>
                          <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username  " required=""/>  
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="input-group">
                          <span class="input-group-addon">Passcode</span>
                          <input type="text" class="form-control" name="passcode" id="passcode" placeholder="Enter your Generated Passcode  " required=""/>  
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="input-group">
                          <span class="input-group-addon">Password</span>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password " required=""/>  
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Close</a>
                     <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--- vote pop-up ends here  ----->