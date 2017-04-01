<?php
foreach($querys as $electionRows){ ?>
<?php if($this->session->userdata('user_role')==1){ ?>
    <?php if($electionRows->election_screening==1&&$electionRows->election_status==0){?>
    <div class="modal fade" id="start<?php echo $electionRows->election_id; ?>" tab-index="-1" role="dialog">
    <?php } else if ($electionRows->election_screening==1&&$electionRows->election_status==1) { ?>
    <div class="modal fade" id="stop<?php echo $electionRows->election_id; ?>" tab-index="-1" role="dialog">
    <?php } else if ($electionRows->election_screening==0&&$electionRows->election_status==0) { ?>
        <div class="modal fade" id="approve<?php echo $electionRows->election_id; ?>" tab-index="-1" role="dialog">
    <?php } ?>
<?php }else{ ?>
    <?php if($electionRows->election_created_by==$this->session->userdata('user_id')&&$electionRows->election_screening==0){?>
        <div class="modal fade" id="cancel<?php echo $electionRows->election_id; ?>" tab-index="-1" role="dialog">
    <?php } else if($electionRows->election_created_by==$this->session->userdata('user_id')&&$electionRows->election_screening==5){?>
            <div class="modal fade" id="resume<?php echo $electionRows->election_id; ?>" tab-index="-1" role="dialog">
    <?php } ?>
<?php } ?>
    
                  
            <?php if($this->session->userdata('user_role')==1){ ?>
                
                        <?php if($electionRows->election_screening==1&&$electionRows->election_status==0){?>
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <?php echo $electionRows->election_name; ?>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-hand-o-up"></i>
                                Start election,  <?php echo $electionRows->election_name;?>
                            </div>
                            <div class="modal-footer">
                                <?php echo form_open(base_url().'manage_election') ?>
                                <input type="hidden" name="electionId" value="<?php echo $electionRows->election_id;?>" />
                                <input type="hidden" name="request" value="start" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Start now!</button>
                                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                            </div>
                        <?php }else if ($electionRows->election_screening==1&&$electionRows->election_status==1) { ?>
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                 <?php echo $electionRows->election_name; ?>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-hand-o-up"></i>
                                Stop election,  <?php echo $electionRows->election_name;?>
                            </div>
                            <div class="modal-footer">
                                <?php echo form_open(base_url().'manage_election') ?>
                                <input type="hidden" name="electionId" value="<?php echo $electionRows->election_id;?>" />
                                <input type="hidden" name="request" value="stop" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Stop now!</button>
                                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                            </div>
                        <?php }else if ($electionRows->election_screening==0&&$electionRows->election_status==0) { ?>
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <?php echo $electionRows->election_name; ?>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-hand-o-up"></i>
                                Approve election,  <?php echo $electionRows->election_name;?>
                            </div>
                            <div class="modal-footer">
                                <?php echo form_open(base_url().'manage_election') ?>
                                <input type="hidden" name="electionId" value="<?php echo $electionRows->election_id;?>" />
                                <input type="hidden" name="request" value="approve" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Approve now!</button>
                                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                            </div>
                        <?php } ?>
            
            <?php } else {?>
                        <?php if($electionRows->election_created_by==$this->session->userdata('user_id')&&$electionRows->election_screening==0){?>
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <?php echo $electionRows->election_name; ?>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-hand-o-up"></i>
                                Cancel election,  <?php echo $electionRows->election_name;?>
                            </div>
                            <div class="modal-footer">
                                <?php echo form_open(base_url().'manage_election') ?>
                                <input type="hidden" name="electionId" value="<?php echo $electionRows->election_id;?>" />
                                <input type="hidden" name="request" value="cancel" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Cancel now!</button>
                                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                            </div>
                        <?php } else if($electionRows->election_created_by==$this->session->userdata('user_id')&&$electionRows->election_screening==5){?>
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <?php echo $electionRows->election_name; ?>
                            </div>
                            <div class="modal-body">
                                <i class="fa fa-hand-o-up"></i>
                                Resume election,  <?php echo $electionRows->election_name;?>
                            </div>
                            <div class="modal-footer">
                                <?php echo form_open(base_url().'manage_election') ?>
                                <input type="hidden" name="electionId" value="<?php echo $electionRows->election_id;?>" />
                                <input type="hidden" name="request" value="resume" />
                                <button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Resume now!</button>
                                <button class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                            </div>
                        <?php } ?>
            <?php } ?>
            
        </div>
    </div>
</div>
<?php
}
?>