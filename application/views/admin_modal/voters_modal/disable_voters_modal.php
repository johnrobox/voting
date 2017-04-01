<?php foreach($querys as $row){ ?>
       <?php 
         $this->db->where('manage_election_id',$row->election_id);
         $queryCourse    =   $this->db->get('election_voter_management');
         foreach($queryCourse->result() as $courseRow){ ?>
               <?php 
               if($courseRow->bs_ed==1){ ?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>1" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSED - Bachelor of Science in Secondary Education
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="1"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php } if($courseRow->be_ed==1) {?>
                     <div class="modal fade" id="disable<?php echo $row->election_id; ?>2" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BEED - Bachelor of Science in Elementary Education
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="2"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php } if($courseRow->bs_crim==1) {?>  
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>3" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSCRIM - Bachelor of Science in Criminology
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="3"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php } if($courseRow->bs_mare==1) {?>  
                     <div class="modal fade" id="disable<?php echo $row->election_id; ?>4" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSMARE - Bachelor of Science in Marine Engineering
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="4"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } if($courseRow->bs_mt==1) {?>
                     <div class="modal fade" id="disable<?php echo $row->election_id; ?>5" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSMT - Bachelor of Science in Marine Transportation
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="5"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } if($courseRow->bs_ce==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>6" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSCE - Bachelor of Science in Civil Engineering
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="6"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php } if($courseRow->bs_ee==1) {?>
                     <div class="modal fade" id="disable<?php echo $row->election_id; ?>7" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSEE - Bachelor of Science in Electrical Engineering
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="7"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } if($courseRow->bs_me==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>8" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSME - Bachelor of Science in Mechanical Engineering
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="8"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } if($courseRow->bs_it==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>9" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSIT - Bachelor of Science in Information Technology
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="9"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                        
                <?php } if($courseRow->bs_ba==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>10" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSBA - Bachelor of Science in Business Administration
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="10"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                        
                <?php } if($courseRow->bs_hrm==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>11" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSHRM - Bachelor of Science in Hotel and Restaurant Management
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="11"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } if($courseRow->bs_n==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>12" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    BSN - Bachelor of Science in Nursing
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="12"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                        
                <?php } if($courseRow->a_hrm==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>13" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    AHRM - Associate in Hotel and Restaurant Management
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="13"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                          
                <?php } if($courseRow->a_ct==1) {?>
                    <div class="modal fade" id="disable<?php echo $row->election_id; ?>14" tab-index="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Disable</div>
                                <div class="modal-body">
                                    ACT - Associate in Computer Technology
                                </div>
                                <div class="modal-footer">
                                    <?php echo form_open(base_url().'manage_course'); ?>
                                    <input type="hidden" name="number" value="14"/>
                                    <input type="hidden" name="electionId" value="<?php echo $row->election_id; ?>"/>
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
         <?php } ?>
<?php } ?>