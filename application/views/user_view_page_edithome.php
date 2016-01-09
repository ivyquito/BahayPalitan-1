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

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-5">
                <img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $myhome->photos ?> " alt="">
            </div>

            <div class="col-md-7">
			<?php echo form_open('user_page_myhome/update_home/'.$myhome->homeID,'enctype="multipart/form-data" class="form-signin"','role="form"'); ?>
                <h3>Details</h3>
               
						<label>Location</label>
						<select name="locID" required class="form-control">
							<option value=""></option>
							<?php foreach($locations as $data): ?>
								<option value="<?php echo $data->locID ?>" <?php echo ($myhome->locID==$data->locID?'selected':'');?> ><?php echo $data->cityName; ?></option>
							<?php endforeach; ?>
						</select>
												
						<label>Area Type</label>
							<select name="areaType" class="form-control" required>
								 <option value="">--Area Type--</option>
								 <?php foreach($area_type as $a) { ?>
									<option value="<?php echo $a->ATypeID ?>"  <?php echo ($myhome->ATypeID == $a->ATypeID ? 'selected':'');?>><?php echo $a->description;?></option>
								 <?php } ?>
							</select>

						<label>House Type</label>
							<select name="houseType" class="form-control" required>
								 <option value="">--House Type--</option>
								 <?php foreach($house_type as $h) { ?>
									<option value="<?php echo $h->HTypeID ?>" <?php echo ($myhome->HTypeID==$h->HTypeID ?'selected':'');?>><?php echo $h->description;?></option>
								 <?php } ?>
							</select><br/>
						<label>Home Post Type</label>
							<select name="homePostType" class="form-control" required>
								<option value=""></option>
								<option value="Home" <?php echo ($myhome->homePostType=='Home' ?'selected':'');?>>Home</option>
								<option value="Division" <?php echo ($myhome->homePostType=='Division' ?'selected':'');?>>Division</option>
						</select><br/>

						<label>Amenities</label>
						<textarea name="amenities" placeholder="Amenities" class="form-control" rows="5" cols="25" required><?php echo $myhome->amenities; ?></textarea>                     
	                    <label>Max Guest</label>
	                        <input type="text" name="maxGuests" value="<?php echo $myhome->maxGuests; ?>" class="form-control" required> <br/>

                    <input type="submit" class="btn btn-primary" name="savehome" value="Update" />
				<?php echo form_close(); ?>
            </div>

        </div>
        <!-- /.row -->

        

        <hr>

    </div>
    <!-- /.container -->