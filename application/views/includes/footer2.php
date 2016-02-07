<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
          </div>
          <strong>Copyright © 2014-2015 Bahay Palitan.</strong> All rights reserved.
        </div><!-- /.container -->
</footer>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.fittext.js"></script>
    <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/js/creative.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validationEngine.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validationEngine-en.js"></script>
    
    <?php 
    if($this->session->flashdata('error')!=''):?>
    <script>
    $(document).ready(function(){
        alert("<?php echo $this->session->flashdata('error') ?>");
    });
    </script>
    <?php endif; ?>
    <?php 
    if($this->session->flashdata('success')!=''):?>
    <script>
    $(document).ready(function(){
        alert("<?php echo $this->session->flashdata('success') ?>");
    });
    </script>
    <?php endif; ?>


    

    <!-- added scripts -->
    <script type="text/javascript">
        $(document).ready(function(){

            $('.show-home-modal').click(function(e){
                e.preventDefault();
                $('#home-modal').modal('show');
           

            });
        });
    </script>
</body>

</html>
