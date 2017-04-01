<!DOCTYPE html>
<html>
    <head>
        <title> Online Voting </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    </head>
    <body>
        
        
<!--- this is for BREADCRUMB tutorial ----->
        <div class="container">
            <ol class="breadcrumb">
                <li> <a href="#">Coders Guide</a></li>
                <li> <a href="#">Our Tutorial</a></li>
                <li> <a href="#">Web developer</a></li>
                <li class="active">Bootsrap</li>
            </ol>
        </div>
 <!--- the BREADCRUMB tutorial ends here ----->
 
 

 <!--- the ALERT BOXES tutorial starts here----> 
        <div class="container">
            <div class="alert alert-success">Hello Programming</div>
        </div>
        <div class="container">
            <div class="alert alert-info">Hello Programming</div>
        </div>
        <div class="container">
            <div class="alert alert-warning">Hello Programming </div>
        </div>
        <div class="container">
            <button type="button" class="close"  data-dismiss="alert">&times;</button>
            <div class="alert alert-danger alert-dismissable">Hello Programming.. This is John Robert Pahayahay Jerodiaz student of Salazar Colleges of Science and Institute of Technology. How are you Bootsrap?</div>
        </div>
 <!--- the ALERT BOXES tutorial ends here ----->
 
 
 <!--- the INPUT GROUPS tutorial starts here ---->
<div class="row">
      <div class="container">
          <div class="col-md-4">
               <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" placeholder="Enter price"/>
                </div>
          </div>
          <div class="col-md-4">
                <div class="input-group"">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" placeholder="Enter price"/>
                    <span class="input-group-addon">Per Unit</span>
                </div>
          </div>
          <div class="col-md-4">
                <div class="input-group"">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" placeholder="Enter some text here"/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary">Search</button>
                    </span>
                </div>
          </div>
     </div>
 </div>
 
 

        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
    </body>
</html>
