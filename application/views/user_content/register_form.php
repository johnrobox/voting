<!DOCTYPE html>
<html>
    <head>
        <title>OVS - Registration</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon/forlogo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" > 
        <link href="<?php echo base_url();?>css/style1.css" rel="stylesheet" type="text/css"> <!---- ---->
        <link href="<?php echo base_url();?>css/user_design.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src= "<?php echo base_url();?>js/angular.min.js"></script>
    </head>
    <!---  CONTENT STARTS HERE  ---->
    <!--- registration content starts here--->

<div class = "container">
    <!--- the alert session starts here ----->
        <?php if($this->session->userdata('account_already_exist_error')!=''){?>
        <div class="alert alert-danger alert-dismissable">
            <?php echo $this->session->userdata('account_already_exist_error');?>
        </div>
        <?php }if($this->session->userdata('not_member_error')!=''){ ?>
        <div class="alert alert-danger alert-dismissable">
            <?php echo $this->session->userdata('not_member_error'); ?>
        </div>
        <?php } ?>
    <!--- the alert session ends here   ---->
</div>
    
    <!--- the unset all session starts here ---->
    <?php
    $newdata    =   array('account_already_exist_error'=>'','not_member_error'=>'');
    $this->session->unset_userdata($newdata);
    ?>
    <!--- the unset all session ends here   ---->

<div class = "container" style = "margin-top: 1%;">
    <div class = "col-sm-3">    
        <div class = "logo">
            <img class = "img-responsive" src = "img/favicon/3.png">
        </div>
    </div>
    <div class = "col-sm-6">
        <h1 class = "text-center" style = "color: #005185;">Voter's Registration Form</h1>
        <h4 class = "text-center" style = "color: grey;"><i>Please fill up the blanks below.</i></h4>
    </div> 
    <div class = "col-sm-3">    
        <div class = "logo">
            <img class = "img-responsive" src = "img/favicon/3.png">
        </div>
    </div>
</div>

    <div class="container">
     <?php echo form_open(base_url().'check_for_correct_voters'); ?>
            <div class = "col-sm-6">     
                <label></label>
                <input type="text" name="" id=""  value="Student ID: <?php echo $this->session->userdata('VOTERS_ID_REGISTER');?>"class="form-control" disabled/>
                <input type="hidden" name="schoolId" id="schoolId"  value="<?php echo $this->session->userdata('VOTERS_ID_REGISTER');?>"/>
            </div>
            <div class = "col-sm-6">        
                <label></label>
                <small class="text-red"><?php echo form_error('password'); ?></small>
                <input type="password" name="password" id="Password" class="form-control" placeholder="Enter your Password" />
            </div>
        <br/>
            <div class = "col-sm-6">   
                <label></label>
                <small class="text-red"><?php echo form_error('username'); ?></small>
                <input type="text" name="username" id="Username" class="form-control" placeholder="Enter your Username"value="<?php echo set_value('username'); ?>"/>
            </div>
            <div class = "col-sm-6">   
                <label></label>
                <small class="text-red"><?php echo form_error('firstName'); ?></small>
                <input type="text" name="firstName" id="Firstname" class="form-control" placeholder="Enter your Firstname*"value="<?php echo set_value('firstName'); ?>"/>
            </div>
            <div class = "col-sm-6">   
                <label></label>
                <small class="text-red"><?php echo form_error('middleName'); ?></small>
                    <input type="text" name="middleName" id="Middlename" class="form-control" placeholder="Enter your Middlename*"value="<?php echo set_value('middleName'); ?>"/>
            </div>
            <div class = "col-sm-6">   
                <label></label>
                <small class="text-red"><?php echo form_error('lastName'); ?></small>
                <input type="text" name="lastName" id="Lastname" class="form-control" placeholder="Enter your Lastname*" value="<?php echo set_value('lastName'); ?>" />
            </div>


    <div ng-app="">      
        <div class = "col-sm-6">
            <div class = "col-sm-2">
                <label></label>
                <label>Birthdate*:</label>
            </div> 
            <div class="col-sm-3">
                <label></label>
                <small class="text-red"><?php echo form_error('bDay'); ?></small>
                <select name="bDay" id="Birthdate" class="form-control">
                <option value="<?php if(set_value('bDay')!=''){echo set_value('bDay');}else{echo '';}?>"><?php if(set_value('bDay')!=''){echo set_value('bDay');}else{echo 'Day';}?></option>
                 <?php 
                 $countday=1;
                 for ($countday=1;$countday<31;$countday++)
                 {
                     echo '<option value="'.$countday.'">'.$countday.'</option>';
                 }
                 ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label></label>
                <small class="text-red"><?php echo form_error('bMonth'); ?></small>
                <div ng-controller="monthController"> 
                    <select name="bMonth"  class="form-control">
                            <option value="">Select month</option>
                            <option value="{{ y.name }}" ng-repeat="y in month">
                                {{ y.name }}
                            </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <label></label>
                <small class="text-red"><?php echo form_error('bYear'); ?></small>
                <select name="bYear" id="bYear" class="form-control">
                 <option value="<?php if(set_value('bYear')!=''){echo set_value('bYear');}else{echo '';}?>"><?php if(set_value('bYear')!=''){echo set_value('bYear');}else{echo 'Year';}?></option>
                 <?php 
                 $countyear=1980;
                 for ($countyear=1970;$countyear<2016;$countyear++)
                 {
                     echo '<option value="'.$countyear.'">'.$countyear.'</option>';
                 }
                 ?>

                </select>
            </div>
        </div>
        <div class = "col-sm-6">
                <div class = "col-sm-12"> 
                <label></label>
                <small class="text-red"><?php echo form_error('citizenShip'); ?></small>
                <input type="text" name="citizenShip" id="Citizenship" class="form-control" placeholder="Enter your Citizenship*" value="<?php echo set_value('citizenShip'); ?>"/>
            </div>
        </div>

        <div class = "col-sm-6">
            <div class = "col-sm-2">
                <label></label>
                <label></label>
                <label for="Gender">Gender*</label>
            </div>
            <div class = "col-sm-4">
                <label></label>
                <label></label>
        <br/>
                <small class="text-red"><?php echo form_error('gender'); ?></small>
                <input type="radio" name="gender"   value="male" /> Male &nbsp;
                <input type="radio" name="gender"  value="Female" /> Female
            </div>
        <br/>
            <div class = "col-sm-2">
                <label for="Civil">Status*</label>
            </div>
            <div class = "col-sm-4">
                <small class="text-red"><?php echo form_error('cStatus'); ?></small>
                <div  ng-controller="statusController"> 
                    <select name="cStatus" class="form-control" >
                            <option value="">Select status</option>
                            <option value="{{ x.name }}" ng-repeat="x in status">
                                {{ x.name }}
                            </option>
                    </select>
                </div>
            </div>
        </div>
        <div class = "col-sm-6">
            <div class="col-sm-12">
                <label></label>
                <small class="text-red"><?php echo form_error('course'); ?></small>
                <div  ng-controller="courseController"> 
                    <select name="course" class="form-control" >
                            <option value="">Select your Course*</option>
                            <option value="{{ x.abbreviation + ' - ' + x.meaning }}" ng-repeat="x in courses">
                                {{ x.abbreviation + ' - ' + x.meaning }}
                            </option>
                    </select>
                </div>
            </div>
        </div>
            
            <div class="col-sm-12">
                <label></label>
                <small class="text-red"><?php echo form_error('address'); ?></small>
                <input type="text" name="address" id="Address" class="form-control" placeholder="Enter your Recent Address" value="<?php echo set_value('address'); ?>"/>
            </div>
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('email'); ?></small>
                <input type="text" name="email" id="Email" class="form-control" placeholder="Enter your Email Address" value="<?php echo set_value('email'); ?>"/>
            </div>
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('contactNo'); ?></small>
                <input type="text" name="contactNo" id="Contact" class="form-control" placeholder="Enter your Contact No" value="<?php echo set_value('contactNo'); ?>"/>
            </div>
    </div>
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('fatherFirstname'); ?></small>
                <input type="text" name="fatherFirstname" id="Fatherf" class="form-control" placeholder="Enter your Father's Firstname*" value="<?php echo set_value('fatherFirstname'); ?>"/>
            </div>
            
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('fatherLastname'); ?></small>
                <input type="text" name="fatherLastname" id="Fatherl"  class="form-control" placeholder="Enter your Father's Lastname*" value="<?php echo set_value('fatherLastname'); ?>"/>
            </div>
            
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('motherFirstname'); ?></small>
                <input type="text" name="motherFirstname" id="Motherf" class="form-control" placeholder="Enter your Mother's Firstname*" value="<?php echo set_value('motherFirstname'); ?>"/>
            </div>
            
            <div class = "col-sm-6">
                <label></label>
                <small class="text-red"><?php echo form_error('motherLastname'); ?></small>
                <input type="text" name="motherLastname" id="Motherl"  class="form-control" placeholder="Enter your Mother's Lastname*" value="<?php echo set_value('motherLastname'); ?>"/>
            </div>
            
                 <span class="pull-right" style="margin-top:20px;">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Register</button>
                  <a href="<?php echo base_url();?>logout_id" class="btn btn-default">Cancel</a>
                 </span>

            <?php echo form_close(); ?>
    </div>

<script src="<?php echo base_url();?>js/js_controller/courseController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/monthController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/statusController.js"></script>