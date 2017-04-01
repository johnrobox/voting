<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "user_index_controller";
$route['user_index_controller'] = "user_index_controller";

$route['statistic'] =   "user_index_controller/statistic";

$route['send_message_to_admin'] =   "user_index_controller/send_message_to_admin";
$route['checkID'] = "user_index_controller/check_id_for_register";
$route['voters_registration_form'] = "user_index_controller/voters_registration_form";
$route['check_for_correct_voters'] = "user_index_controller/check_for_correct_voters";
$route['registered_finish'] =   "user_index_controller/registered_finish";
$route['validate_voters']   =   "user_index_controller/validate_voters";
$route['choose_election']   =   "user_index_controller/choose_election";
$route['session_electionChoosen']   =   "user_index_controller/session_electionChoosen";
$route['view_balots']   =   "user_index_controller/view_balots";
$route['view_balotsN']  =   "user_index_controller/view_balotsN";
$route['logout_voter']  =   "user_index_controller/logout_voter";
$route['second'] = "user_index_controller/second";
$route['third'] = "user_index_controller/third";
$route['fourth'] = "user_index_controller/fourth";
$route['fifth'] = "user_index_controller/fifth";

/* routing for administration page starts here */




$route['admin_homepage'] = "admin_homepage_controller/admin_homepage";









//routing all about for admin members account and information
$route['admin'] = "admin_members_controller";
$route['admin_login_exec'] = "admin_members_controller/admin_login_exec";
$route['add_admin'] = "admin_members_controller/add_admin_member";
$route['add_admin_exec'] = "admin_members_controller/add_admin_member_exec";
$route['admin_logout'] = "admin_members_controller/admin_logout";
$route['admin_settings']    =   "admin_members_controller/admin_settings";
$route['admin_change_info'] =   "admin_members_controller/admin_change_info";
$route['admin_change_password'] =   "admin_members_controller/admin_change_password";
$route['view_admin_users']  =   "admin_members_controller/view_admin_users";
$route['manage_user_admin'] =   "admin_members_controller/manage_user_admin";
//end 

//routing all about in ELECTION
$route['view_elections']    =   "election_controller/view_elections";
$route['view_myApproved_election']  =   "election_controller/view_myApproved_election";
$route['view_pending_election'] =   "election_controller/view_pending_election";
$route['create_election'] = "election_controller/create_election";
$route['create_election_exec'] = "election_controller/create_election_exec";
$route['update_election']   =   "election_controller/update_election";
$route['delete_election']   =   "election_controller/delete_election";
$route['manage_election']  =   "election_controller/manage_election";
$route['view_election_result']  =   "election_controller/view_election_result";

$route['generate_election_result']  =   "Generate_election_result_controller";
$route['scaffolding_trigger'] = "";
//end

//routing all about in POSITION
$route['view_pending_position'] = "position_controller/view_pending_position";
$route['view_myApproved_position']  =   "position_controller/view_myApproved_position";
$route['view_positions']    =   "position_controller/view_positions";
$route['create_position'] = "position_controller/create_position";
$route['create_position_exec'] = "position_controller/create_position_exec";
$route['approved_position'] =   "position_controller/approved_position";
$route['update_position'] = "position_controller/update_position";
$route['delete_position']   =   "position_controller/delete_position";
//end

//routing all about in TEAM 
$route['create_team'] = "team_controller/create_team";
$route['create_team_exec']  =   "team_controller/create_team_exec";
$route['update_team']   =   "team_controller/update_team";
$route['delete_team']   =   "team_controller/delete_team";
//end

//routing all about CANDIDATES
$route['view_candidates']   =   "candidate_controller/view_candidates";
$route['register_candidates'] = "candidate_controller/register_candidates";
$route['register_candidate_exec']   =   "candidate_controller/register_candidate_exec";
$route['update_candidate']  =   "candidate_controller/update_candidate";
$route['delete_candidate']  =   "candidate_controller/delete_candidate";
$route['register_independent_candidate'] = "candidate_controller/register_independent_candidate";
//end

//routing all about VOTERS
$route['view_voters']   =   "voters_controller/view_voters";
$route['register_voters'] = "voters_controller/register_voters";
$route['register_voters_exec'] = "voters_controller/register_voters_exec";
$route['voters_update'] =   "voters_controller/voters_update";
$route['voters_delete'] =   "voters_controller/voters_delete";
$route['voters_election_management']    =   "voters_controller/voters_election_management";
$route['manage_course'] =   "voters_controller/manage_course";
$route['add_course']    =   "voters_controller/add_course";


//routing all about ADMIN MESSAGES
$route['guest_message'] =   "admin_message_controller/guest_message";
$route['readCustomerMessage'] = "admin_message_controller/readCustomerMessage";
$route['deleteCustomerMessage'] =   "admin_message_controller/deleteCustomerMessage";
$route['replyCustomerMessage']  =   "admin_message_controller/replyCustomerMessage";
$route['send_admin_message_exec']   =   "admin_message_controller/send_admin_message_exec";
$route['admin_inbox']   =   "admin_message_controller/admin_inbox";
$route['read_admin_message']    =   "admin_message_controller/read_admin_message";
$route['delete_admin_message'] =   "admin_message_controller/delete_admin_message";
$route['admin_sentbox'] =   "admin_message_controller/admin_sentbox";
$route['delete_sentbox_message']   =   "admin_message_controller/delete_sentbox_message";
$route['inable_request']	=	"admin_message_controller/inable_request";


$route['myApproved_List']   =   "admin_notification_controller/myApproved_List";
$route['myApproved']    =   "admin_notification_controller/myApproved";
$route['pending_list']  =   "admin_notification_controller/pending_list";
$route['pending_list_view'] = "admin_notification_controller/pending_list_view";
$route['admin_message_notification_unread']   =   "admin_notification_controller/admin_message_notification_unread";
$route['approved_election_notification']    =   "admin_notification_controller/approved_election_notification";
$route['pending_election_notification'] =   "admin_notification_controller/pending_election_notification";
$route['user_login_status_notification']    =   "admin_notification_controller/user_login_status_notification";
$route['admin_message_list_unread_notification']    =   "admin_notification_controller/admin_message_list_unread_notification";
$route['approved_election_view_details']    =   "admin_notification_controller/approved_election_view_details";
$route['pending_election_view_details'] =   "admin_notification_controller/pending_election_view_details";
$route['system_user_control']   =   "admin_notification_controller/system_user_control";
$route['show_manila_time']  =   "admin_notification_controller/show_manila_time";
$route['send_administrator_request']    =   "admin_message_controller/send_administrator_request";
$route['admin_request_notification']    =   "admin_notification_controller/admin_request_notification";
$route['admin_request_notification_view']   =   "admin_notification_controller/admin_request_notification_view";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */