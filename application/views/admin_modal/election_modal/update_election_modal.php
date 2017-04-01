<?php 
foreach($querys as $row){
                $electionName   =   $row->election_name;
                $electionDescription  =   $row->election_description;
                $createdBy  =   $row->election_created_by;
                $electionScreening  =   $row->election_screening;
                $electionStatus =   $row->election_status;
            ?>
<div class="modal fade" id="update<?php echo $row->election_id;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php 
            if(($this->session->userdata('user_role')==1)&&($electionScreening==1)){
            ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'update_election';?>">
                <div class="modal-header"> <b>Modify Election Name</b></div>
                <div class="modal-body">
                    <span class="text-blue">Election Name</span>
                        <input type="text" class="form-control" name="election_name"  value="<?php echo $electionName?>"placeholder="Enter your ID number "/>
                    <span class="text-blue">Descriptions</span>
                        <textarea class="form-control" name="election_description"><?php echo $electionDescription;?></textarea>
                        <input type="hidden" name="returnPage"    value="<?php echo $title; ?>"/>
                        <input type="hidden"  name="election_id"  value="<?php echo $row->election_id;?>"/> 
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                     <button class="btn btn-primary" type="submit">Modify</button>
                </div>
            </form>
            <?php }
            else if(($this->session->userdata('user_role')==2)&&($electionScreening==0)){?>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'update_election';?>">
                <div class="modal-header"> <b>Modify Election Name</b></div>
                <div class="modal-body">
                    <span class="text-blue">Election Name</span>
                        <input type="text" class="form-control" name="election_name"  value="<?php echo $electionName?>"placeholder="Enter your ID number "/>
                    <span class="text-blue">Descriptions</span>
                        <textarea class="form-control" name="election_description"><?php echo $electionDescription;?></textarea>
                        <input type="hidden" name="returnPage"   value="<?php echo $title; ?>"/>
                        <input type="hidden" name="election_id"  value="<?php echo $row->election_id;?>"/> 
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                     <button class="btn btn-primary" type="submit">Modify</button>
                </div>
            </form>
            <?php }else if(($this->session->userdata('user_role')==2)&&($electionScreening==5)){ ?>
            <div class="modal-body">
                Cannot update. This election is already canceled! Please resume before Modifying.
            </div>
            <div class="modal-footer"><a class="btn btn-primary" data-dismiss="modal">OK</a></div>                
            <?php }else if(($this->session->userdata('user_role')==2)&&($electionScreening==1)){ ?>
            <div class="modal-body">
                Cannot update. You are a Contributor only.
            </div>
            <div class="modal-footer"><a class="btn btn-primary" data-dismiss="modal">OK</a></div> 
            <?php }else if(($this->session->userdata('user_role')==1)&&($electionScreening!=1)){?>
            <div class="modal-body">
                Cannot update. This election is Canceled / Pending.
            </div>
            <div class="modal-footer"><a class="btn btn-primary" data-dismiss="modal">OK</a></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>