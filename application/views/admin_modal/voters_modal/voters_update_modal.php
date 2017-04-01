<div ng-app="">
<?php
foreach($query_voters as $voterRow){ ?>
    <div class="modal fade" id="updateVoters<?php echo $voterRow->voters_id;?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Voters</h4>
                </div>
                    <?php echo form_open(base_url().'voters_update');?>
                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="schoolId" class="text-blue">School ID</label>
                                            <input type="text" class="form-control" name="voters_school_id" id="schoolId" value="<?php echo $voterRow->voters_schoolid; ?>"/>
                                            <input type="hidden" name="old_voters_school_id" id="schoolId" value="<?php echo $voterRow->voters_schoolid; ?>"/>
                                            <input type="hidden" name="id" id="id" value="<?php echo $voterRow->voters_id; ?>"/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="firstName" class="text-blue">First Name</label>
                                            <input type="text" class="form-control" name="voters_first_name" id="firstName" value="<?php echo $voterRow->voters_firstname; ?>"/>
                                        </div> 
                                        <div class="form-group">
                                            <label for="middleName" class="text-blue">Middle Name</label>
                                            <input type="text" class="form-control" name="voters_middle_name" id="middleName" value="<?php echo $voterRow->voters_middlename; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName" class="text-blue">Last Name</label>
                                            <input type="text" class="form-control" name="voters_last_name" id="lastName" value="<?php echo $voterRow->voters_lastname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-blue">Birth Date</label>
                                            <table class="col-sm-12"><tr><td>
                                            <select class="form-control" name="voters_birth_day">
                                                <option value="<?php echo $voterRow->voters_birthday; ?>"><?php echo $voterRow->voters_birthday;?></option>
                                                <?php for($day=1;$day<=31;$day++)
                                                {
                                                    echo '<option value="'.$day.'">'.$day.'</option>';
                                                }?>
                                            </select></td><td>
                                                <div ng-controller="monthController"> 
                                                    <select name="voters_birth_month"  class="form-control">
                                                            <option value="<?php echo $voterRow->voters_birthmonth; ?>"><?php echo $voterRow->voters_birthmonth;?></option>
                                                            <option value="{{ y.name }}" ng-repeat="y in month">
                                                                {{ y.name }}
                                                            </option>
                                                    </select>
                                                </div>
                                            
                                            </td><td>
                                            <select class="form-control" name="voters_birth_year">
                                                <option value="<?php echo $voterRow->voters_birthyear; ?>"><?php echo $voterRow->voters_birthyear;?></option>
                                                <?php for($year=2014;$year>=1930;$year--){
                                                    echo '<option value="'.$year.'">'.$year.'</option>';
                                                }?>
                                            </select></td></tr></table>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-blue">Gender</label>
                                            <select class="form-control" name="voters_gender">
                                                <option value="<?php echo $voterRow->voters_gender; ?>"><?php echo $voterRow->voters_gender;?></option>
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="text-blue">Civil Status</label>
                                            <div  ng-controller="statusController"> 
                                                <select name="voters_civil_status" class="form-control" >
                                                        <option value="<?php echo $voterRow->voters_civilstatus; ?>"><?php echo $voterRow->voters_civilstatus;?></option>
                                                        <option value="{{ x.name }}" ng-repeat="x in status">
                                                            {{ x.name }}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="citizenship" class="text-blue">Citizenship</label>
                                            <input type="text" class="form-control" name="voters_citizenship" id="citizenship" value="<?php echo $voterRow->voters_citizenship; ?>"/>
                                        </div>
                                        <div class="form-group" class="text-blue">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="voters_address" id="address" value="<?php echo $voterRow->voters_address; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="course" class="text-blue">Course</label>
                                            <div  ng-controller="courseController"> 
                                                <select name="voters_course" class="form-control" >
                                                        <option value="<?php echo $voterRow->voters_course; ?>"><?php echo $voterRow->voters_course;?></option>
                                                        <option value="{{ x.abbreviation + ' - ' + x.meaning }}" ng-repeat="x in courses">
                                                            {{ x.abbreviation + ' - ' + x.meaning }}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-blue">Father's Name</label>
                                            <table class=" col-sm-12" >
                                            <tr><td>
                                                <input type="text" class="form-control" name="voters_father_firstname"  value="<?php echo $voterRow->voters_fatherfirstname; ?>"/>
                                            </td><td>
                                                <input type="text" class="form-control" name="voters_father_lastname"  value="<?php echo $voterRow->voters_fatherlastname; ?>"/>            
                                             </td></tr>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-blue">Mother's Name</label>
                                            <table class=" col-sm-12" >
                                            <tr><td>
                                                <input type="text" class="form-control" name="voters_mother_firstname"  value="<?php echo $voterRow->voters_motherfirstname; ?>"/>
                                            </td><td>
                                                <input type="text" class="form-control" name="voters_mother_lastname"  value="<?php echo $voterRow->voters_motherlastname; ?>"/>            
                                            </td></tr>
                                            </table>
                                        </div>
                    </div>
                <div class="modal-footer">
                                        <div class="form-group pull-right">
                                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Modify</button>
                                        </div>
                </div>
                                <?php echo form_close();?>                
            </div>
        </div>
    </div>
<?php } ?>
</div>
<script src="<?php echo base_url();?>js/js_controller/courseController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/monthController.js"></script>
<script src="<?php echo base_url();?>js/js_controller/statusController.js"></script>
<!--- the update voters modal alert ends here --->