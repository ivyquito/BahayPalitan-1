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
            <div class="col-lg-3">
                <ul class="list-inline">
                   <li> <a style="color:#E8EF42;" href="<?php echo base_url();?>user_page_match_home">Matched Homes</a></li>

                   <li> <a style="color:#E8EF42;" href="<?php echo base_url();?>user_page_swap_home">Swapped Homes</a></li> 
                </ul>
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
        

        <div class="row">
        <!-- /.row -->
		<?php 
        if( !empty($allhome) && sizeof($allhome) > 0 ):
		foreach($allhome as $row):
		?>
        <!-- Details One -->

        
          <div class="col-sm-6 col-md-4">
            <a href="javascript:;" data-toggle="modal" data-target="#modal-<?= $row->homeID; ?>" class="thumbnail">
              <img style="height:200px; width: 100%;" src="<?php echo base_url();?>uploads/<?php echo $row->photos; ?>" alt="...">
            </a>
          </div>


          <div id="modal-<?= $row->homeID; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"> View Home</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-7">
                            <img style="width:100%;height:400px"  src="<?php echo base_url();?>uploads/<?php echo $row->photos; ?>" alt="">
                          
                          </div>
                          <div class="col-md-5">
                   
                             <div>
                             <?php if($row->profilepic =='0.jpg'): ?>
                                 <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>assets/img/0.png" alt="">
                             <?php else: ?>
                                 <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $row->profilepic; ?>" alt="">
                             <?php endif;?>
                                 <p style="color:#000;display:block; width:200px;display: inline-block;"><b><?php echo $row->fname.' '.$row->lname; ?></b></p>
                             </div>
                             <ul style="list-style:none"> 
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Location: </b> <?php echo $row->cityName; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Home Post Type : </b> <?php echo $row->homePostType; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Area Type: </b> <?php echo $row->description; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Max Guest: </b> <?php echo $row->maxGuests  ; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Swap Status: </b> <?php echo $row->swapStatus; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Deal Negotiation: </b> <?php echo $row->dealNegotiation; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Cancelled Negotiation: </b> <?php echo $row->cancelledNegotiation; ?></li>
                                 <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Amenities: </b> <?php echo $row->amenities; ?></li>
                             </ul>
                                 
                             <?php if($row->ownerID == $user_info->subID): ?>
                             <a class="btn btn-primary" href="<?php echo base_url();?>index.php/user_page_myhome">My Home <span class="fa fa-chevron-right"></span></a>
                             <?php else: ?>
                             <a class="btn btn-primary" href="<?php echo base_url();?>index.php/userProfile?id=<?php echo $row->ownerID; ?>">View More <span class="fa fa-chevron-right"></span></a>
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
                       
              </div>
            </div>
          </div>
       


         <!--
        <div class="row">
            <div class="col-md-6 fakya">
                
                    <img style="max-width:435px;max-height:350px" class="img-responsive" src="<?php //echo base_url();?>uploads/<?php //echo $row->photos; ?>" alt="">
                <div class="photo_hover" style="max-width:435px;max-height:350px">
                    <div class="portfolio-box-caption-content">
                        <div class="project-category text-faded">
                        Home</div>
                        <a class="project-name" href="<?php //echo base_url();?>index.php/user_page_viewhome?homeId=<?php //echo $row->ownerID; ?>&no=<?php //echo $row->homeID; ?>"><p><i class="fa fa-search"></i></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
               <h4>Subheading</h4>
                <div>
                <?php //if($row->profilepic =='0.jpg'): ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php //echo base_url();?>assets/img/0.png" alt="">
                <?php //else: ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php //echo base_url();?>uploads/<?php //echo $row->profilepic; ?>" alt="">
                <?php //endif;?>
                    <p style="color:#fff;display:block; width:200px;display: inline-block;"><b><?php //echo $row->fname.' '.$row->lname; ?></b></p>
                </div>
                <ul style="list-style:none"> 
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Location: </b> <?php //echo $row->cityName; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Home Post Type : </b> <?php //echo $row->homePostType; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Area Type: </b> <?php //echo $row->description; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Max Guest: </b> <?php //echo $row->maxGuests	; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Swap Status: </b> <?php //echo $row->swapStatus; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Deal Negotiation: </b> <?php //echo $row->dealNegotiation; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Cancelled Negotiation: </b> <?php //echo $row->cancelledNegotiation; ?></li>
                    <li><i class="fa fa-thumb-tack"></i>&nbsp;<b>Amenities: </b> <?php //echo $row->amenities; ?></li>
                </ul>
                    
                <?php //if($row->ownerID == $user_info->subID): ?>
                <a class="btn btn-primary" href="<?php //echo base_url();?>index.php/user_page_myhome">My Home <span class="fa fa-chevron-right"></span></a>
                <?php //else: ?>
                <a class="btn btn-primary" href="<?php //echo base_url();?>index.php/user_page_viewhome?homeId=<?php //echo $row->ownerID; ?>&no=<?php //echo $row->homeID; ?>">View More <span class="fa fa-chevron-right"></span></a>
                <?php //endif; ?>
            </div>
        </div> 
        <!-- /.row
		<hr> -->
		<?php endforeach;  ?>

        </div> <!-- end of new added div row -->


        <div id="pagination"><?php echo $links; ?></div>
        <?php else: ?>
            <div class="row" style="padding: 10%;">
                <center><b>Sory, No Data Found</b></center>
            </div>
        <?php endif; ?> 
    </div>
    <!-- /.container -->

<!-- Show home modal -->

<div id="home-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> View Home</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    4 here
                </div>
                <div class="col-md-8">
                    8 here
                </div>
            </div>
        </div>
             
    </div>
  </div>
</div>

