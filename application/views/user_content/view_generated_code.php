
<div class="container">
    <div class = "row">
        <div class = "col-sm-12"  style = "margin-top: 5%;">

            <div class = "col-sm-5">
                <img class = "img-responsive" src = "img/favicon/3.png" style = "position: relative;">
            </div>

            <div class="col-sm-7">
                <div class = "col-sm-12">
                    <div class="alert alert-warning alert-dismissable">
                        <div class="row"><h4>
                            <div class="col-sm-2"><b>Note : </b></div>
                            <div class="col-sm-10">
                                This is a unique passcode intended for
                                you <b><?php echo $this->session->userdata('registeredName');?></b> only. <b>Please keep it private.</b>
                            </div></h4>
                        </div>
                    </div>
                </div>
                <div class = "col-sm-12">
                    <div class="callout callout-info">
                            <h3 class = "text-center">Passcode Generated
                                <div class = "alert alert-success text-center"><?php echo $this->session->userdata('registeredCode');?></div></h3><br>
                                <a href="<?php echo base_url(); ?>" class="btn btn-info pull-right">HOME</a>
                    </div>
                </div>
            </div>

            <div class = "col-sm-7">
            <p class = "text-center" style = "color: #eee;"> Online Voting System <br/> Copyright &copy; 2015 </p>
            </div>
            
        </div>
    </div>



       


        
</div>
