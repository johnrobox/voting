<?php foreach($querys as $row){ ?>
    <div class="modal fade" id="addCourse<?php echo $row->election_id; ?>" role="dialog" tab-index="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo ucwords($row->election_name);?>
                    <i class="fa fa-times  pull-right" data-dismiss="modal"></i>
                </div>
                <?php echo form_open(base_url().'add_course'); ?>
                <div class="modal-body">
                    <table class="table table-hover table-bordered">
                    <?php
                    $exist  =   0;
                    $this->db->where('manage_election_id',$row->election_id);
                    $queryCourse    =   $this->db->get('election_voter_management');
                    foreach($queryCourse->result() as $courseRow){ ?>
                        <?php  
                                        if($courseRow->bs_ed==0){ $exist  =   1;?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="1"/>                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSED - Bachelor of Science in Secondary Education
                                                </td>
                                                
                                            </tr>
                                    <?php } if($courseRow->be_ed==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="2"/>                                                      <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BEED - Bachelor of Science in Elementary Education
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_crim==0) { $exist  =   1; ?>    
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="3"/>                                                      <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSCRIM - Bachelor of Science in Criminology
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_mare==0) { $exist  =   1; ?>    
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="4"/>                                                      <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSMARE - Bachelor of Science in Marine Engineering
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_mt==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="5"/>                                                       <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSMT - Bachelor of Science in Marine Transportation
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ce==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="6"/>                                                       <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSCE - Bachelor of Science in Civil Engineering
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ee==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="7"/>                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSEE - Bachelor of Science in Electrical Engineering
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_me==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="8"/>                                                       <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSME - Bachelor of Science in Mechanical Engineering
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_it==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="9"/>                                                       <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSIT - Bachelor of Science in Information Technology
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_ba==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="10"/>                                                     <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSBA - Bachelor of Science in Business Administration
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_hrm==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="11"/>                                                      <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSHRM - Bachelor of Science in Hotel and Restaurant Management
                                                </td>
                                            </tr>
                                    <?php } if($courseRow->bs_n==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="12"/>                                                        <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    BSN - Bachelor of Science in Nursing
                                                </td>
                                            </tr>
                                     <?php } if($courseRow->a_hrm==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="13"/>                                                     <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    AHRM - Associate in Hotel and Restaurant Management
                                                </td>
                                            </tr>
                                     <?php } if($courseRow->a_ct==0) { $exist  =   1; ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                                    <input type="checkbox"  name="course[]" value="14"/>                                                     <?php echo form_close(); ?>
                                                </td>
                                                <td>
                                                    ACT - Associate in Computer Technology
                                                </td>
                                            </tr>
                                     <?php } ?>
            <?php        }
                    ?>
                    </table>
                    <?php
                    if($exist  == 0){
                        echo 'No course available.';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <?php if($exist  !=   0) { ?>
                    <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Add</button>
                    <?php } ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>
