<!DOCTYPE html>
<html>
    <head>
        <title> Online Voting </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/admin_login_design.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" > 
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
    </head>
    <body>

    <div class="container">   
        <div class="row" style = "margin-top: 15%;">      

            <div class="col-sm-4 col-sm-offset-4">
			     <div class="box">							
				    <div class="icon">
				        <img src="<?php echo base_url().'img/user/3.png';?>" class="image"/>
					       <div class="info">
						      <h2>ADMIN LOGIN</h2>
                                <?php echo form_open(base_url().'admin_login_exec');?>
                                    <div class="panel-body">
                                            <?php if((validation_errors()==TRUE)||($this->session->userdata('error_logged_in')!='')||($this->session->userdata('request_successfuly_sent')!='')||($this->session->userdata('request_error')!='')||($this->session->userdata('request_exist')!='')){?>
                                                <div class="text-center alert alert-danger">
                                                 <?php 
                                                 echo validation_errors();
                                                 echo $this->session->userdata('request_exist');
                                                 echo $this->session->userdata('error_logged_in');
                                                 echo $this->session->userdata('request_successfuly_sent');
                                                 echo $this->session->userdata('request_error');
                                                 $data  =   array('error_logged_in'=>'','request_successfuly_sent'=>'','request_error'=>'','request_exist'=>'');
                                                 $this->session->unset_userdata($data);
                                                 $this->session->sess_destroy();
                                                 ?>   
                                                </div> 
                                            <?php }?>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                            </div>
                                        </div> 
                                        <div class="pull-right">
                                            <button class="btn btn-default " type="reset">Clear</button>
                                            <button class="btn btn-primary " type="submit">Login</button>
                                        </div>
                                    </div>
                                <?php echo form_close();?>
					        </div>
				    </div>
				    <div class="space"></div>
			    </div> 
		    </div>

        </div> <!-- end of row ---->
    </div> <!-- end of container ---->
            

        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
    </body>
</html>
