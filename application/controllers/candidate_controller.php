<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Candidate_controller extends CI_Controller{
    public function view_candidates(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV View Candidates';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/candidate/view_candidates',$data);
            $this->load->view('admin_modal/candidate_modal/update_candidate_modal');
            $this->load->view('admin_modal/candidate_modal/delete_candidate_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }//end of function
    public function register_candidates(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Register Candidates';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            
            $this->load->view('admin_content/candidate/register_candidates',$data);
            $this->load->view('admin_modal/candidate_modal/register_candidate_modal');
            $this->load->view('admin_modal/candidate_modal/update_candidate_modal');
            $this->load->view('admin_modal/candidate_modal/delete_candidate_modal');
            $this->load->view('admin_modal/candidate_modal/register_independent_candidate_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer'); 
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function register_candidate_exec(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $schoolId   =   $this->input->post('schoolId');
            $firstName  =   ucwords(strtolower($this->input->post('firstName')));
            $middleName =   ucwords(strtolower($this->input->post('middleName')));
            $lastName   =   ucwords(strtolower($this->input->post('lastName')));
            $electionId =   $this->input->post('electionId');
            $positionId =   $this->input->post('positionId');
            $teamId     =   $this->input->post('teamId');
            $this->candidate_model->register_candidate_exec($schoolId,$firstName,$middleName,$lastName,$electionId,$positionId,$teamId);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function register_independent_candidate(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $schoolId   =   $this->input->post('schoolId');
            $firstName  =   ucwords(strtolower($this->input->post('firstName')));
            $middleName =   ucwords(strtolower($this->input->post('middleName')));
            $lastName   =   ucwords(strtolower($this->input->post('lastName')));
            $electionId =   $this->input->post('electionId');
            $positionId =   $this->input->post('positionId');
            $this->candidate_model->register_independent_candidate_exec($schoolId,$firstName,$middleName,$lastName,$electionId,$positionId);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function update_candidate(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $schoolId   =   $this->input->post('schoolId');
            $firstName  =   ucwords(strtolower($this->input->post('firstName')));
            $middleName =   ucwords(strtolower($this->input->post('middleName')));
            $lastName   =   ucwords(strtolower($this->input->post('lastName')));
            $electionId =   $this->input->post('electionId');
            $positionId =   $this->input->post('positionId');
            $teamId     =   $this->input->post('teamId');
            $candidateId    =   $this->input->post('candidateId');
            $pageTitle  =   $this->input->post('title');
            $this->candidate_model->update_candidate_exec($pageTitle,$schoolId,$firstName,$middleName,$lastName,$electionId,$positionId,$teamId,$candidateId);
        }else{ header('location:'.base_url().'admin');}
    }//end of function 
    public function delete_candidate(){
        $candidateId    =   $this->input->post('candidateId');
        $electionId =   $this->input->post('electionId');
        $pageTitle  =   $this->input->post('title');
        $this->candidate_model->delete_candidate_exec($pageTitle,$candidateId,$electionId);
    }
}
?>