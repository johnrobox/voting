
        
<div class="container-fluid">
   
        <div class="row text-blue">
            <div class="col-sm-3" style="padding:0;margin:0; background-color:#f5f5f5;">
                
                <div class="">
                    <table class="table" style="margin:0;">
                        <tr>
                            <td>
                                <img class="img-circle img-responsive pull-left" style="height:45%; width:20%;margin:5px;"src="<?php echo base_url();?>img/user/avatar2.png">
                                <div class="pull-left" style="margin:5px; width:70%">
                                    <b>Hello,
                                    <?php echo $this->session->userdata('user_firstname');?></b>
                                    <br>
                                    <span class="glyphicon glyphicon-ok-circle" style="color:green"></span>
                                    online
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="">
                                    <!--------
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="Search ... "/>
                                        <span class="input-group-addon"><a href="" class="glyphicon glyphicon-search"></a></span>
                                    </div>
                                    <!------>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control input-sm" placeholder="Search ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                    </div>
                                 </form>
                            </td>
                        </tr>
                    </table> 
                    
                </div>
                
                
                
                
        <div class="panel-group " id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading" >
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <a href="<?php echo base_url().'admin_homepage';?>">
            <span class="glyphicon glyphicon-dashboard"></span> <span>Dashboard</span>
            </a>
        </a>
      </h4>
    </div>
  </div>
  
            
     
  <div class="panel panel-default">
      <div class="panel-heading">
          <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">    
      <span class="glyphicon glyphicon-pencil"></span>
       Create  
      <span class="glyphicon glyphicon-plus pull-right"></span> 
          </a></h4>
      </div>      
    <?php if(($title=='OV Create Election')||($title=='OV Create Position')||($title=='OV Create Team')) {?>
      <div class="menu-link-container">
      <div class="menu-link-padding" <?php if($title=='OV Create Election'){echo 'id="menu-link-active"';}?> >
       <a href="<?php echo base_url();?>create_election"> Create Election </a>
      </div>
      <div class="menu-link-padding" <?php if($title=='OV Create Position'){echo 'id="menu-link-active"';}?>>
       <a href="<?php echo base_url();?>create_position"> Create Position </a>
      </div>
       <div class="menu-link-padding" <?php if($title=='OV Create Team'){echo 'id="menu-link-active"';}?>>
       <a href="<?php echo base_url();?>create_team"> Create Team </a>
       </div>
      </div>
  
      <?php }else{?>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body" >
       <a href="<?php echo base_url();?>create_election"> Create Election </a>
       <br>
       <a href="<?php echo base_url();?>create_position"> Create Position </a>
       <br>
       <a href="<?php echo base_url();?>create_team"> Create Team </a>
      </div>
    </div>      

  <?php    }
?>
  </div>       
            
            
            
            
            
            
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <i class="fa fa-fw fa-edit"></i>
            Register
            <span class="glyphicon glyphicon-plus pull-right"></span>
        </a>
      </h4>
    </div>      
   <?php if(($title=='OV Register Voters')||($title=='OV Register Candidates')){?>   
      <div class="menu-link-container">
        <div class="menu-link-padding" <?php if($title=='OV Register Voters'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>register_voters"> Register Voters </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV Register Candidates'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>register_candidates"> Register Candidates </a>
        </div>
      </div>
      <?php } else {?>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="<?php echo base_url();?>register_voters"> Register Voters </a>
        <br>
        <a href="<?php echo base_url();?>register_candidates"> Register Candidates </a>
      </div>
    </div>          
     <?php }?>
  </div>




    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
            <i class="fa fa-fw fa-desktop"></i>
            View
            <span class="glyphicon glyphicon-plus pull-right"></span>
        </a>
      </h4>
    </div>
           <?php if((($title=='OV View Elections')||($title=='OV View Positions'))||(($title=='OV View Candidates')||($title=='OV View Voters'))){?>   
      <div class="menu-link-container">
        <div class="menu-link-padding" <?php if($title=='OV View Elections'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>view_elections"> Elections </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV View Positions'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>view_positions"> Position </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV View Candidates'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>view_candidates"> Candidates </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV View Voters'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>view_voters"> Voters </a>
        </div>
      </div>
      <?php } else {?>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="<?php echo base_url();?>view_elections"> Elections </a>
        <br>
        <a href="<?php echo base_url();?>view_positions"> Position </a>
        <br>
        <a href="<?php echo base_url();?>view_candidates"> Candidates </a>
        <br>
        <a href="<?php echo base_url();?>view_voters"> Voters </a>
      </div>
    </div>          
     <?php }?>

  </div>
   
    <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifthss">
                <a href="<?php echo base_url().'voters_election_management';?>">
                <i class="fa fa-users"></i>
                 Manage Voters
                </a>
            </a>
          </h4>
        </div>
      </div>

    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifthss">
            <a href="<?php echo base_url().'view_election_result';?>">
            <i class="fa fa-fw fa-bar-chart-o"></i>
            Election Result
            </a>
        </a>
      </h4>
    </div>
  </div> 
            
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
            <span class="glyphicon glyphicon-user"></span>
            User
            <span class="glyphicon glyphicon-plus pull-right"></span>
        </a>
      </h4>
    </div>
    <?php if(($title=='OV Add-admin Member')||($title=='OV View-admin Member')||($title=='OV Admin Settings')){?>   
      <div class="menu-link-container">
       <?php if($this->session->userdata('user_role')==1) { ?>
        <div class="menu-link-padding" <?php if($title=='OV Add-admin Member'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>add_admin"> Add Users </a>
        </div>
       <?php  } ?>
        <div class="menu-link-padding" <?php if($title=='OV View-admin Member'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>view_admin_users"> All Users </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV Admin Settings'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>admin_settings"> Settings </a>
        </div>
      </div>
      <?php } else {?>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
        <?php if($this->session->userdata('user_role')==1) {?>
            <a href="<?php echo base_url().'add_admin';?>"> Add Users </a>
        <br> <?php  } ?>
            <a href="<?php echo base_url().'view_admin_users';?>"> All Users </a>
        <br>
            <a href="<?php echo base_url().'admin_settings';?>"> Settings </a>
      </div>
    </div>
        <?php  } ?>
  </div>




<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
            <i class="fa fa-envelope"></i>
            SMS
            <span class="glyphicon glyphicon-plus pull-right"></span>
        </a>
      </h4>
    </div>
    <?php if(($title=='OV Admin Inbox')||($title=='OV Admin Sentbox')){?>   
      <div class="menu-link-container">
        <div class="menu-link-padding" <?php if($title=='OV Admin Inbox'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>admin_inbox"> Inbox </a>
        </div>
        <div class="menu-link-padding" <?php if($title=='OV Admin Sentbox'){echo 'id="menu-link-active"';}?>>
            <a href="<?php echo base_url();?>admin_sentbox"> Sentbox </a>
        </div>
      </div>
      <?php } else {?>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body">
            <a href="<?php echo base_url().'admin_inbox';?>"> Inbox </a>
        <br>
            <a href="<?php echo base_url().'admin_sentbox';?>"> Sentbox </a>
      </div>
    </div>
        <?php  } ?>
  </div>



            
</div>
                
                

                
    </div>