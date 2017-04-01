<!DOCTYPE html>
<html>
    <head>
        <title> Online Voting </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" >
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" > 
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

<!---  content starts here ---->
<div class="container ">
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h3> Whatever you want <small>posted on july 26, 2014</small></h3>
                    </div>
                    <img class="featuredImg" src="img/face.png" width="100%">
                    <p>No petition for review or motion for reconsideration of a decision of the court shall be refused due course or denied without stating the legal basis therefor.
                     Despite the expiration of the applicable mandatory period, the court, without prejudice to such responsibility as may have been incurred in consequence thereof, shall decide or resolve the case or matter submitted thereto for determination, without further delay.</p>
                    <h4>Heading</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Lurem Epsum</h4>
                    <p class="list-group-item-text"> The Supreme court shall, widthin thirty days from the opening of each regular session of the congress, submit to the president and the congress an annual report on the operations and activities of the dudiciary</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Lurem Epsum</h4>
                    <p class="list-group-item-text"> The Supreme court shall, widthin thirty days from the opening of each regular session of the congress, submit to the president and the congress an annual report on the operations and activities of the dudiciary</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Lurem Epsum</h4>
                    <p class="list-group-item-text"> The Supreme court shall, widthin thirty days from the opening of each regular session of the congress, submit to the president and the congress an annual report on the operations and activities of the dudiciary</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Lurem Epsum</h4>
                    <p class="list-group-item-text"> The Supreme court shall, widthin thirty days from the opening of each regular session of the congress, submit to the president and the congress an annual report on the operations and activities of the dudiciary</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Lurem Epsum</h4>
                    <p class="list-group-item-text"> The Supreme court shall, widthin thirty days from the opening of each regular session of the congress, submit to the president and the congress an annual report on the operations and activities of the dudiciary</p>
                </a>
            </div>
        </div>
    </div>
</div>
<!---  content ends here ---->

<!---  footer starts here----->
<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="container">
        <p class="navbar-text">Site Built By John Robert Jerodiaz</p>
        <a href="#" class="navbar-btn btn-danger btn pull-right">Subscribe on Youtube</a>
    </div>
</div>
<!---  footer ends here ------>        
        

<div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="third">
                <div class="modal-header">
                     <h4>Contact Tech Site</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="contact-name" class="col-md-2 control-lable">Name : </label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" name="contactName" id="contact-name" placeholder="Enter your name"/>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-email" class="col-md-2 control-lable">Email : </label>
                        <div class="col-md-10">
                          <input type="email" class="form-control" name="contactEmail" id="contact-email" placeholder="you@example.com"/>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-message" class="col-md-2 control-lable">Message : </label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="8" name="contactMessage" id="contact-message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <a class="btn btn-default" data-dismiss="modal">Close</a>
                     <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
    </body>
</html>
