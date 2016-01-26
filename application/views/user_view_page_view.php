<link rel="stylesheet" href="<?php echo base_url();?>assets/css/star-rating.css" type="text/css">
<script src="<?php echo base_url();?>assets/js/star-rating.js"></script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <br/>
                <br/>
                <br/>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row nacorner">

            <div class="col-md-4">
                <img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $viewhome->photos; ?>" alt="">
            </div>

            <div class="col-md-3">
                <div>
                <?php if($viewhome->profilepic =='0.jpg'): ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>assets/img/0.png" alt="">
                <?php else: ?>
                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $viewhome->profilepic; ?>" alt="">
                <?php endif;?>
                    <p style="color:#fff;display:block; width:200px;display: inline-block;"><b><?php echo $viewhome->fname.' '.$viewhome->lname; ?></b></p>
                </div>
                <h3>Details</h3>

                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3>Short Description</h3>-->
                <input type="hidden" id="ownerID" value="<?php echo $viewhome->ownerID ?>" />
                <input type="hidden" id="homeID" value="<?php echo $viewhome->homeID ?>" />
                <ul>
                     <li><b>Location: </b> <?php echo $viewhome->cityName; ?></li>
                     <li><b>Home Post Type: </b> <?php echo $viewhome->homePostType; ?></li>
                    <li><b>Area Type: </b> <?php echo $viewhome->description; ?></li>
                    <li><b>Max Guest: </b> <?php echo $viewhome->maxGuests	; ?></li>
                    <li><b>Swap Status: </b> <?php echo $viewhome->swapStatus; ?></li>
                    <li><b>Deal Negotiation: </b> <?php echo $viewhome->dealNegotiation; ?></li>
                    <li><b>Cancelled Negotiation: </b> <?php echo $viewhome->cancelledNegotiation; ?></li>
                    <li><b>Amenities: </b> <?php echo $viewhome->amenities; ?></li>
                </ul>
                <b>Comment</b>
                <textarea id="commentarea" class="form-control"></textarea>
                <br>
                <input type="button" value="Submit" onclick="submitComment();" class="btn btn-sm btn-default" />
            </div>
            <div class="col-md-4">
            <!--<br/>
            <br/>
            <br/>
            <br/>
            <br/> -->
                    <div class="ratings">
                                <?php 
                                if($rate !==''):
                                $count = 0;
                                foreach ($rate as $key => $value): $count++?>
                                <div class="radio">
                                    <label>
                                        <input id="rating-star-<?php echo $count; ?>" type="number" value="<?php echo $value ?>" class="rating rating-count" data-size="xs" min=0 max=5 step=1 />
                                    </label>
                                    <input type="text" style="display: none;" id="rateDescription-<?php echo $count; ?>" value="<?php echo ucfirst($key);  ?>">
                                    <?php echo ucfirst($key) ?>

                                </div>
<!--                                 <p class="pull-right"><?php echo ucfirst($key) ?></p>
                                <p>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 1 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 2 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 3 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 4 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 5 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 6 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 7 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 8 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 9 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                </p>
                                <?php endforeach; ?>
                                <?php else:
                                $rate = array(
                                        'safety'=> 0,
                                        'comfort'=> 0,
                                        'cleanliness'=> 0,
                                        'environment'=> 0,
                                        'accessibility'=> 0,
                                        'hospitality'=> 0,
                                        'honesty'=> 0,
                                        'reliability'=> 0,
                                        'overallimpression'=> 0
                                        );
                                $count = 0;
                                foreach ($rate as $key => $value): $count++;?>
                                <!-- <p class="pull-right"><?php echo ucfirst($key) ?></p> -->
                                <!-- <p> -->
                                <div class="radio">
                                    <label>
                                        <input id="rating-star-<?php echo $count; ?>" type="number" class="rating rating-count" data-size="xs" min=0 max=5 step=1 />
                                    </label>
                                    <input type="text" style="display: none;" id="rateDescription-<?php echo $count; ?>" value="<?php echo ucfirst($key);  ?>">
                                    <?php echo ucfirst($key) ?>

                                </div>
                                    
<!--                                     <span class="glyphicon glyphicon-star<?php echo ($value >= 2 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 3 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 4 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 5 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 6 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 7 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 8 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 9 && $total != 0 ? '':'-empty'); ?>"></span>
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                <!-- </p> -->

                                <?php endforeach; ?>
                                <?php endif; ?>

                    </div>
                    
            </div>

            <div class="form-group col-lg-12">
                        <br/>
                        <br/>
                        <div class="form-group col-lg-2">
                                <form>
                                <a class="btn btn-primary" href="<?php echo base_url();?>index.php/user_page_message?homeId=<?php echo $viewhome->ownerID; ?>&no=<?php echo $viewhome->homeID; ?>">Message the Owner</a>
                                </form>
                        </div>
                        <div class="form-group <?php echo ($swapstatus != NULL && $swapstatus =='swapped') ? 'col-lg-5' :'col-lg-2' ?>">
                        <?php if($confirm == true && $swapstatus =='pending'):?>
                        <form action="<?php echo base_url(); ?>user_page_viewhome/confirm" class="form-signin" method="post" accept-charset="utf-8">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="hidden" name ="myhomeswap" value="<?php echo $myhomeswap; ?>"/>
                        <input type="submit" name ="confirm_swap" class="btn btn-success" value="Confirm Home Swap" style="width: 183px;" />
                        </form>
                        <?php elseif($swapstatus =='done-pending' && $check_swap == $user_info->subID):?>
                        <form action="<?php echo base_url(); ?>user_page_viewhome/done" class="form-signin" method="post" accept-charset="utf-8">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="hidden" name ="myhomeswap" value="<?php echo $myhomeswap; ?>"/>
                        <input type="submit" name ="done" class="btn btn-success" value="Confirm done Swap" style="width: 183px;" />
                        </form>
                        <?php elseif($swapstatus != NULL && $swapstatus =='swapped'):?>
                        <div style="width: 348px;text-align:center;color:#E8EF42; line-height: 30px;">
                        <div class="col-lg-6">Currently Swapped </div>
                        <div class="col-lg-6">
                        <form action="<?php echo base_url(); ?>user_page_viewhome/done" class="form-signin" method="post" accept-charset="utf-8">
                            <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                            <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                            <input type="hidden" name ="myhomeswap" value="<?php echo $myhomeswap; ?>"/>
                            <input type="submit" name ="done" class="btn btn-info" value="Done" style="width: 183px;" />
                        </form>
                        </div>
                        </div>   
                        <?php elseif($swapstatus == NULL && $myswapstatus == true): ?>
                        <form action="<?php echo base_url(); ?>user_page_viewhome/swap" class="form-signin" method="post" accept-charset="utf-8">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="submit" name ="swap" class="btn btn-info" value="Swap Home" style="width: 183px;" />
                        </form>
                         <?php elseif($swapstatus == NULL || $swapstatus == 'done' && $myswapstatus == true): ?>
                        <form action="<?php echo base_url(); ?>user_page_viewhome/swap" class="form-signin" method="post" accept-charset="utf-8">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="submit" name="swap" class="btn btn-info" value="Reswap Home" style="width: 183px;" />
                        </form>
                        <?php else: ?>
                            <div style="color:#fff">
                            <?php 
                            if($swapstatus == 'done-pending'){
                                echo 'Waiting for home owner\'s to confirm done swapping.';
                            }elseif($swapstatus == 'pending'){
                                echo 'Waiting for home owner\'s to confirm swapping.';
                            }elseif($currently_swap == true){
                                echo 'You are currnetly swap with other home...';
                            }elseif($myswapstatus != true && $currently_swap == false){
                                echo 'Please add your home to swap...';
                            }else{
                                echo 'Pending';
                            }
                            ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        <?php if($confirm == true && $swapstatus =='pending'):?>
                        <div class="form-group col-lg-2">
                        <form action="<?php echo base_url(); ?>user_page_viewhome/cancel" class="form-signin" method="post" accept-charset="utf-8">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="hidden" name ="myhomeswap" value="<?php echo $myhomeswap; ?>"/>
                        <input type="submit" name="cancel_swap" class="btn btn-defualt" value="Cancel Home Swap" style="width: 183px;" />
                        </form>
                        </div>
                        <?php endif; ?>
                        <?php if(sizeof($reported) <= 0): ?>
                         <div class="form-group col-lg-2">
                        <form action="<?php echo base_url(); ?>user_page_viewhome/report" class="form-signin" method="post" accept-charset="utf-8" id="report">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="submit" name="report" class="btn btn-danger" value="Report Abuse" style="width: 183px;" />
                        </form>
                        </div>
                        <?php else: ?>
                         <div class="form-group col-lg-2">
                         <p class="btn btn-default" style="width: 183px;">Reported Abuse</p>
                        </form>
                         </div>
                        <?php endif;?>

            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="page-header">More Photos<br>
        </h3>
        <div class="row">
            <?php if(count($more_photos) > 0):  
            $ctr = 0;
            foreach($more_photos as $outdis): 
            $ctr++; ?>
            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?php echo base_url().'/uploads/'.$outdis->image ?>" alt="">
                </a>
            </div>
            <?php endforeach; 
                if($ctr != 4):
                    $newloop = 4 - $ctr;
                    $x = 1;
            while ( $x <= $newloop) { ?>
                <div class="col-sm-3 col-xs-6">
                 <img class="img-responsive portfolio-item" src="<?php echo base_url();?>/assets/img/defualt_home.png" alt="" style="max-width: 200px;">
                </div>
            <?php $x++; }
                endif;
            else: ?>
                <div class="col-lg-12">
                <center><h4><i class="fa fa-camera-retro"></i> No More Photos Uploaded..</h4></center>
                </div>
            <?php endif; ?>

        </div>
        <!-- /.row -->
        <h3 class="page-header">Rates & Reviews<br>
        </h3>
        <!--commments--> <!--style="border-bottom:1px solid #888888" -->
        <style>
         #reets label{min-width: 150px;}
         .pey{display:inline-block;vertical-align:top;width:140px;margin-bottom:0;}
        .str{color:#E8EF42;}
        .rate{margin-left:40px;color:#E8EF42;}
        #reets a{color:#E8EF42;}
        .hold{cursor: default;}
         </style>
        
        <div class="col-md-12">
            <?php if(count($reviews) > 0): ?>
                <?php foreach ($reviews as $value) { ?>
                        <div style="padding:10px" id="reets">
                            <div>
                                <?php if($value->profilepic =='0.jpg'): ?>
                                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>assets/img/0.png" alt="">
                                <?php else: ?>
                                    <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $user_info->profilepic; ?>" alt="">
                                <?php endif;?>
                                    <p style="color:#fff;display:block; width:200px;display: inline-block;"><b><?php echo ucfirst($value->fname).' '.ucfirst($value->lname); ?></b></p>
                            </div>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Safety :</label>
                            <?php
                            $x = 0;
                            while($x < $value->safety){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->safety ?>/5</p>
                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Comfort :</label>
                            <?php
                            $x = 0;
                            while($x < $value->comfort){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->cleanliness ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Cleanliness :</label>
                            <?php
                            $x = 0;
                            while($x < $value->cleanliness){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->cleanliness ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Environment :</label>
                            <?php
                            $x = 0;
                            while($x < $value->environment){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->environment ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Accessibility :</label>
                            <?php
                            $x = 0;
                            while($x < $value->accessibility){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->accessibility ?>/5</p>
                        
                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Hospitality :</label>
                            <?php
                            $x = 0;
                            while($x < $value->hospitality){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->hospitality ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Honesty :</label>
                            <?php
                            $x = 0;
                            while($x < $value->honesty){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->honesty ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Reliability :</label>
                            <?php
                            $x = 0;
                            while($x < $value->reliability){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->reliability ?>/5</p>

                        <div style="display:inline-block;vertical-align:top;width:325px">
                            <label>Over all Impression :</label>
                            <?php
                            $x = 0;
                            while($x < $value->overallimpression){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star"></i></a>';
                             $x++;
                            }
                            while($x < 5){
                             echo '<a href="javascript;" class="hold"><i class="fa  fa-star-o"></i></a>';
                             $x++; 
                            }

                            ?>
                        </div>
                        <p id="rate" class="pey"><?php echo $value->overallimpression ?>/5</p>

                        <div class="form-group">
                            <label>Comment :</label>
                            <div style="max-width: 900px;"><?php echo $value->comment ?></div>
                            </div>
                        </div>
                <?php } ?>
            <?php else:?>
            <div  style="padding:10px" class="col-md-offset-1">
                <center>No Rates & Raviews Found</center>
            </div>
            <?php endif;?>
        </div>
        <!--end commments-->
        <?php if(count($done_reviews) <= 0): ?>
        <?php if($swapstatus != NULL && ($swapstatus =='swapped' || $swapstatus == 'done-pending')):?> <!--comment form-->
        <div class="col-md-12 " style="border:1px solid #888888;padding:10px">
            <h3>Add Your Rate and Review</h3>
            <div>
                    <?php if($user_info->profilepic =='0.jpg'): ?>
                        <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>assets/img/0.png" alt="">
                    <?php else: ?>
                        <img style="display: inline-block;max-width:65px;max-height:55px;border-radius:27px;border:1px solid;" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $user_info->profilepic; ?>" alt="">
                    <?php endif;?>
                        <p style="color:#fff;display:block; width:200px;display: inline-block;"><b><?php echo ucfirst($user_info->fname).' '.ucfirst($user_info->lname); ?></b></p>
            </div>
            <style>
                .star,.star2,.star3,.star4,.star5,
                .star6,.star7,.star8,.star9
                {color:#E8EF42;}
                #rate,#rate2,#rate3,#rate4,#rate5,
                #rate6,#rate7,#rate8,#rate9
                {margin-left:40px;color:#E8EF42;}
                #views label{min-width: 150px;}
                .pey{display:inline-block;vertical-align:top;width:140px;margin-bottom:0;}
            </style>
            <div class="form-group" id="views">
            <div class="col-md-6">
                <h4>Rate</h4>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Safety :</label>
                <a href="javascript;" id="1" class="star"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="2" class="star"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="3" class="star"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="4" class="star"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="5" class="star"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate" class="pey">0/10</p>
                
                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Comfort :</label>
                <a href="javascript;" id="2-1" class="star2"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="2-2" class="star2"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="2-3" class="star2"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="2-4" class="star2"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="2-5" class="star2"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate2" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Cleanliness :</label>
                <a href="javascript;" id="3-1" class="star3"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="3-2" class="star3"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="3-3" class="star3"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="3-4" class="star3"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="3-5" class="star3"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate3" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Environment :</label>
                <a href="javascript;" id="4-1" class="star4"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="4-2" class="star4"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="4-3" class="star4"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="4-4" class="star4"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="4-5" class="star4"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate4" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Accessibility :</label>
                <a href="javascript;" id="5-1" class="star5"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="5-2" class="star5"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="5-3" class="star5"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="5-4" class="star5"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="5-5" class="star5"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate5" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Hospitality :</label>
                <a href="javascript;" id="6-1" class="star6"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="6-2" class="star6"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="6-3" class="star6"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="6-4" class="star6"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="6-5" class="star6"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate6" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Honesty :</label>
                <a href="javascript;" id="7-1" class="star7"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="7-2" class="star7"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="7-3" class="star7"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="7-4" class="star7"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="7-5" class="star7"><i class="fa  fa-star-o"></i></a>

                </div>
                <p id="rate7" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Reliability :</label>
                <a href="javascript;" id="8-1" class="star8"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="8-2" class="star8"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="8-3" class="star8"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="8-4" class="star8"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="8-5" class="star8"><i class="fa  fa-star-o"></i></a>
                </div>
                <p id="rate8" class="pey">0/10</p>

                <div style="display:block;clear:both"></div>
                
                <div style="display:inline-block;vertical-align:top;width:325px">
                <label>Over All Impression :</label>
                <a href="javascript;" id="9-1" class="star9"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="9-2" class="star9"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="9-3" class="star9"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="9-4" class="star9"><i class="fa  fa-star-o"></i></a>
                <a href="javascript;" id="9-5" class="star9"><i class="fa  fa-star-o"></i></a>
                </div>
                <p id="rate9" class="pey">0/10</p>


            </div>
            
            <div class="col-md-6"><!-- sdas -->

            
            <form action="<?php echo base_url(); ?>user_page_viewhome/reviews_home" method="post" class="col-md-offset-1" id="marlon">
                    <div class="form-group">
                        <label>Comment :</label>
                        <textarea class="form-control" rows="6" name="comment" style="max-width: 900px;"></textarea>
                    </div>
                <!-- <div class="col-md-offset-5"> -->
                    <br>
                    <input type="hidden" name="homeId" class="btn btn-primary" value="<?php echo $_GET['homeId']; ?>">
                    <input type="hidden" name="no" class="btn btn-primary" value="<?php echo $_GET['no']; ?>">
                    <input type="hidden" name ="myhomeswap" value="<?php echo $myhomeswap; ?>"/>
                    <input type="hidden" name="safety" class="btn btn-primary"  value="0">
                    <input type="hidden" name="comfort" class="btn btn-primary"  value="0">
                    <input type="hidden" name="cleanliness" class="btn btn-primary"  value="0">
                    <input type="hidden" name="environment" class="btn btn-primary"  value="0">
                    <input type="hidden" name="accessibility" class="btn btn-primary"  value="0">
                    <input type="hidden" name="hospitality" class="btn btn-primary"  value="0">
                    <input type="hidden" name="honesty" class="btn btn-primary"  value="0">
                    <input type="hidden" name="reliability" class="btn btn-primary"  value="0">
                    <input type="hidden" name="overallimpression" class="btn btn-primary"  value="0">
                    <input type="submit" name="post" class="btn btn-primary" id="" value="Post" style="width:200px;margin:0 auto;">
                <!-- </div> -->
            </form>
            </div><!-- sdas -->
            </div>
        </div>
        <?php endif; ?><!-- end comment form-->
        <?php endif; ?>
        <div class="col-md-12">
        <hr/>
        </div>

    </div>
    <!-- /.container -->


    <script>
            function rateStars(count)
            {
                $('#rating-star-'+count).on('rating.change', function() {
                    // alert($('#rating-star-'+count).val()+" star");
                    $.post("<?php echo base_url(); ?>user_page_viewhome/rate_house",
                        {
                            rateValue:          $('#rating-star-'+count).val(),
                            rateDescription:    $("#rateDescription-"+count).val(),
                            ownerID:            $("#ownerID").val(),
                            homeID:             $("#homeID").val()
                        },function(data){

                    });
                });
            }

            function submitComment()
            {
                if($("#commentarea").val() != "")
                {
                    $.post("<?php echo base_url(); ?>user_page_viewhome/submit_comment",
                        {
                            comment:            $("#commentarea").val(),
                            ownerID:            $("#ownerID").val(),
                            homeID:             $("#homeID").val()
                        },function(data){
                        if(data == 1)
                        {
                            alert("Thank you for your feedback.")
                        }
                    });
                }else{  alert("Please fill up the field first before you submit.") }
            }

            $(document).ready(function(){
                $(".clear-rating-active").hide();
                $(".caption").hide();

                var count = $(".rating-count").length;
                for(var i = 1; i <= count; i++)
                {
                    // $('#rating-star-'+count).rating({
                    //       min: 0,
                    //       max: 5,
                    //       step: 1,
                    //       size: 'sm',
                    //       showClear: false
                    //    });
                    rateStars(i);
                }

                $('#report').submit(function(){
                if(confirm("Are you sure you want to report this home?")){
                    return true;
                }else{
                    return false;
                }
                });

                $('.hold').click(function(){
                    return false;
                });
                $('.star').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });

                $('.star2').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star3').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star4').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star5').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star6').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star7').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star8').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });
                $('.star9').click(function(){
                    var id = $(this).attr('id');
                    starry(id);
                    return false;
                });

                $('#marlon').submit(function(){
                   var a = $('input[name="overallimpression"]').val();
                   var b = $('input[name="reliability"]').val();
                   var c = $('input[name="honesty"]').val();
                   var d = $('input[name="hospitality"]').val();
                   var e = $('input[name="accessibility"]').val();
                   var f = $('input[name="environment"]').val();
                   var g = $('input[name="cleanliness"]').val();
                   var h = $('input[name="comfort"]').val();
                   var i = $('input[name="safety"]').val();
                   if((a + b + c + d + e + f + g + h + i) == 0){
                        alert('Please rate..');
                        return false;
                   }else{
                        return true;
                   }
                });
            });

            function starry(id){
                var ini = id.split("-");
                var idi = '';
                var val = '';
                if((ini.length) > 1){
                    var val = ini[1];
                    var idi = ini[0];
                    var wee = idi;
                }else{
                    var val = ini;
                    var idi = '';
                    var wee = idi;
                }
                var x = 0;
                if(idi!=''){
                    var kani = '#'+idi+'-';
                }else{
                    var kani = '#';
                }
                while(x != 10){
                    x++;
                    if(x <= val){
                        $(kani + x).html('<i class="fa fa-star"></i>');
                    }else{
                        $(kani + x).html('<i class="fa fa-star-o"></i>');
                    }8                }
                $('#rate'+wee).html(val + '/10');
                if(idi == ''){
                    $('input[name="safety"]').val(val);
                }else if(idi == 2){
                    $('input[name="comfort"]').val(val);
                }else if(idi == 3){
                    $('input[name="cleanliness"]').val(val);
                }else if(idi == 4){
                    $('input[name="environment"]').val(val);
                }else if(idi == 5){
                    $('input[name="accessibility"]').val(val);
                }else if(idi == 6){
                    $('input[name="hospitality"]').val(val);
                }else if(idi == 7){
                    $('input[name="honesty"]').val(val);
                }else if(idi == 8){
                    $('input[name="reliability"]').val(val);
                }else if(idi == 9){
                    $('input[name="overallimpression"]').val(val);
                }
            }
            
        </script>

        