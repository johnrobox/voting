
<div class="panel panel-default">
    <div class="panel-heading">
        Admin users
    </div>
    <div class="panel-body">
        <div class="row">
        <?php foreach($querys_user as $rowUser) {?>
            
                <div class="col-sm-5">
                    <div class="panel panel-default text-center">
                        <div class="panel-body">
                            <?php if($rowUser->admin_status==1){?>
                            <span class="glyphicon glyphicon-ok-circle help-block" style="color:green;"> Online</span>
                            <?php } else { ?>
                            <span class="glyphicon glyphicon-warning-sign help-block" style="color:red"> Offline</span>
                            <?php } ?>
                            <h4><?php echo $rowUser->admin_firstname.' '.$rowUser->admin_lastname; ?> </h4>
                            
                        </div>
                    </div>
                </div>
        <?php  }?>
        </div>
    </div>
    <div class="panel-footer"
</div>

