           
            
            <div class="col-sm-9" >
            
                <div class="row">
                    <div class="col-sm-12" style="padding:0;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:50px;">
                                <div>
                                    <span style="font-size:20px;"><i class="fa fa-pencil-square-o"></i> Register
                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                        <a href=""> Voters </a>
                                    </span>
                                    <button class="btn btn-primary btn-sm pull-right"  title="Create / Send Message" data-toggle="modal" data-target="#createMessageModal">
                                      <i class="fa fa-share-alt"></i> Create Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--- START:    sent message alert ----->
                <?php if($this->session->userdata('message_sent_okay')!='') { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <?php echo $this->session->userdata('message_sent_okay');?>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!--- END:    sent message alert ----->
                
                <!--- START:   unset sent message alert ----->
                <?php $data =   array('message_sent_okay'=>'');
                $this->session->unset_userdata($data); ?>
                <!--- END:   unset sent message alert ----->
                
                

                <?php if($this->session->userdata('add_voter_members_okay')!=''){?>
                        <div class="alert alert-success alert-dismissable">
                            <?php echo $this->session->userdata('add_voter_members_okay');?>
                        </div>
                <?php }
                $newdata    =   array(
                    'add_voter_members_okay'    =>  ''
                );
                $this->session->unset_userdata($newdata);
                ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading tocapital">
                                <h4 class = "text-center">Voter's Registration</h4>
                            </div>
                            <div ng-app="">
                            <?php  
                            echo form_open(base_url().'register_voters_exec');?>
                            <div class="breadcrumb">
                                        <div class="form-group">
                                            <label for="schoolId">School ID</label>
                                            <small class="text-red"><?php echo form_error('voters_school_id');?></small>
                                            <input type="text" class="form-control" name="voters_school_id" id="schoolId" value="<?php echo set_value('voters_school_id');?>">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <small class="text-red"><?php echo form_error('voters_first_name');?></small>
                                            <input type="text" class="form-control" name="voters_first_name" id="firstName" value="<?php echo set_value('voters_first_name');?>">
                                        </div> 
                                        <div class="form-group">
                                            <label for="middleName">Middle Name</label>
                                            <small class="text-red"><?php echo form_error('voters_middle_name');?></small>
                                            <input type="text" class="form-control" name="voters_middle_name" id="middleName" value="<?php echo set_value('voters_middle_name');?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <small class="text-red"><?php echo form_error('voters_last_name');?></small>
                                            <input type="text" class="form-control" name="voters_last_name" id="lastName" value="<?php echo set_value('voters_last_name');?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="birtDate">Birth Date</label>
                                            <table class="col-sm-12"><tr><td>
                                            <small class="text-red"><?php echo form_error('voters_birth_day');?></small>
                                            <select class="form-control" name="voters_birth_day" id="birtDate">
                                                
                                                <?php 
                                                if(set_value('voters_birth_day')!=''){
                                                    echo '<option value="'.set_value('voters_birth_day').'">'.set_value('voters_birth_day').'</option>';
                                                }else{
                                                 echo '<option value="">Select day . . .</option>';  
                                                } 
                                                for($day=1;$day<=31;$day++)
                                                {   if(set_value('voters_birth_day')!=$day){   
                                                    echo '<option value="'.$day.'">'.$day.'</option>';
                                                }
                                                }?>
                                            </select></td><td>
                                            <small class="text-red"><?php echo form_error('voters_birth_month');?></small>
                                                <div ng-controller="monthController"> 
                                                    <select name="voters_birth_month"  class="form-control">
                                                        <?php if(set_value('voters_birth_month')!=''){ ?>
                                                            <option value="<?php echo set_value('voters_birth_month');?>"><?php echo set_value('voters_birth_month');?></option>
                                                            <?php }else { ?>
                                                            <option value="">Select month . . .</option>
                                                            <?php } ?>
                                                            <option value="{{ y.name }}" ng-repeat="y in month">
                                                                {{ y.name }}
                                                            </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                            <small class="text-red"><?php echo form_error('voters_birth_year');?></small>
                                            <select class="form-control" name="voters_birth_year">
                                                <?php
                                                if(set_value('voters_birth_year')!=''){
                                                    echo '<option value="'.set_value('voters_birth_year').'">'.set_value('voters_birth_year').'</option>';
                                                }else{
                                                 echo '<option value="">Select day . . .</option>';  
                                                } 
                                                for($year=2014;$year>=1930;$year--)
                                                {   if(set_value('voters_birth_year')!=$year){
                                                    echo '<option value="'.$year.'">'.$year.'</option>';
                                                }}?>
                                            </select></td></tr></table>
                                        </div>
                                        <br/>
                                        <br/>
                                        <div class="form-group">
                                            <div class = "col-sm-4">
                                                <table border="0" class="col-sm-12"><tr><td>
                                                <label for="voters_gender">Gender</label>
                                                <small class="text-red"><?php echo form_error('voters_gender');?></small></td><td>
                                                <input type="radio"  name="voters_gender" id="voters_gender"   value="male"/> Male &nbsp;</td><td>
                                                <input type="radio"  name="voters_gender" id="voters_gender" value="female"/> Female</td>
                                                </tr></table>
                                            </div>
                                        </div>
                                        <br/>                                        
                                        <div class="form-group">
                                            <label for="civilStatus">Civil Status</label>
                                            <small class="text-red"><?php echo form_error('voters_civil_status');?></small>
                                            <div  ng-controller="statusController"> 
                                                <select name="voters_civil_status" class="form-control" >
                                                        <?php if(set_value('voters_civil_status')!=''){ ?>
                                                        <option value="<?php echo set_value('voters_civil_status');?>"><?php echo set_value('voters_civil_status');?></option>
                                                        <?php }else { ?>
                                                        <option value=""></option>
                                                        <?php } ?>
                                                        <option value="{{ x.name }}" ng-repeat="x in status">
                                                            {{ x.name }}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="citizenship">Citizenship</label>
                                            <small class="text-red"><?php echo form_error('voters_citizenship');?></small>
                                            <input type="text" class="form-control" name="voters_citizenship" id="citizenship" value="<?php echo set_value('voters_citizenship');?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <small class="text-red"><?php echo form_error('voters_address');?></small>
                                            <input type="text" class="form-control" name="voters_address" id="address" value="<?php echo set_value('voters_address');?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="course">Course</label>
                                            <small class="text-red"><?php echo form_error('voters_course');?></small>
                                            <div  ng-controller="courseController"> 
                                                <select name="voters_course" class="form-control" >
                                                        <?php if(set_value('voters_course')!=''){ ?>
                                                        <option value="<?php echo set_value('voters_course');?>"><?php echo set_value('voters_course');?></option>
                                                        <?php }else { ?>
                                                        <option value=""></option>
                                                        <?php } ?>
                                                        <option value="{{ x.abbreviation + ' - ' + x.meaning }}" ng-repeat="x in courses">
                                                            {{ x.abbreviation + ' - ' + x.meaning }}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fatherFirstname">Father's Name</label>
                                            <table class=" col-sm-12" >
                                            <tr><td>
                                                <small class="text-red"><?php echo form_error('voters_father_firstname');?></small>
                                                <input type="text" class="form-control" id="fatherFirstname" name="voters_father_firstname" value="<?php echo set_value('voters_father_firstname');?>"  placeholder="Firstname">
                                            </td><td>
                                                <small class="text-red"><?php echo form_error('voters_father_lastname');?></small>
                                                <input type="text" class="form-control" name="voters_father_lastname" value="<?php echo set_value('voters_father_lastname');?>"  placeholder="Lastname">            
                                             </td></tr>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label for="motherFirstname">Mother's Name</label>
                                            <table class=" col-sm-12" >
                                            <tr><td>
                                                <small class="text-red"><?php echo form_error('voters_mother_firstname');?></small>
                                                <input type="text" class="form-control" id="motherFirstname" name="voters_mother_firstname" value="<?php echo set_value('voters_mother_firstname');?>"  placeholder="Firstname">
                                            </td><td>
                                                <small class="text-red"><?php echo form_error('voters_mother_lastname');?></small>
                                                <input type="text" class="form-control" name="voters_mother_lastname" value="<?php echo set_value('voters_mother_lastname');?>" placeholder="Lastname">            
                                            </td></tr>
                                            </table>
                                        </div>
                                        <div class="pull-right margintop-50">
                                        <button class="btn btn-default" type="reset">Clear</button>
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Register</button> 
                                        </div>
                                        <hr class="setpadding"></hr>
                                    </div>
                                <?php echo form_close();?>
                            </div>   
                        
                    </div> <!-- end of panel -->
                </div>
            </div> <!-- end of row ---->
            
        </div>               
</div>

<script src="<?php echo base_url();?>js/js_controller/courseController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/monthController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/statusController.js"></script>
      
