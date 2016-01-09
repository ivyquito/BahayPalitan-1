
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="display:inline-block;max-width:230px"><b>My travel plan(s)</b></h4>
                            <div style="float:right">
                            <a href="<?php echo base_url().'user_page_travelplan/addNew/'?>" class="btn btn-primary">Add</a>            
                            </div>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <?php foreach($records as $out): ?>
                                <div style="border-bottom:1px dashed;">
                                    <span><b><input type="hidden"<?php echo $out->TravelPlanID ?> ></span></b>
                                    <span><b>Location: </b><?php echo $out->cityName ?>&nbsp;</span><br/>
                                    <span><b>Start Date: </b><?php echo $out->PStartDate ?>&nbsp;</span><br/>
                                    <span><b>End Date: </b><?php echo $out->PEndDate ?>&nbsp;</span><br/>
                                    <span><b>Max Guests: </b><?php echo $out->PMaxGuests ?></span><br/>
                                    <span><b>Amenities: </b><?php echo $out->PAmenities ?></span><br/>                                    
                                    <a href="<?php echo base_url(); ?>user_page_travelplan/editTravel?TravelPlanID=<?php echo $out->TravelPlanID;?>&subID=<?php echo $out->subID ?>" class="btn btn-primary">Edit</a>                                                                       
                                </div>
                            <?php endforeach; ?>
                                <div class="form-group col-lg-12">
                                     <hr> 
                                     View my swapped travel plan <i class="fa fa-hand-o-right"></i> <a href="<?php echo base_url().'user_page_travelplan/records'?>">View</a>
                                     <hr>                                     
                                </div>
                            <div id="pagination"><?php echo $links; ?></div>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>