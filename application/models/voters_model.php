<?php
class Voters_model extends CI_Model{
    function manage_course_exec($manage,$electionId){
        if($manage==1){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_ed'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==2){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('be_ed'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==3){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_crim'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==4){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_mare'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==5){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_mt'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==6){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_ce'=>0));
            redirect(base_url().'voters_election_management');
            exit(); 
        }else if($manage==7){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_ee'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==8){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_me'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==9){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_it'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==10){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_ba'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==11){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_hrm'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==12){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('bs_n'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else if($manage==13){
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('a_hrm'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }else {
            $this->db->where('manage_election_id',$electionId);
            $this->db->update('election_voter_management',array('a_ct'=>0));
            redirect(base_url().'voters_election_management');
            exit();
        }
    }//end of function
    function voters_getall(){
        $this->db->order_by("voters_id","asc");
        $query_voters  =   $this->db->get('voter_member');
        return $query_voters->result();
    }//end of function
    function voters_update_exec($id,$old_voters_school_id,$voters_school_id,$voters_first_name,$voters_middle_name,$voters_last_name,$voters_gender,$voters_birth_day,$voters_birth_month,$voters_birth_year,$voters_civil_status,$voters_citizenship,$voters_address,$voters_course,$voters_father_firstname,$voters_father_lastname,$voters_mother_firstname,$voters_mother_lastname){
        $voters_course  =   $voters_course;
        $votersMembersData  =   array(
            'voters_schoolid'   =>  $voters_school_id,
            'voters_firstname'  =>  $voters_first_name,
            'voters_middlename' =>  $voters_middle_name,
            'voters_lastname'   =>  $voters_last_name,
            'voters_gender' =>  $voters_gender,
            'voters_birthday'   =>  $voters_birth_day,
            'voters_birthmonth' =>  $voters_birth_month,
            'voters_birthyear'  =>  $voters_birth_year,
            'voters_civilstatus'    =>  $voters_civil_status,
            'voters_citizenship'    =>  $voters_citizenship,
            'voters_address'    =>  $voters_address,
            'voters_course' =>  $voters_course,
            'voters_fatherfirstname'    =>  $voters_father_firstname,
            'voters_fatherlastname' =>  $voters_father_lastname,
            'voters_motherfirstname'    =>  $voters_mother_firstname,
            'voters_motherlastname' =>  $voters_mother_lastname
        ); 
        if($old_voters_school_id==$voters_school_id){
            $this->db->where('voters_id',$id);
            $this->db->update('voter_member',$votersMembersData);
            $newdata    =   array('voters_update_okay'=>$voters_school_id.' has been modified');
            $this->session->set_userdata($newdata);
            redirect(base_url().'view_voters');
            exit();
        }else{
            $this->db->where('voters_schoolid',$voters_school_id);
            $query  =   $this->db->get('voter_member');
            if($query->num_rows()==0){
                $this->db->where('voters_id',$id);
                $this->db->update('voter_member',$votersMembersData);
                $newdata    =   array('voters_update_okay'=>$voters_school_id.' are modify');
                $this->session->set_userdata($newdata);
                redirect(base_url().'view_voters');
                exit();
            }else{
                $newdata    =   array('voters_update_error'=>'School id allready in use.');
                $this->session->set_userdata($newdata);
                redirect(base_url().'view_voters');
                exit();
            }
        } 
    }//end of function
    
    function voters_delete_exec($id,$schoolid){
        $this->db->where('voters_id',$id);
        $this->db->delete('voter_member');
        $newdata    =   array('voters_delete_okay'=>$schoolid.' has been deleted');
        $this->session->set_userdata($newdata);
        redirect(base_url().'view_voters');
        exit();
    } //end of function
    function register_voters_exec($voters_school_id,$voters_first_name,$voters_middle_name,$voters_last_name,$voters_gender,$voters_birth_day,$voters_birth_month,$voters_birth_year,$voters_civil_status,$voters_citizenship,$voters_address,$voters_course,$voters_father_firstname,$voters_father_lastname,$voters_mother_firstname,$voters_mother_lastname)
    {
	$votersMembersData  =   array(
            'voters_schoolid'   =>  $voters_school_id,
            'voters_firstname'  =>  $voters_first_name,
            'voters_middlename' =>  $voters_middle_name,
            'voters_lastname'   =>  $voters_last_name,
            'voters_gender' =>  $voters_gender,
            'voters_birthday'   =>  $voters_birth_day,
            'voters_birthmonth' =>  $voters_birth_month,
            'voters_birthyear'  =>  $voters_birth_year,
            'voters_civilstatus'    =>  $voters_civil_status,
            'voters_citizenship'    =>  $voters_citizenship,
            'voters_address'    =>  $voters_address,
            'voters_course' =>  $voters_course,
            'voters_fatherfirstname'    =>  $voters_father_firstname,
            'voters_fatherlastname' =>  $voters_father_lastname,
            'voters_motherfirstname'    =>  $voters_mother_firstname,
            'voters_motherlastname' =>  $voters_mother_lastname
        );   
        $this->db->insert('voter_member',$votersMembersData);
        $newData    =   array(
            'add_voter_members_okay'    =>  'A record has been added.'
        );
        $this->session->set_userdata($newData);
        header("location:".base_url()."register_voters");
    }//end of function
}
?>
