
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Edit Profile</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                        <?php echo form_open('user_page_myprofile/edit','class="form-signin"','role="form"'); ?>
                        
                        <p class="err"><?php echo $this->session->flashdata('error');?></p>
                        <div class="col-lg-12">
                        <label>First name :</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $user_info->fname; ?>"/>       
                        </div>
                        <div class="col-lg-12">
                        <label>Middle name :</label>
                        <input type="text" name="mname" class="form-control" value="<?php echo $user_info->mname; ?>"/>       
                        </div>
                        <div class="col-lg-12">
                        <label>Last name :</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $user_info->lname ?>"/>       
                        </div>
                        <div class="col-lg-6">
                        <label>Gender :</label>
                        <select class="form-control" name="gender">
                            <option value="male" <?php echo ($user_info->gender == 'male' ? 'selected': '') ?>>male</option>
                            <option value="female" <?php echo ($user_info->gender == 'female' ? 'selected': '') ?>>female</option>
                        </select>
                        </div>
                        <div class=" col-lg-6">
                        <label>Birth Date :</label>
                        <input type="date" name="bday" class="form-control" value="<?php echo $user_info->birthdate; ?>"/>
                        </div>
                        <div class="col-lg-12">
                        <label>Email :</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $user_info->emailAdd; ?>" />
                        </div>
                        <div class="col-lg-12">
                        <label>Contact No. :</label>
                        <input type="text" name="contact" class="form-control" value="<?php echo $user_info->contactno; ?>"/>
                        </div>
                        <div class=" col-lg-6 col-md-offset-3">
                                <br/>                                
                                <input type="submit" name="update_profile" class="col-lg-6 btn btn-primary" id="" value="Update">
                                <a href="<?php echo base_url() ?>user_page_myprofile" class="col-lg-6"><button class="btn btn-defualt" type="button"  style="width:140px; display:block">Back</button></a>
                        </div>        
                            <!--<a class="btn btn-primary" name="savehome"/>-->
                        <?php echo form_close(); ?>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>