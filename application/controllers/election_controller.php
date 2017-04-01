<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Election_controller extends CI_Controller{
    public function view_elections(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV View Elections';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/election/view_elections',$data);
            $this->load->view('admin_modal/election_modal/update_election_modal');
            $this->load->view('admin_modal/election_modal/delete_election_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }//end of function
    public function view_pending_election(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - Pending Election';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $data['querys_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_content/election/pending_election',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/election_modal/manage_elections_modal');
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_message_modal/view_message_modal');
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }
    public function view_myApproved_election(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - My Approved Election';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $data['querys_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_content/election/myApproved_election',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/election_modal/manage_elections_modal');
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_message_modal/view_message_modal');
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{header('location:'.base_url().'admin');}
    }
    public function create_election(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OV Create Election';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/election/create_election', $data); 
            $this->load->view('admin_modal/election_modal/update_election_modal');
            $this->load->view('admin_modal/election_modal/delete_election_modal');
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer'); 
        }else{header('location:'.base_url().'admin');}
    }//end of function
    
    public function create_election_exec(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $validateElection   =   array(
                array('field'   =>  'electionName',
                    'label' =>  'Election Name',
                    'rules' =>  'required|is_unique[election.election_name]|min_length[4]',
                    ),
                array('field'   =>  'electionDescription',
                    'label' =>  'Description',
                    'rules' =>  'required|min_length[20]')
            );
            $this->form_validation->set_rules($validateElection);
            if($this->form_validation->run()==FALSE){
                $this->create_election();
            }else{
            $ElectionName = $this->input->post('electionName');
            $ElectionDescription = $this->input->post('electionDescription');
            $this->session->set_userdata(array('key'=>date("h:i:sa").''.date("l").''.date("Y-m-d")));
            $this->election_model->create_election_exec($ElectionName,$ElectionDescription);
            }
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    
    public function update_election(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $electionName   =   $this->input->post('election_name');
            $electionDescription    =   $this->input->post('election_description');
            $electionId    =   $this->input->post('election_id');
            $returnPage =   $this->input->post('returnPage');
            $this->election_model->update_election($electionName,$electionDescription,$electionId,$returnPage);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function delete_election(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $electionId    =   $this->input->post('electionId');
            $returnPage =   $this->input->post('returnPage');
            $this->election_model->delete_election_exec($electionId,$returnPage);
            $newdata =   array('return_page'=>'');
            $this->session->unset_userdata($newdata);
        }else{ header('location:'.base_url().'admin');}
    }//end of function
    public function manage_election(){
        $electionId   =   $this->input->post('electionId');
        $request =   $this->input->post('request');
        $this->election_model->manage_election_exec($electionId,$request);
    }
    
    public function view_election_result(){
        if(($this->session->userdata('user_id')!='')&&($this->session->userdata('logged_in')==TRUE)){
            $data['title']  =   'OVS - View Election Result';
            $this->load->view('admin_format/header',$data);
            $data['adminMessage'] =   $this->admin_message_model->admin_own_message();
            $this->load->view('admin_format/nav',$data);
            $this->load->view('admin_format/menu');
            $data['querys']=$this->election_model->electionname_getall();
            $this->load->view('admin_content/election/view_election_result',$data);
            $data['query_user']=$this->admin_member_model->admin_users_getall();
            $this->load->view('admin_modal/admin_message_modal/create_message_modal',$data);
            $this->load->view('admin_modal/admin_modal/admin_Change_Password_Modal');
            $this->load->view('admin_format/footer');
        }else{ redirect(base_url().'admin');}
    }
    public function generate_election_result(){
        $data['title'] = "OVS - Election Result";
        $this->load->view('admin_content/election/generated_election_result',$data);
    }
}
?>