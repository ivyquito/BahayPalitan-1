
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="display:inline-block;max-width:230px"><b>Swapped travel plan</b></h4>
                            <div style="float:right">
                            <a href="<?php echo base_url().'user_page_travelplan'?>" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <?php foreach($records as $out): ?>
                                <div style="border-bottom:1px dashed;">
                                    <span><b>Location: </b><?php echo $out->cityName ?>&nbsp;</span>
                                    <span><b>Max Guest: </b><?php echo $out->tr_maxGuests ?>&nbsp;</span>
                                    <span><b>Start Date: </b><?php echo $out->tr_startDate ?>&nbsp;</span>
                                    <span><b>End Date: </b><?php echo $out->tr_pEndDate ?></span>
                                </div>
                            <?php endforeach; ?>
                            <div id="pagination"><?php echo $links; ?></div>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>