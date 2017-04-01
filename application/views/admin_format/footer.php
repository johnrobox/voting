
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js"></script>
        <script src="<?php echo base_url();?>js/main.js"></script>
        <?php 
        $number =   10;
        $tooltipCounter =   1;
        for($tooltipCounter=1;$tooltipCounter <= $number;$tooltipCounter++){
        echo "<script>$('#get".$tooltipCounter."').tooltip('hide')</script>";
        }
        ?>
        <script>$('.popover-dismisss').popover({
  trigger: 'focus'
})</script>
        
        <script>
  $(function () {
    $('#myTab a:active').tab('show')
  })
</script>
        
    </body>
</html>