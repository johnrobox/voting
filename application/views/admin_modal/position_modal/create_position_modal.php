<!--- this is for input modal --------->
<?php 
foreach($querys as $row){ ?>
<div class="modal fade" id="createPosition<?php echo $row->election_id;?>" role="dialog" tab-index="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
      <?php if(($row->election_screening ==  1)&&($row->election_status   ==  0)){?>
            
             <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Create position for - <?php echo $row->election_name;?></div>
                    <div class="panel-body">
                     <div class="col-sm-12">
                            <?php echo form_open(base_url().'create_position_exec'); ?>
                            <div class="form-group">
                            <label for="positionname">Enter Position Name </label>
                            <input type="text" class="form-control" name="positionName" id="positionname" required="" placeholder="Enter position name . . ."/>
                            <input type="hidden" value="<?php echo $row->election_id;?>" name="electionId"/>
                            </div>
                            <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Create</button>
                            <button class="btn btn-primary" type="reset"> Clear</button>
                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                            </div>
                        <?php echo form_close(); ?>
                      </div>
                    </div>
             </div>

           <?php }else if(($row->election_screening ==  1)&&($row->election_status   ==  1)){?>
               <div class="panel panel-primary">
                   <div class="panel-heading">
                       System cannot continue action. The election you selected is now currently started.
                   </div>
                   <div class="panel-body">
                       <a class="btn btn-default pull-right" data-dismiss="modal">Close</a>
                   </div>
               </div>
          <?php }else{ ?>
               <div class="panel panel-primary">
                   <div class="panel-heading">
                        System cannot continue action. Maybe the election you selected is pending or canceled. Try to contact the administrator for Approval.
                   </div>
                   <div class="panel-body">
                        <a class="btn btn-default pull-right" data-dismiss="modal">Close</a>
                   </div>
               </div>
        <?php   }?></div>
        </div>
    </div>
</div>
<?php }?>
<!------- the input modal ends here ------->