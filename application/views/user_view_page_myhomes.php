<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">&nbsp;<br/>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12 page-header">
            <div class="col-lg-8">
                <h3>My Homes</h3>
            </div>
            <div class="col-lg-4">
                <form style="margin-top: 33px;text-align: right;" action="<?php echo base_url(); ?>user_page_myhome/add_home_photos" method="post" enctype="multipart/form-data">
                <?php if($counthome < 4):?>
                <a href="<?php echo base_url(); ?>user_page_myhome/add_home"><input type="button" name="upload" value="Add home" style="display:inline-block;vertical-align:top;width:78px;line-height:15px;"/>
                </a>
                <?php endif; ?>
                </form>
            </div>
            </div>
            <?php if(count($more_homes) > 1):  
            $ctr = 0;
            foreach($more_homes as $outdis): 
            $ctr++; ?>
            <div class="col-sm-3 col-xs-6 missin">
                
                    <img class="img-responsive portfolio-item max_photos" src="<?php echo base_url().'uploads/'.$outdis->photos ?>" alt="">
                
                <a href="<?php echo base_url().'user_page_myhome/myhome/'.$outdis->homeID ?>" class="max_photos agay">
                    <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded"><p>View</p></div>
                        <div class="project-name">
                            <p><i class="fa fa-search"></i></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; 
                if($ctr != 4):
                    $newloop = 4 - $ctr;
                    $x = 1;
            while ( $x <= $newloop) { ?>
                <div class="col-sm-3 col-xs-6">
                 <img class="img-responsive portfolio-item max_photos" src="<?php echo base_url();?>assets/img/defualt_home.png" alt="" style="max-width: 200px;">
                </div>
            <?php $x++; }
                endif;
            else: ?>
                <div class="col-lg-12">
                <center><h4><i class="fa fa-camera-retro"></i> Upload More Photos..</h4></center>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->