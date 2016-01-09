<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">&nbsp;<br/>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-md-4" style="padding:5%">
				<br/>
				<?php if($user_info->profilepic != '0.jpg'): ?>
					<img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $user_info->profilepic; ?>" alt="" style="max-width:220px">
				<?php else: ?>
                	<img class="img-responsive" src="<?php echo base_url();?>assets/img/user_profile.png" alt="" style="max-width:120px">
           		<?php endif; ?>
           		<?php echo form_open('user_page_myprofile','enctype="multipart/form-data" class="form-signin"','role="form"'); ?>
           			<?php if($user_info->profilepic != '0.jpg'): ?>
           				<br/>
           			<label>Change Image</label>
           			<?php else: ?>
           			<label>Upload Image</label>
           			<?php endif; ?>
					<input type="file" name="image" value="" required class="form-control"/>	
					<input type="submit" name="Update" value="Upload" class=""/>	
           		<?php echo form_close(); ?>
            </div>
			 
            <div class="col-md-8">
			<?php echo form_open('user_page_myhome','class="form-signin"','role="form"'); ?>
				<h3 style="color:#E8EF42">My Profile </h3> 
				<p class="err"><?php echo $this->session->flashdata('error');?></p>
               <input type="hidden" name="ownerID" value="<?php echo $user_info->subID; ?>">
					
					<input type="hidden" name="swapStatus" value="ACTIVE">
					<input type="hidden" name="dealNeg" value="0">
					<input type="hidden" name="cancelledNeg" value="0">
						<label>Name :</label>
						<div class="form-control"><?php echo $user_info->lname.', '.$user_info->fname.' '.$user_info->mname; ?></div>		
						
						<label>Gender :</label>
						<div class="form-control"><?php echo $user_info->gender; ?>
						</div>
						
						<label>Birth Date :</label>
						<div class="form-control"><?php echo $user_info->birthdate; ?>
						</div>
						
						<label>Email :</label>
						<div class="form-control"><?php echo $user_info->emailAdd; ?>
						</div>
						
						<label>Contact No. :</label>
						<div class="form-control"><?php echo $user_info->contactno; ?>
						</div>
						
						<!--<label>Location :</label>
						<div class="form-control"><?php echo $loc ?>
						</div>-->
						<div style="margin-top:10px;color:#000">
						<a style="color:#000" href="<?php echo base_url();?>user_page_myprofile/edit"><input type="button" name="edit" value="Edit Profile" class=""></a>
                   		</div>
                    <!--<a class="btn btn-primary" name="savehome"/>-->
				<?php echo form_close(); ?>
            </div>

        </div>

       

        <hr>

    </div>
    <!-- /.container -->