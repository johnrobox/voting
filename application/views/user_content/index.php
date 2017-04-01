
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-5">
             <h1 class="logo-text">Online Voting System</h1>
        </div>
        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-7 col-md-6 col-lg-5 menu-top">
                <div class="mobile-nav">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" style="background-color:orange;">
                    <span class="icon-bar" style="background-color:black;"></span>
                    <span class="icon-bar" style="background-color:black;"></span>
                    <span class="icon-bar" style="background-color:black;"></span>
                </button>
                 </div>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="active-link">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle top-menu" data-toggle="dropdown">Election Statistics <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                $this->db->where('election_status',1);
                                $query  =   $this->db->get('election_info');
                                if($query->num_rows()>0){
                                    foreach($query->result() as $row){
                                        $this->db->where('election_id',$row->election_u_id);
                                        $queryElection  =   $this->db->get('election');
                                        foreach($queryElection->result() as $rowElection){ ?>
                                            <li><a href="#electionId<?php echo $rowElection->election_id;?>" data-toggle="modal">
                                                    <?php echo strtoupper($rowElection->election_name); ?>
                                            </a></li>
                                    <?php
                                        }
                                    }
                                }else{
                                    echo '<li>No Election Started.</li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="#showContactUsForm" data-toggle="modal" class="top-menu" >Contact Us</a></li>
                        
                    </ul>
                </div>
           
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2 menu-top">
            <div class="">
                <a href="#register"  class="btn btn-info register-button" data-toggle="modal">Register</a>
                <a href="#vote" class="btn btn-danger vote-button" data-toggle="modal">Vote</a>
            </div>
        </div>
    </div>
    <div class="divider"></div>

    
</div>




<div id="mid_background">

     <div class="container">

     <?php if ($this->session->userdata('costumer_message_sent')!='') { ?>
            <style type="text/css">
            .slide-text{
                    padding: 0%;
                }
            </style>
            <div class="alert alert-info alert-dismissible" role="alert" style="margin-top:50px;">
                <?php echo $this->session->userdata('costumer_message_sent');?>
            </div>
     <?php } ?>

     <?php if($this->session->userdata('Member_Already_Registered')!=''||$this->session->userdata('SCHOOL_ID_NOT_FOUND')!=''||$this->session->userdata('wrong_credentials')!='') { ?>
            <style type="text/css">
            .slide-text{
                    padding: 0%;
                }
            </style>
            <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:50px;">
            <i class="fa fa-times"></i> 
                <?php echo $this->session->userdata('Member_Already_Registered');?>
                <?php echo $this->session->userdata('SCHOOL_ID_NOT_FOUND');?>
                <?php echo $this->session->userdata('wrong_credentials');?>
            </div>
     <?php } ?>

     <?php
        // this is for unset all session in this page
        $newdata    =   array(
            'costumer_message_sent'=>'',
            'SCHOOL_ID_NOT_FOUND' => '',
            'Member_Already_Registered' => '',
            'wrong_credentials' => ''

            );
        $this->session->unset_userdata($newdata);
     ?>

    <div id="" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active slide-text">
                <span class = "text-slide"> &nbsp; Voting is now made Easier. &nbsp; </span>
            </div>
            <div class="item slide-text  ">
                <span class = "text-slide"> &nbsp; Voting is now made Simple. &nbsp; </span>
            </div>
            <div class="item slide-text">
                <span class = "text-slide"> &nbsp; Easy as 1 2 3 &nbsp; </span>
            </div>
            <div class="item slide-text ">
                <span class = "text-slide"> &nbsp; First Register &nbsp; </span>
            </div>
            <div class="item slide-text ">
                <span class = "text-slide"> &nbsp; Second Vote &nbsp; </span>
            </div>
            <div class="item slide-text ">
                <span class = "text-slide"> &nbsp; Third View Election Result &nbsp; </span>
            </div>
        </div>
    </div>
    </div>
</div>




<div class="divider"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <img src="<?php echo base_url().'img/3/register.png' ?>" class="img-responsive" style = "width: 70%; height: 70%; margin: 0 auto;"/>
            <div class="text-center main-caption">
                <h4>1</h4>
                Register
            </div>
        </div>
        <div class="col-sm-4">
            <img src="<?php echo base_url().'img/3/vote.png' ?>" class="img-responsive" style = "width: 70%; height: 70%; margin: 0 auto;"/>
            <div class="text-center main-caption">
                <h4>2</h4>
                Vote
            </div>
        </div>
        <div class="col-sm-4">
            <img src="<?php echo base_url().'img/3/result.png' ?>" class="img-responsive" style = "width: 70%; height: 70%; margin: 0 auto;"/>
            <div class="text-center main-caption">
                <h4>3</h4>
                View Election Result
            </div>
        </div>
    </div>
</div>

<div class="divider"></div>
<hr>
<div class="divider"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class = "video-register video-wrapper">
                <div class = "col-sm-3"></div>
                    <div class = "col-sm-6"  style = "margin: 0 auto;">
                        <a href="#vidRegister" class="btn btn-danger register" data-toggle="modal">How to Register?</a>
                    </div>
                <div class = "col-sm-3"></div>
                <img src="<?php echo base_url().'img/3/lap_component.png' ?>" class="img-responsive" style = "width: 80%; height: 80%; margin: 0 auto;"/>               
            </div>
        </div>
        <div class="col-sm-6">
            <div class="video-vote video-wrapper">
                <div class = "col-sm-3"></div>
                    <div class = "col-sm-6"  style = "margin: 0 auto;">
                        <a href="#vidVote" class="btn btn-info vote" data-toggle="modal">How to Vote?</a>
                    </div>
                <div class = "col-sm-3"></div>
                <img src="<?php echo base_url().'img/3/lap_component.png' ?>" class="img-responsive" style = "width: 80%; height: 80%; margin: 0 auto;"/>
              
            </div>
        </div>
    </div>
</div>

<div class="divider"></div>
<hr>
<div class="divider"></div>

<div class="container">
    <div class="row">
        
        <div class="col-sm-4">
            <h4 class="footer-header">
                Services
            </h4>
            <span class="footer-caption">
                Customizes Election for:
                Institutions /  Schools and Pageants
            </span>
        </div>
        
        <div class="col-sm-4">
            <h4 class="footer-header">
                Developers
            </h4>
            <span class="footer-caption">
                You can also send message to our dynamic developers and administrator.
            </span>
        </div>
        
        <div class="col-sm-4">
            <?php echo form_open(base_url().'send_message_to_admin'); ?>
            <h4 class="footer-header">
                Contact Us 
            </h4>
            <span class="footer-caption">
            Feel free to ask, suggest or even comment us.
            </span>
            <br><br>
            <div class="form-group">
                <input type="text" name="cfirstname" class="form-control" placeholder="Firstname" required=""/>
            </div>
            <div class="form-group">
                <input type="text" name="clastname" class="form-control" placeholder="Lastname" required=""/>
            </div>
            <div class="form-group">
                <input type="email" name="cemail" class="form-control" placeholder="Email" required=""/>
            </div>
            <div class="form-group">
                <textarea  rows="3" name="cmessage" class="form-control" placeholder="Message" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-info pull-right">Send</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="divider"></div>
