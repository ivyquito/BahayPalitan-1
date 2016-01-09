<?php
	if($this->session->userdata('user_info')!=NULL){
		$nav_var = $this->session->userdata('user_info');
		$data = array('to_user'=>$nav_var->subID,'nstatus'=>1);
		$out = $this->common->getall('notification',$data);
		if(count($out)>0){
			$notie ='('.count($out).')';
		}else{
			$notie='';
		}
	}
?>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="bahay" class="navbar-brand page-scroll" href="<?php echo base_url(); ?>index.php">
                <img src="<?php echo base_url();?>assets/img/banner_logo2.png" alt="" class="imglogo" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php 
                if($this->session->userdata('user_info')!=''):
                ?>
                <ul class="nav navbar-nav navbar-right">
                                
                    <li>
                      <a class="page-scroll" href="<?php echo base_url();?>user_page_home"><span class="fa fa-home"></span> Home</a>
                    </li>
		    <li>
                      <a class="page-scroll" href="<?php echo base_url() ?>user_page_notification"><span class="fa fa-map-marker"></span> Notifications <?php echo $notie; ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="<?php echo base_url() ?>user_page_inbox"><span class="fa fa-envelope"></span> Inbox <span style="color:#f05f40"></span></a>
                    </li>
                    
                    <li class="dropdown " style="color:#000;">
                      <a href="#" class="page-scroll dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" ><span class="fa fa-user"></span>&nbsp;<?php echo $user_info->fname.' '.$user_info->lname; ?></a>
                        <ul class="dropdown-menu" role="menu">
                          <li class="divider"></li>
                          <li><a href="<?php echo base_url(); ?>user_page_myprofile"><i class="fa fa-user"></i> MyProfile</a></li><br>
                          <li><a href="<?php echo base_url(); ?>user_page_myhome"><i class="fa fa-home"></i> MyHomes</a></li><br>
                          <li><a href="<?php echo base_url(); ?>user_page_travelplan"><i class="fa fa-road"></i> MyTravelPlan</a></li><br>
                          <li><a href="<?php echo base_url(); ?>user_page_subscription"><i class="fa fa-check"></i> MySubscription</a></li><br>
                          <li><a href="<?php echo base_url(); ?>logout"><i class="fa  fa-sign-out"> Logout</i></a></li>

                          
                        </ul>
                    </li>
                </ul>
              <?php else: ?>
                <ul class="nav navbar-nav navbar-right">
                    
                                        <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
					<li>
							<a href="#" class="page-scroll dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" >Member</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="<?php echo base_url(); ?>user_login">Sign In</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>user_signup">Sign Up</a>
							</li>
						</ul>
					</li>
                 </ul>
              <?php endif; ?>

            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container-fluid -->
    </nav>
	
	<script>
		
	</script>