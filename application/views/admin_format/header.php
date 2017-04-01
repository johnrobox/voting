<!DOCTYPE html>
<html>
    <head>
        <title><?php echo (isset($title)) ? $title : "Online Voting" ?> </title>
        <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon/forlogo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/admin_design.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/selector.js"></script>
        <script src= "<?php echo base_url();?>js/angular.min.js"></script>
		
        <script type = "text/javascript"> 
            
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#SystemUserControl").load("<?php echo base_url();?>system_user_control");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#MyApproved").load("<?php echo base_url();?>myApproved");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#MyApprovedList").load("<?php echo base_url();?>myApproved_List");
                    },1000);
		});
            //script ends
            ////script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#AllPending").load("<?php echo base_url();?>pending_list");
                    },1000);
		});
            //script ends
            ////script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#AllPendingList").load("<?php echo base_url();?>pending_list_view");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#AdminRequest").load("<?php echo base_url();?>admin_request_notification");
                    },1000);
		});
            //script ends
            ////script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#AdminRequestView").load("<?php echo base_url();?>admin_request_notification_view");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#UnreadMessageNotification").load("<?php echo base_url();?>admin_message_notification_unread");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#UnreadMessageListNotification").load("<?php echo base_url();?>admin_message_list_unread_notification");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#ApprovedElectionNotification").load("<?php echo base_url();?>approved_election_notification");
                    },1000);
		});
            //script ends
            ////script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#ApprovedElectionViewDetails").load("<?php echo base_url();?>approved_election_view_details");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#PendingElectionNotification").load("<?php echo base_url();?>pending_election_notification");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#PendingElectionViewDetails").load("<?php echo base_url();?>pending_election_view_details");
                    },1000);
		});
            //script ends
            //script starts
		$(document).ready(function(){
                    setInterval(function(){
                       $("#AdminUsers").load("<?php echo base_url();?>user_login_status_notification");
                    },1000);
		});
            //script ends
            
            

	</script>   
        
    </head>
    <body style="background-color:#fff;">