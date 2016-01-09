<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            &nbsp;<br/>
           &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>
        </div>
        <div class="row">
            <div class="col-lg-3 topresult">
                    <a href="<?php echo base_url();?>user_page_match_home">Matched Home</a> |
                    <a href="<?php echo base_url();?>user_page_swap_home">Swapped Homes</a> |
            </div>
            <div class="col-lg-9 ">
                <form class="form-group" action="<?php echo base_url() ?>user_page_home/search" method = "get">
                <div class="col-lg-10">
                    <input type="text" value="<?php echo isset($_GET['q']) ? $_GET['q'] : '' ?>" name="q" class="form-control" style="margin-bottom: 5px;">
                </div>
                <div class="col-lg-2">
                    <input type="submit" name="search" class="btn btn-primary" id="" value="Search">
                </div>
                </form>
            </div>
        </div>
        <div class="row">
            <hr/>
        </div>
        <!-- /.row -->
		<?php
        if(count($match_homes) > 0):
		foreach($match_homes as $row):
            
            
            if(count($row) > 0){
                if($row->ownerID == $user_info->subID){
                continue;
                }
		?>
        <!-- Details One -->
        <div class="row">
            <div class="col-md-6 fakya">
                <img style="max-width:435px;max-height:350px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $row->photos; ?>" alt="">
                <div class="photo_hover" style="max-width:435px;max-height:350px">
                <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                    Home</div>
                    <a class="project-name" href="<?php echo base_url();?>index.php/user_page_viewhome?homeId=<?php echo $row->ownerID; ?>&no=<?php echo $row->homeID; ?>"><p><i class="fa fa-search"></i></p>
                    </a>
                </div>
                </div>
            </div>
            <div class="col-md-5">
                <!--<h4>Subheading</h4>-->
                <div>
                <?php if($row->profilepic =='0.jpg'): ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>assets/img/0.png" alt="">
                <?php else: ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $row->profilepic; ?>" alt="">
                <?php endif;?>
                    <p style="color:#fff;display:block; width:200px;display: inline-block;"><b><?php echo $row->fname.' '.$row->lname; ?></b></p>
                </div>
                <ul style="list-style:none">  
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Location: </b> <?php echo $row->cityName; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Home Post Type : </b> <?php echo $row->homePostType; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Area Type: </b> <?php echo $row->description; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Max Guest: </b> <?php echo $row->maxGuests	; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Swap Status: </b> <?php echo $row->swapStatus; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Deal Negotiation: </b> <?php echo $row->dealNegotiation; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Cancelled Negotiation: </b> <?php echo $row->cancelledNegotiation; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Amenities: </b> <?php echo $row->amenities; ?></li>
                </ul>
                    <br/>
                   <!--  <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                    </div> -->
                <?php if($row->ownerID == $user_info->subID): ?>
                <a class="btn btn-primary" href="<?php echo base_url();?>index.php/user_page_myhome">My Home <span class="fa fa-chevron-right"></span></a>
                <?php else: ?>
                <a class="btn btn-primary" href="<?php echo base_url();?>index.php/user_page_viewhome?homeId=<?php echo $row->ownerID; ?>&no=<?php echo $row->homeID; ?>">View More <span class="fa fa-chevron-right"></span></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.row -->
		<hr>
        <?php }
        endforeach; ?>
        <div id="pagination"><?php echo $links; ?></div> 
        <?php
        else:
            echo '<center><p style="font-size:18px">No match home...</p></center>';
        endif;
        ?>
        

    </div>
    <!-- /.container -->
