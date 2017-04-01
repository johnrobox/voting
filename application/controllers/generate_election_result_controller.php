<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Generate_election_result_controller extends CI_Controller
{

	
	
	
	function index() 
	{	
		$this->hello_world();
	}


	function hello_world()
	{

            $this->db->where('election_id',$this->input->post('ElectionId'));
            $query  =   $this->db->get('election');
            foreach($query->result() as $row){
                $electionName   =   $row->election_name;
                $electionId =   $row->election_id;
                $Id = $row->election_id;
            }
		$this->cezpdf->ezText('Election Result of '.$electionName, 12, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);
                $this->db->where('position_election_id',$electionId);
                $queryPosition = $this->db->get('eposition');
                foreach($queryPosition->result() as $row){
                    $positionId = $row->position_id;
                    $content = $row->position_name;
                    $this->cezpdf->ezText($content.'                            Result                                                      ',20, array('justification' => 'center'));
                    
                    $this->db->where('candidate_election_id',$electionId);
                    $this->db->where('candidate_position_id',$row->position_id);
                    $queryCandidate = $this->db->get('candidate_member');
                    foreach($queryCandidate->result() as $crow){
                        $candidateId = $crow->candidate_id;
                        $this->db->where('voters_id',$crow->candidate_voters_u_id);
                        $queryName  =   $this->db->get('voter_member');
                        foreach($queryName->result() as $nrow){
                            $this->db->where('election_id',$electionId);
                            $this->db->where('position_id',$positionId);
                            $this->db->where('candidate_id',$candidateId);
                            $countResult = $this->db->get('election_result');
                            $content = $nrow->voters_firstname.' '.$nrow->voters_lastname;
                            $this->cezpdf->ezText($content,10);
                            $this->cezpdf->ezText($countResult->num_rows(), 12, array('justification' => 'center'));
                        }
                    }
                    $this->cezpdf->ezText('----------------------------------------------------------------------------------------------------------------------------------------------------------------',10, array('justification' => 'center'));
                }
                
            
           
            


		$this->cezpdf->ezStream();
	}
	
	
	

}

?>