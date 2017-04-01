<?php 
foreach($querys as $row){
                $createdBy   =   $row->election_created_by;
                $electionScreening  =   $row->election_screening;
                $electionStatus =   $row->election_status;
                $electionName   =   $row->election_name;
            ?>
<div class="modal fade" id="delete<?php echo $row->election_id;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php 
            if($this->session->userdata('user_role')==1){
            ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'delete_election';?>">
                <div class="modal-body">
                        Are you sure. You want to delete <?php echo $electionName;?>?
                        <input type="hidden" name="electionId" id="contact-name" value="<?php echo $row->election_id;?>"/>
                        <input type="hidden" name="returnPage"    value="<?php echo $title; ?>"/>
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                     <button class="btn btn-primary" type="submit">Delete</button>
                </div>
            </form>
            <?php }
            else if(($this->session->userdata('user_role')==0)&&($electionScreening!=1)) {?>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'delete_election';?>">
                <div class="modal-body">
                        Are you sure. You want to delete <?php echo $electionName;?>?
                        <input type="hidden" name="electionId" id="contact-name" value="<?php echo $row->election_id;?>"/>
                        <input type="hidden" name="returnPage"    value="<?php echo $title; ?>"/>
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                     <button class="btn btn-primary" type="submit">Delete</button>
                </div>
            </form>
            <?php } else { ?>
            <div class="modal-body">
                You are not allowed to delete this election. You're only contributor on this system.
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">OK</a>
            </div> 
            <?php }?>
        </div>
    </div>
</div>
<?php } ?>