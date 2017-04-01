<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Voters_controller extends CI_Controller{

    public function view_voters(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV View Voters';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['query_voters']=$this->voters_model->voters_getall();
            $this->load->view('admin_content/voter/view_voters',$data);
            $this->load->view('admin_modal/voters_modal/voters_update_modal');
            $this->load->view('admin_modal/voters_modal/voters_delete_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }//end of function
    
    public function voters_election_management(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Manage Election Voters';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/voter/manage_election_voters',$data);
            $this->load->view('admin_modal/voters_modal/add_voter_course_modal');
            $this->load->view('admin_modal/voters_modal/disable_voters_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }
    public function manage_course(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $manage =   $this->input->post('number');
            $electionId =   $this->input->post('electionId');
            $this->voters_model->manage_course_exec($manage,$electionId);
        }else{ redirect(base_url().'admin');}
    }
    public function add_course(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
                  $electionId   =   $this->input->post('electionId');
                  $course = $_POST['course'];
                    $N = count($course);
                    for($i=0; $i < $N; $i++)
                    {
                        $this->db->where('manage_election_id',$electionId);
                        if($course[$i]==1){
                            $this->db->update('election_voter_management',array('bs_ed'=>1));}
                        if($course[$i]==2){
                            $this->db->update('election_voter_management',array('be_ed'=>1));}
                        if($course[$i]==3){
                            $this->db->update('election_voter_management',array('bs_crim'=>1));}
                        if($course[$i]==4){
                            $this->db->update('election_voter_management',array('bs_mare'=>1));}
                        if($course[$i]==5){
                            $this->db->update('election_voter_management',array('bs_mt'=>1));}
                        if($course[$i]==6){
                            $this->db->update('election_voter_management',array('bs_ce'=>1));}
                        if($course[$i]==7){
                            $this->db->update('election_voter_management',array('bs_ee'=>1));}
                        if($course[$i]==8){
                            $this->db->update('election_voter_management',array('bs_me'=>1));}
                        if($course[$i]==9){
                            $this->db->update('election_voter_management',array('bs_it'=>1));}
                        if($course[$i]==10){
                            $this->db->update('election_voter_management',array('bs_ba'=>1));}
                        if($course[$i]==11){
                            $this->db->update('election_voter_management',array('bs_hrm'=>1));}
                        if($course[$i]==12){
                            $this->db->update('election_voter_management',array('bs_n'=>1));}
                        if($course[$i]==13){
                            $this->db->update('election_voter_management',array('a_hrm'=>1));}
                        if($course[$i]==14){
                            $this->db->update('election_voter_management',array('a_ct'=>1));}
                    }
                    redirect(base_url().'voters_election_management');
                    exit();
                  
        }else{ redirect(base_url().'admin');}
    }
    
    public function register_voters(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Register Voters';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $this->load->view('admin_content/voter/register_voters');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer'); 
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    
    public function register_voters_exec(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $validateVotersMembers  =   array(
                array(
                    'field' =>  'voters_school_id',
                    'label' =>  'School Id',
                    'rules' =>  'required|is_unique[voter_member.voters_schoolid]'
                ),
                array(
                    'field' =>  'voters_first_name',
                    'label' =>  'Voters First Name',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_middle_name',
                    'label' =>  'Voters Middle Name',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_last_name',
                    'label' =>  'Voters Last Name',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_gender',
                    'label' =>  'Voters Gender',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_birth_day',
                    'label' =>  'Voters Birth ( Day )',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_birth_month',
                    'label' =>  'Voters Birth ( Month )',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_birth_year',
                    'label' =>  'Voters Birth ( Year )',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_civil_status',
                    'label' =>  'Voters Civil Status',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_citizenship',
                    'label' =>  'Voters Citizenship',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_address',
                    'label' =>  'Voters Address',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_course',
                    'label' =>  'Voters Course',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_father_firstname',
                    'label' =>  'Voters Father\s Firstname',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_father_lastname',
                    'label' =>  'Voters Father\s Lastname',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_mother_firstname',
                    'label' =>  'Voters Mother\s Firstname',
                    'rules' =>  'required'
                ),
                array(
                    'field' =>  'voters_mother_lastname',
                    'label' =>  'Voters Mother\s LastName',
                    'rules' =>  'required'
                )
            );
            $this->form_validation->set_rules($validateVotersMembers);
            if($this->form_validation->run()   ==  FALSE){
                $this->register_voters();
            }
            else{ 
                $voters_school_id =   $this->input->post('voters_school_id');
                $voters_first_name  = ucwords(strtolower($this->input->post('voters_first_name')));
                $voters_middle_name = ucwords(strtolower($this->input->post('voters_middle_name')));
                $voters_last_name   = ucwords(strtolower($this->input->post('voters_last_name')));
                $voters_gender  =   $this->input->post('voters_gender');
                $voters_birth_day   =   $this->input->post('voters_birth_day');
                $voters_birth_month =   $this->input->post('voters_birth_month');
                $voters_birth_year  =   $this->input->post('voters_birth_year');
                $voters_civil_status    =   $this->input->post('voters_civil_status');
                $voters_citizenship =   strtolower($this->input->post('voters_citizenship'));
                $voters_address =   strtolower($this->input->post('voters_address'));
                $voters_course  =   $this->input->post('voters_course');
                $voters_father_firstname    =   ucwords(strtolower($this->input->post('voters_father_firstname')));
                $voters_father_lastname =   ucwords(strtolower($this->input->post('voters_father_lastname')));
                $voters_mother_firstname    =   ucwords(strtolower($this->input->post('voters_mother_firstname')));
                $voters_mother_lastname =   ucwords(strtolower($this->input->post('voters_mother_lastname')));
                $this->voters_model->register_voters_exec($voters_school_id,$voters_first_name,$voters_middle_name,$voters_last_name,$voters_gender,$voters_birth_day,$voters_birth_month,$voters_birth_year,$voters_civil_status,$voters_citizenship,$voters_address,$voters_course,$voters_father_firstname,$voters_father_lastname,$voters_mother_firstname,$voters_mother_lastname);
            }
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    
    public function voters_update(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
                $id =   $this->input->post('id');
                $voters_school_id =   $this->input->post('voters_school_id');
                $old_voters_school_id =   $this->input->post('old_voters_school_id');
                $voters_first_name  = ucwords(strtolower($this->input->post('voters_first_name')));
                $voters_middle_name = ucwords(strtolower($this->input->post('voters_middle_name')));
                $voters_last_name   = ucwords(strtolower($this->input->post('voters_last_name')));
                $voters_gender  =   $this->input->post('voters_gender');
                $voters_birth_day   =   $this->input->post('voters_birth_day');
                $voters_birth_month =   $this->input->post('voters_birth_month');
                $voters_birth_year  =   $this->input->post('voters_birth_year');
                $voters_civil_status    =   $this->input->post('voters_civil_status');
                $voters_citizenship =   ucwords(strtolower($this->input->post('voters_citizenship')));
                $voters_address =   ucwords(strtolower($this->input->post('voters_address')));
                $voters_course  =   $this->input->post('voters_course');
                $voters_father_firstname    =   ucwords(strtolower($this->input->post('voters_father_firstname')));
                $voters_father_lastname =   ucwords(strtolower($this->input->post('voters_father_lastname')));
                $voters_mother_firstname    =   ucwords(strtolower($this->input->post('voters_mother_firstname')));
                $voters_mother_lastname =   ucwords(strtolower($this->input->post('voters_mother_lastname'))); 
                $this->voters_model->voters_update_exec($id,$old_voters_school_id,$voters_school_id,$voters_first_name,$voters_middle_name,$voters_last_name,$voters_gender,$voters_birth_day,$voters_birth_month,$voters_birth_year,$voters_civil_status,$voters_citizenship,$voters_address,$voters_course,$voters_father_firstname,$voters_father_lastname,$voters_mother_firstname,$voters_mother_lastname);
        }else{ redirect(base_url().'admin');}
    }//end of function
    
    public function voters_delete(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $id =   $this->input->post('id');
            $schoolid   =   $this->input->post('voters_school_id');
            $this->voters_model->voters_delete_exec($id,$schoolid);
        }else{ redirect(base_url().'admin');}
    }
}