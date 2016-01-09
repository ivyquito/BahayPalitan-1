
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <b>My Subscription</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Plan Amount</th>
                                            <th>Days Left</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $plan->planName.' - '.$plan->planDesc ?></td>
                                            <td><?php echo $plan->planAmount ?></td>
                                            <td><?php echo $days_left['days'].' days '.$days_left['hours'],' hours'; ?></td>
                                            <td><?php echo $payment_info->card,' - '.$payment_info->card_number; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>