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
                <div class="col-lg-4" style="float:right;text-align:right">
                <form style="mtext-align: right;" >
                <?php if($counthome > 1):?>
                <a href="<?php echo base_url(); ?>user_page_myhome"><input type="button" name="myhomes" value="< My Homes" style="display:inline-block;vertical-align:top;width:98px;line-height:15px;"/>
                <?php elseif($counthome < 4):?>
                <a href="<?php echo base_url(); ?>user_page_myhome/add_home"><input type="button" name="upload" value="+ Add home" style="display:inline-block;vertical-align:top;width:88px;line-height:15px;"/>
                </a>
                <?php endif; ?>
                <a href="<?php echo base_url(); ?>user_page_myhome/edit_home/<?php echo $myhome->homeID; ?>"><input type="button" name="edit" value="Edit" style="display:inline-block;vertical-align:top;width:88px;line-height:15px;"/>
                </a>
                <a href="<?php echo base_url(); ?>user_page_myhome/myhome_delete/<?php echo $myhome->homeID; ?>"><input type="button" name="delete" value="Delete" style="display:inline-block;vertical-align:top;width:88px;line-height:15px;"/>
                </a>
                </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row nacorner">

            <div class="col-md-5">
                <img class="img-responsive home_cover" src="<?php echo base_url();?>uploads/<?php echo $myhome->photos; ?>" alt="home_cover_photos">
                <div id="change_photo">
                <a href="javascript:;" id="changeword">Change Photo</a>
                <a href="javascript:;" id="cancelword" style="display:none">Cancel</a>
                    <form id="changeform" style="display:none; text-align: right;" action="<?php echo base_url(); ?>user_page_myhome/change_home_photo/<?php echo $myhome->homeID ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="new_photo" value="" style="display:inline-block;vertical-align:top;width:200px;" required>
                    <input type="submit" name="upload" value="Change" style="color: #000;display:inline-block;vertical-align:top;width:78px;line-height:15px;">
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <h3 style="color:#E8EF42">My Home</h3>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3>Short Description</h3>--> 
                <ul style="list-style:none">
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Location: </b> <?php echo $myhome->cityName; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Home Post Type: </b> <?php echo $myhome->homePostType; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Area Type: </b> <?php echo $myhome->description; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Max Guest: </b> <?php echo $myhome->maxGuests	; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Swap Status: </b> <?php echo $myhome->swapStatus; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Deal Negotiation: </b> <?php echo $myhome->dealNegotiation; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Cancelled Negotiation: </b> <?php echo $myhome->cancelledNegotiation; ?></li>
                    <li><i class="fa fa-building-o"></i>&nbsp;<b>Amenities: </b> <?php echo $myhome->amenities; ?></li>
                </ul>
                <br/>
            </div>
            <div class="col-md-4">
                <br/>
                <br/>
                    <div class="ratings">
                                <?php 
                                if($rate !==''):
                                foreach ($rate as $key => $value): ?>
                                <div class="radio">
                                    <label>
                                        <input id="rating-star ?>" type="number" value="<?php echo $value ?>" disabled class="rating rating-count" data-size="xs" min=0 max=5 step=0.5 />
                                    </label>
                                    <?php echo ucfirst($key) ?>

                                </div>
                                <!-- <p class="pull-right"><?php echo ucfirst($key) ?></p> -->
                                <!-- <p> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 1 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 2 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 3 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 4 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 5 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 6 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 7 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 8 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 9 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                <!-- </p> -->
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
                                foreach ($rate as $key => $value): ?>
                                <div class="radio">
                                    <label>
                                        <input id="rating-star ?>" type="number" value="<?php echo $value ?>" disabled class="rating rating-count" data-size="xs" min=0 max=5 step=0.5 />
                                    </label>
                                    <!-- <input type="text" style="display: none;" id="rateDescription-<?php echo $count; ?>" value="<?php echo ucfirst($key);  ?>"> -->
                                    <?php echo ucfirst($key) ?>

                                </div>
                                <!-- <p class="pull-right"><?php echo ucfirst($key) ?></p> -->
                                <!-- <p> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 1 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 2 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 3 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 4 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 5 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 6 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 7 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 8 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 9 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                    <!-- <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span> -->
                                <!-- </p> -->

                                <?php endforeach; ?>
                                <?php endif; ?>
                    </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12 page-header">
            <div class="col-lg-8">
                <h3>More Photos</h3>
            </div>
            <div class="col-lg-4">
                <form style="margin-top: 33px;text-align: right;" action="<?php echo base_url(); ?>user_page_myhome/add_home_photos/<?php echo $myhome->homeID ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="photo" value="" style="display:inline-block;vertical-align:top;width:200px;"/>
                <input type="submit" name="upload" value="Add photo" style="display:inline-block;vertical-align:top;width:78px;line-height:15px;"/>
                </form>
            </div>
            </div>
            <?php if(count($more_photos) > 0):  
            $ctr = 0;
            foreach($more_photos as $outdis): 
            $ctr++; ?>
            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item max_photos" src="<?php echo base_url().'/uploads/'.$outdis->image ?>" alt="">
                </a>
            </div>
            <?php endforeach; 
                if($ctr != 4):
                    $newloop = 4 - $ctr;
                    $x = 1;
            while ( $x <= $newloop) { ?>
                <div class="col-sm-3 col-xs-6">
                 <img class="img-responsive portfolio-item max_photos" src="<?php echo base_url();?>/assets/img/defualt_home.png" alt="" style="max-width: 200px;">
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


    <script>
    $(document).ready(function(){
        $(".clear-rating").hide();
        $(".clear-rating-active").hide();
        $(".caption").hide();
        $('#changeword').click(function(){
            $(this).hide();
            $('#changeform').show();
            $('#change_photo').attr('style','background:#719bcd');
            $('#cancelword').show();
        });
        $('#cancelword').click(function(){
            $(this).hide();
            $('#changeform').hide();
            $('#changeword').show();
            $('#change_photo').attr('style','background:none');
        });

    });
    </script>