<?php
$queryAllCandidate  =   $this->db->get('candidate_member');
foreach($queryAllCandidate->result() as $candidateRow){ ?>
<div class="modal fade" id="deleteCandidate<?php echo $candidateRow->candidate_id;?>" tab-index="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-trash-o"></i> Delete this candidate ?</div>
            <div class="modal-body"></div>
            <?php echo form_open(base_url().'delete_candidate'); ?>
            <div class="modal-footer">
                <input type="hidden" name="candidateId" value="<?php echo $candidateRow->candidate_id;?>"/>
                <input type="hidden" name="electionId" value="<?php echo  $candidateRow->candidate_election_id;?>"/>
                <input type="hidden" name="title" value="<?php echo $title;?>"/>
                <button class="btn btn-primary" type="submit"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php
}
?>