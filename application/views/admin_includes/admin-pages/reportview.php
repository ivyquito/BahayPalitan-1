        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report Abuse Homes</h1>
                    <?php echo $this->session->flashdata('success'); ?>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
            
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
                <ul>
                     <li><b>Location: </b> <?php echo $viewhome->cityName; ?></li>
                     <li><b>Home Post Type: </b> <?php echo $viewhome->homePostType; ?></li>
                    <li><b>Area Type: </b> <?php echo $viewhome->description; ?></li>
                    <li><b>Max Guest: </b> <?php echo $viewhome->maxGuests  ; ?></li>
                    <li><b>Swap Status: </b> <?php echo $viewhome->swapStatus; ?></li>
                    <li><b>Deal Negotiation: </b> <?php echo $viewhome->dealNegotiation; ?></li>
                    <li><b>Cancelled Negotiation: </b> <?php echo $viewhome->cancelledNegotiation; ?></li>
                    <li><b>Amenities: </b> <?php echo $viewhome->amenities; ?></li>
                </ul>
            </div>
            <div class="col-md-4">
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
                    <div class="ratings">
                                <?php 
                                if($rate !==''):
                                foreach ($rate as $key => $value): ?>
                                <p class="pull-right"><?php echo ucfirst($key) ?></p>
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
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span>
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
                                foreach ($rate as $key => $value):?>
                                <p class="pull-right"><?php echo ucfirst($key) ?></p>
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
                                    <span class="glyphicon glyphicon-star<?php echo ($value >= 10 && $total != 0 ? '':'-empty'); ?>"></span>
                                </p>

                                <?php endforeach; ?>
                                <?php endif; ?>
                    </div>
                    
            </div>

            <div class="form-group col-lg-12">
                        <br/>
                        <br/>
                        <?php if($viewhome->swapStatus == 'ACTIVE'):?>
                         <div class="form-group col-lg-2">
                        <form action="<?php echo base_url(); ?>admin_page_report/deactive" class="form-signin" method="post" accept-charset="utf-8" id="report">
                        <input type="hidden" name ="ownerId" value="<?php echo $viewhome->ownerID; ?>"/>
                        <input type="hidden" name ="homeId" value="<?php echo $viewhome->homeID; ?>"/>
                        <input type="submit" name="report" class="btn btn-danger" value="Active" style="width: 183px;" />
                        </form>
                        </div>
                        <?php else: ?>
                        <div class="form-group col-lg-2">DEACTIVED ALREADY</div>
                        <?php endif; ?>


            </div>
        </div>
        <!-- /.row -->
         </div>

<!-- modal for country starts here -->
<div class="modal fade" id="addCountry" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-pencil"></i> Add Country</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'index.php/admin_page_country/addExec'); ?>
                <div class="form-group">
                    <label for="countryName">Country Name</label>
                    <input type="text" name="countryName" id="countryName" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!---- modal for country ends here -->