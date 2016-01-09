
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="display:inline-block;max-width:230px"><b>Your current travel plan</b></h4>
                            <div style="float:right">
                            <a href="<?php echo base_url().'user_page_travelplan/edit'?>" class="btn btn-primary">Edit</a>
                            <a href="<?php echo base_url().'user_page_travelplan/addNew'?>" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <!--<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Start Date</label>
                                <p><?php echo $myplan->PStartDate ?></p> 
                            </div>
                            <div class="form-group col-lg-6">
                                <label>End Date</label>
                                <p><?php echo $myplan->PEndDate ?></p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Location</label>
                                <p><?php echo $myplan->cityName ?></p>
                            </div>
                           <div class="form-group col-lg-6">
                                <label>Max Guest</label>
                                <p><?php echo $myplan->PMaxGuests ?></p>
                            </div>
                             <div class="form-group col-lg-12">
                                <label>Amenities</label>
                                <p><?php echo $myplan->PAmenities ?></p>
                            </div> -->
                            <?php if($total_row >0 ):?>
                            <div class="form-group col-lg-12">
                             <hr> 
                             View my swapped travel plan <i class="fa fa-hand-o-right"></i> <a href="<?php echo base_url().'user_page_travelplan/records'?>">View</a>
                             <hr>
                             View my travel plan(s) <i class="fa fa-hand-o-right"></i> <a href="<?php echo base_url().'user_page_travelplan/travelplanrecord'?>">View</a>
                             </div>
                            <?php endif; ?>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>