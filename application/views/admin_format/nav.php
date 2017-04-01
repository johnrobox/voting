
<div id="SystemUserControl"></div>


<div class="container-fluid" style="margin-top:50px;">

                   
                <div class="navbar-wrapper">
                    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                        class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <a href="#" style="color:white;" class="navbar-brand" > Online Voting System - Admin</a>
                                
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                                
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                                    <?php if($this->session->userdata('envelope_active')=='yes'){ ?>
                                                        style="color:white"
                                                    <?php } ?> title="Message">
                                                        <span class="glyphicon glyphicon-envelope" id = "UnreadMessageNotification" style = "color: #004078;"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <span id="UnreadMessageListNotification"></span>
                                                    </ul>
                                                </li>
                                                
                                                <?php if($this->session->userdata('user_role')==1) {?>
                                                <li>
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                                    <?php if($this->session->userdata('warning_active')=='yes'){ ?>
                                                        style="color:white"
                                                    <?php } ?> title="Warning">
                                                        <span class="glyphicon glyphicon-user" id = "AdminRequest" style = "color: #004078;"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <span id="AdminRequestView"></span>
                                                    </ul>
                                                </li>
                                                <?php } ?>
                                                
                                                <?php if($this->session->userdata('user_role')==1) {?>
                                                <li>
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                                        <span class="glyphicon glyphicon-tasks" id="AllPending" style = "color: #004078;"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <span id="AllPendingList"></span>
                                                        </ul>
                                                    
                                                </li>
                                                <?php }else{ ?>
                                                <li>
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                                        <span class="glyphicon glyphicon-tasks" id="MyApproved" style = "color: #004078;"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <span id="MyApprovedList"></span>
                                                        </ul>
                                                    
                                                </li>
                                                <?php } ?>
                                                
                                                
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <span style="color:white;">
                                                        Welcome
                                                        <i class="glyphicon glyphicon-user"></i>
                                                        <?php echo $this->session->userdata('user_username');?>
                                                        </span>
                                        <b class="caret"  style = "color: #fff;"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img class="img-circle img-responsive pull-left" src="<?php echo base_url();?>img/user/avatar2.png">
                                                            <p class="text-center small">
                                                                <a href="#">Change Photo</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span><?php echo $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname'); ?></span>
                                                            <p class="text-muted small">
                                                                <?php echo $this->session->userdata('user_email');?>
                                                            </p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="<?php echo base_url().'admin_settings'; ?>" class="btn btn-primary btn-sm active">View Profile</a>
                                                            <a href="<?php echo base_url().'admin_inbox'; ?>" class="btn btn-primary btn-sm active">SMS</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#changePassword<?php echo $this->session->userdata('user_id');?>"class="change" data-toggle="modal">Change password?</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="<?php echo base_url(); ?>admin_logout" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                    </div>
                
                    </div>
</div>

       
<!--- top navigation ends here ------->