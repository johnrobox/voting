




<div id="header">
            <div class="container-fluid">
                <div style="height: 20px;">
                    
                </div>
                <div class="row">
                    <div class="col-sm-4" >
                        <img src="img/right.png"  alt="Image3" class="img-responsive" />
                    </div>
                    <div class="col-sm-8">
                        
                       <div id="" class="carousel slide">
                    
                     <div class="carousel-inner">
                           <div class="item active">
                                <img src="img/header_slide/first.jpg" width="100%" alt="Image1" class="img-responsive">
                                  
                           </div>
                           <div class="item">
                                <img src="img/header_slide/second.png" width="100%"  alt="Image2" class="img-responsive">
                                                 
                           </div>
                           <div class="item">
                                <img src="img/header_slide/third.png" width="100%" alt="Image3" class="img-responsive">
                                   
                           </div>
                           <div class="item">
                                <img src="img/header_slide/fourth.jpg" width="100%" alt="Image3" class="img-responsive">
                                    
                           </div>
                           <div class="item">
                                <img src="img/header_slide/fifth.jpg" width="100%" alt="Image3" class="img-responsive">
                                  
                           </div>
                           <div class="item">
                                <img src="img/header_slide/six.jpg" width="100%" alt="Image3" class="img-responsive">
                                
                           </div>
                          <div class="item">
                                <img src="img/header_slide/seven.jpg" width="100%" alt="Image3" class="img-responsive">
                                
                           </div>
                    </div>
            
                    
            
            </div>
                        <a href="#register" class="btn btn-primary" data-toggle="modal">REGISTER</a>
                        <a href="#vote" class="btn btn-info" data-toggle="modal">VOTE</a>
                        <br><br>
                        <!--- session for not found id alert starts here    --->
<?php 
   if($this->session->userdata('SCHOOL_ID_NOT_FOUND')!=''||$this->session->userdata('Member_Already_Registered')!=''||$this->session->userdata('wrong_credentials')!=''){ ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-times"> </i>
            <?php echo $this->session->userdata('SCHOOL_ID_NOT_FOUND'); ?>
            <?php echo $this->session->userdata('Member_Already_Registered'); ?>
            <?php echo $this->session->userdata('Inputted_wrong_credentials'); ?>
        </div>
<?php } ?>
<!--- session for not found id alert ends here  ----->

                    </div>
                </div>
                <div style="height: 20px;">
                    
                </div>
                
            </div>
        </div>



<!--- mid nav -=---->
<!---- middle navigator starts here ---->   
            <div class="navbar navbar-inverse " style=" border: 1px solid #428bca;"> 
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapsebottom">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse navHeaderCollapsebottom">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="#" title="Home">HOME</a></li>
                        <li>
                            <a href="#showElectionStatisticResult" data-toggle="modal" class="tocapital"  >
                                <div class="setcolor">ELECTION STATISTICS</div>
                            </a>
                        </li>
                        <li>
                            <a href="#showContactUsForm" data-toggle="modal">
                                <div class="setcolor">CONTACT US</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

<!--- middle navigator ends here ---->
<!--- end of mid nav ---->
<?php if($this->session->userdata('costumer_message_sent')!='') { ?>
<div class="container-fluid">
    <div class="alert alert-success">
        <?php echo $this->session->userdata('costumer_message_sent'); ?>
    </div>
</div>
<?php } ?>
        
   
<div class="container-fluid" style="margin-bottom:100px;">
<div class="row">
<div class="col-sm-7">  
    
    <div class="well">
<div id="myCarousel" class="carousel slide">
                     <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
               	          <li data-target="#myCarousel" data-slide-to="3"></li>
		          <li data-target="#myCarousel" data-slide-to="4"></li>
			  <li data-target="#myCarousel" data-slide-to="5"></li>
                     </ol>
                     <div class="carousel-inner">
                           <div class="item active">
                                <img src="img/slide/image1.jpg" width="100%" alt="Image1" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h1 class="imgCaption">Voting is now made easier</h1>
                                        
                                    </div>
                           </div>
                           <div class="item">
                                <img src="img/slide/image2.jpg" width="100%"  alt="Image2" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h1 class="imgCaption">Voting is now made simple</h1>
                                    </div>                
                           </div>
                           <div class="item">
                                <img src="img/slide/image3.jpg" width="100%" alt="Image3" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h1 class="imgCaption">Easy as 1 , 2 , 3</h1>
                                    </div> 
                           </div>
                           <div class="item">
                                <img src="img/slide/image4.jpg" width="100%" alt="Image3" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h1 class="imgCaption">1. Register</h1>
                                    </div> 
                           </div>
                           <div class="item">
                                <img src="img/slide/image5.jpg" width="100%" alt="Image3" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h1 class="imgCaption">2. Vote</h1>
                                    </div> 
                           </div>
                           <div class="item">
                                <img src="img/slide/image6.jpg" width="100%" alt="Image3" class="img-responsive">
                                     <div class="carousel-caption">
                                          <h1 class="imgCaption">3. Result</h1>
                                    </div> 
                           </div>
                    </div>
            
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                         <span class="icon-prev"></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                         <span class="icon-next"></span>
                    </a>
            
            </div>
        </div>
    <div class="well">
        The online voting system is a web-base system. Where you can vote anytime and anywhere during the agreed election date as long as there are also computer and Internet connection.
              Online Voting System is a Web-Based System where voting is made easier and more reliable. 
    </div>
    </div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-heading">Videos</div>
            <div class="panel-body">
                <div class="well">
                    <a href="www.youtube.com/OV-HOWTOREGISTER" target="_blank">
                    <img src="img/video/register1.png" width="100%" alt="Image1" class="img-responsive">
                    </a>
                </div>
                <div class="well">
                    <a href="www.youtube.com/OV-HOWTOREGISTER" target="_blank">
                    <img src="img/video/vote1.png" width="100%" alt="Image1" class="img-responsive">
                    </a>
                </div>
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
    </div>
</div>
</div>
<!---  footer starts here----->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 footer-color">
                <h3><i class="fa fa-truck"></i> Services </h3>
                Customize Election for
                <ul>
                    <li> Offices </li>
                    <li> Companies </li>
                    <li> Universities / Institutions / Schools</li>
                </ul>
            </div>
            <div class="col-sm-4 footer-color">
                <h3><i class="fa fa-user"></i> Developers</h3>
                You can also send message to our dynamic developers and administrator.
                Like us in Facebook and follow us on Twitter and Instagram. Subscribe more videos about
                in our Apps in Youtube.
            </div>
            <div class="col-sm-4 footer-color">
                <h3><i class="fa fa-phone-square"></i> Contact us</h3>
                Email : onlinevoting@gmail.com
                <br>
                Tel # : 0155 - 242
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 0155 - 655
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 0155 - 656
            </div>
        </div>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="container">
        <p class="navbar-text">Site Built By AS</p>
        <a href="#" class="navbar-btn btn-primary btn pull-right">Like us on Facebook</a>
    </div>
</div>
<!---  footer ends here ------>   

<!--- unset all session for this page starts here   ---->
<?php 
$newdata    =   array(
    'SCHOOL_ID_NOT_FOUND'=>'',
    'Member_Already_Registered'=>'',
    'wrong_credentials' =>  '',
    'registeredCode'=>'',
    'costumer_message_sent'=>'',
    'registeredName'=>'');
    $this->session->unset_userdata($newdata);
?>
<!--- unset all session for this page ends here --->
