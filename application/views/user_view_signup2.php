    <div id="login_box" style="padding-top:10px">
    <div class="container" style="padding:0px!important">
		 <div class="container-fluid">
			<div class="container">
				<div class="container-page">
					<div class="col-md-8 col-md-offset-2">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<h3 class="dark-grey">Registration - Step 2</h3>
					</div>
						<div class="panel-body">
                        <form action="<?php echo base_url(); ?>paypalpayment/testpay" class="form-signin" method="post" accept-charset="utf-8">
						<fieldset>
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<div class="form-group col-lg-12">
								<label>Subscription</label>
								<select class="form-control" name="subscription" required>
									<!-- <option value=""></option>  -->
									<?php foreach($plans as $row): ?>
									<option value="<?php echo $row->planID; ?>"
									<?php echo (isset($_POST['subscription']) && $_POST['subscription'] == $row->planID ? 'selected' : ''); ?>>
									<?php echo $row->planName; ?> (<?php echo $row->planDesc; ?> = USD <?php echo $row->planAmount; ?>)
									</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-lg-12">
								<hr/>
							</div>


								<div class="form-group col-lg-12 col-md-offset-5">
									<input type="submit" name="submit" value="Payment thru Paypal" class="btn btn-primary">
								</div>
							</div>

						</fieldset>
						</form>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

    </div>
    </div>