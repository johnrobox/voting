<!DOCTYPE html>
<html>
    <head>
        <title> Online Voting </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"> 
    </head>
    <body class="bodymargin">
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand" >Online Voting System</a>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social Media <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Google+</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </li>
                        <li><a href="#">About</a></li>
                        <li><a href="#contact" data-toggle="modal">Contact</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
<!---  header ends here ------>
            <?php 
            /* sanitize with the value impoter here */
            $name   =   $_POST['contactName'];
            $email  =   $_POST['contactEmail'];
            $msg    =   $_POST['contactMessage'];
            ?>
<!---  content starts here ---->
<div class="container">
    <div class="jumbotron">
        <h1> <?php echo $name;?> </h1>
        <h3> <?php echo $email;?></h3>
        <p> <?php echo $msg;?></p>
        <a class="btn btn-default">Watch now!</a>
        <a class="btn btn-info">Twitt it!</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3><a href="#">$500 Gamming PC Build</a></h3>
            <p>All cases in which the constitutionality or validity of any treaty, international, order, instruction, ordinance, or regulation is in question.</p>
            <a href="#" class="btn btn-default">Read More</a>
        </div>
        <div class="col-md-3">
            <h3><a href="#">$500 Gamming PC Build</a></h3>
            <p>All cases in which the constitutionality or validity of any treaty, international, order, instruction, ordinance, or regulation is in question.</p>
            <a href="#" class="btn btn-default">Read More</a>
        </div>
        <div class="col-md-3">
            <h3><a href="#">$500 Gamming PC Build</a></h3>
            <p>All cases in which the constitutionality or validity of any treaty, international, order, instruction, ordinance, or regulation is in question.</p>
            <a href="#" class="btn btn-default">Read More</a>
        </div>
        <div class="col-md-3">
            <h3><a href="#">$500 Gamming PC Build</a></h3>
            <p>All cases in which the constitutionality or validity of any treaty, international, order, instruction, ordinance, or regulation is in question.</p>
            <a href="#" class="btn btn-default">Read More</a>
        </div>
    </div>
</div>
<!---  content ends here ---->

<!---  footer starts here----->
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="navbar-text">Site Built By John Robert Jerodiaz</p>
        <a href="#" class="navbar-btn btn-danger btn pull-right">Subscribe on Youtube</a>
    </div>
</div>
<!---  footer ends here ------>        
        

<div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact Tech Site</h4>
            </div>
            <div class="modal-body">
                <p>Cases are matters heard by a division shall be decided or resolved with the issues in the case and vote3d thereon, and in no case without the concurrence of at least three of such members.</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal">Close</a>
                <a class="btn btn-primary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
    </body>
</html>
