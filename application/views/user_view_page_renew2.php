    <div id="" style="padding-top:55px">
		 <div class="container-fluid">
			<div class="container">
				<div class="container-page">				
					<div class="col-md-8 col-md-offset-2">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<p class="">Other Payment Method</p>
					</div>
						<div class="panel-body">
                        <form action="<?php echo base_url(); ?>user_page_renew" class="form-signin" method="post" accept-charset="utf-8">
						<fieldset>
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<div class="form-group col-lg-3">
								<input type="radio" name="card" class="" value="Visa" <?php echo (isset($_POST['card']) && $_POST['card'] =='Visa' ? 'checked' : ''); ?>>
								<label>Visa</label>
							</div>	
							<div class="form-group col-lg-3">
								<input type="radio" name="card" class="" value="Mastercard" <?php echo (isset($_POST['card']) && $_POST['card'] =='MasterCard' ? 'checked' : ''); ?>>
								<label>Master Card</label>
							</div>
							<div class="form-group col-lg-3">
								<input type="radio" name="card" class="" value="American Express" <?php echo (isset($_POST['card']) && $_POST['card'] =='AmericanExpress' ? 'checked' : ''); ?> required>
								<label>Ame. Express</label>
							</div>	
							<div class="form-group col-lg-3">
								<input type="radio" name="card" class="" value="Discover" <?php echo (isset($_POST['gender']) && $_POST['card'] =='Discover' ? 'checked' : ''); ?> required>
								<label>Discover</label>
							</div>									
							
							<div class="form-group col-lg-6">
								<label>Card Information</label>
							
								<div class="form-group col-lg-8">
									<label>Card Number</label>
									<input type="text" name="card_number" class="form-control" value="<?php echo (isset($_POST['card_number']) ? $_POST['card_number'] : ''); ?>" required>
								</div>	
								<div class="form-group col-lg-4">
									<label>CVV</label>
									<input type="text" name="cvv" class="form-control" value="<?php echo (isset($_POST['cvv']) ? $_POST['cvv'] : ''); ?>" required>
								</div>
							</div>
							<div class="form-group col-lg-6">
								<label>Expiration</label><br/>
									<div class="col-lg-4">
										<label>Month</label>
										<select name="exmonth" class="form-control" required>
											<option value=""></option>
											<?php 
											$y = 01;
											for($x = $y; $x <= 12;$x++){ ?>
												<option value="<?php echo $x ?>" <?php echo (isset($_POST['exyear']) && $_POST['exmonth'] == $x ? 'selected':'') ?>><?php echo $x ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-5" >
										<label>Year</label>
										<select name="exyear" class="form-control" required>
											<option value=""></option>
											<?php $y = date('Y');
											for($x = $y; $x <= ($y+15);$x++){ ?>
												<option value="<?php echo $x ?>" <?php echo (isset($_POST['exyear']) && $_POST['exyear'] == $x ? 'selected':'') ?>><?php echo $x ?></option>
											<?php } ?>
										</select>
									</div>
							</div>
							<div class="form-group col-lg-6">
							&nbsp;
							</div>
							<div class="form-group col-lg-12">
								<div class="form-group col-lg-6">
									<label>First Name</label>
									<input type="text" name="card_fname" class="form-control" value="<?php echo (isset($_POST['card_fname']) ? $_POST['card_fname'] : ''); ?>" required>
								</div>	
								<div class="form-group col-lg-6">
									<label>Last Name</label>
									<input type="text" name="card_lname" class="form-control" value="<?php echo (isset($_POST['card_lname']) ? $_POST['card_lname'] : ''); ?>" required>
								</div>
								<div class="form-group col-lg-12">
									<label>Street</label>
									<textarea  name="street" class="form-control" required><?php echo (isset($_POST['street']) ? $_POST['street'] : ''); ?></textarea>
								</div>
								<div class="form-group col-lg-6">
									<label>City</label>
									<input type="text" name="city" class="form-control" id="" value="<?php echo (isset($_POST['city']) ? $_POST['city'] : ''); ?>" required>
								</div>
								<div class="form-group col-lg-6">
									<label>Province</label>
									<input type="text" name="province" class="form-control" id="" value="<?php echo (isset($_POST['province']) ? $_POST['province'] : ''); ?>" required>
								</div>
								<div class="form-group col-lg-6">
									<label>Zipcode</label>
									<input type="text" name="zipcode" class="form-control" id="" value="<?php echo (isset($_POST['zipcode']) ? $_POST['zipcode'] : ''); ?>" required>
								</div>
								<div class="form-group col-lg-6">
									<label>Country</label>
									<div class="form-control">Philippines</div>
								</div>
								<div class="form-group col-lg-12 col-md-offset-5">
									<input type="submit" name="confirm" value="submit" class="btn btn-primary">
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