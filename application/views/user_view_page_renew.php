
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Renew Subscription</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <div style="border:1px solid #f05f40;padding:5px; border-radius:5px;height:35px;color:#f05f40">
                            <p>Your subscription has been expire...</p>
                            </div>

                            <div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
                            <form action="<?php echo base_url().'user_page_renew/renew'?>" method="post">
                            <div class="form-group col-lg-6">
                                <label>Select Plan Subscription</label>
                                <select class="form-control" name="subscription" required>
                                    <option value=""></option>
                                    <?php foreach($plans as $row): ?>
                                    <option value="<?php echo $row->planID; ?>"
                                    <?php echo ($myplanID == $row->planID ? 'selected' : ''); ?>>
                                    <?php echo $row->planName; ?> (<?php echo $row->planDesc; ?> = USD <?php echo $row->planAmount; ?>) 
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Payment Method :</label>
                                <select class="form-control" name="paymentMethod" required>
                                    <?php if($payment_info->card != NULL): ?>
                                    <option value="same" selected ><?php echo $payment_info->card.' - '.$payment_info->card_number; ?></option>
                                    <?php endif; ?>
                                    <option value="other">Other Method</option>
                                </select>
                            </div>
                            
                            <div class=" col-lg-6 col-md-offset-5">
                                <br>
                                <input type="submit" name="cancel_swap" class="btn btn-primary" value="continue" style="width: 183px;" />
                            </div>
                            </form>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>