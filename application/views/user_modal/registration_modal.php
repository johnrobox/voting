<!--- registration pop-up starts here --->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="<?php echo base_url().'checkID';?>">
                <div class="modal-header" style = " background: #428bca;">
                    <h2 class = "text-center" style = "color: #fff;">Register Voter</h2>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">Student ID</span>
                        <input type="text" class="form-control" name="student_id" id="myId" placeholder="Enter your Student ID number " required=""/>  
                    </div>
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Close</a>
                     <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--- registration pop up ends here ------>