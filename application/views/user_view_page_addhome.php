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
                <img class="img-responsive" src="<?php echo base_url();?>assets/img/defualt_home2.png" alt="">
            </div>

            <div class="col-md-7">
			<?php echo form_open('user_page_myhome','enctype="multipart/form-data" class="form-signin"','role="form"'); ?>
                <h3>Details</h3>
				<p class="err"><?php echo (isset($error) ? $error : '')  ?></p>
               	<input type="hidden" name="ownerID" value="<?php echo $user_info->subID; ?>">
               		
               		<div class="map_canvas" id="map_canvas" style="width: 100%; height: 240px;"></div>

					<div class="det">
					  
					  <fieldset hidden>
					    <label>Latitude</label>
					    <input name="lat" id='lat' type="text" value="">
					  
					    <label>Longitude</label>
					    <input name="lng" id='lng' type="text" value="">
					  
					    <label>Formatted Address</label>
					    <input name="formatted_address" id='f_address' type="text" value="">
					  </fieldset>
					  
					  <a id="reset" href="#" style="display:none;">Reset Marker</a>
					</div>

               		<label>Location</label>
               		<input id="geocomplete" type="text" class="form-control input-sm" placeholder="Type in an address" value="Philippines">
					<span style="display:none;" class="input-group-addon" id='find'><i class='fa fa-search'></i></span>
					<!--<select name="locID" required class="form-control">
						<option value=""></option>
						<?php foreach($locations as $data): ?>
							<option value="<?php echo $data->locID ?>" <?php echo (isset($_POST['locID']) && $_POST['locID'] == $data->locID ?'selected':'');?>><?php echo $data->cityName; ?></option>
						<?php endforeach; ?>
					</select> -->
						<label>Upload Image</label>
						<input type="file" name="image" id="image" value="" required class="form-control">									
						<label>Area Type</label>
							<select name="areaType" id="areaType" class="form-control" required>
								 <option value="">--Area Type--</option>
								 <?php foreach($area_type as $a) { ?>
									<option value="<?php echo $a->ATypeID ?>" <?php echo (isset($_POST['areaType']) && $_POST['areaType'] == $a->ATypeID ? 'selected':'');?>><?php echo $a->description;?></option>
								 <?php } ?>
							</select>

						<label>House Type</label>
							<select name="houseType" id="houseType" class="form-control" required>
								 <option value="">--House Type--</option>
								 <?php foreach($house_type as $h) { ?>
									<option value="<?php echo $h->HTypeID ?>" <?php echo (isset($_POST['houseType']) && $_POST['houseType'] == $h->HTypeID ? 'selected':'');?>><?php echo $h->description;?></option>
								 <?php } ?>
						</select><br/>
						<label>Home Post Type</label>
							<select name="homePostType" id="homePostType" class="form-control" required>
								<option value=""></option>
								<option value="Home" <?php echo (isset($_POST['homePostType']) && $_POST['homePostType'] == 'Home'?'selected':'');?>>Home</option>
								<option value="Division" <?php echo (isset($_POST['homePostType']) && $_POST['homePostType'] == 'Division'?'selected':'');?>>Division</option>
						</select><br/>

						<label>Amenities</label>
						<textarea name="amenities" id="Amenities" placeholder="Amenities" class="form-control" rows="5" cols="25" required><?php echo (isset($_POST['amenities']) ? $_POST['amenities']:''); ?></textarea>                     
	                    <label>Max Guest</label>
	                        <input type="text" id="maxGuests" name="maxGuests" value="<?php echo (isset($_POST['maxGuests']) ? $_POST['maxGuests']:''); ?>" class="form-control" required> <br/>

                    <input type="submit" class="btn btn-primary" id="savehome" name="savehome"/>
				<?php echo form_close(); ?>
            </div>

        </div>
        <!-- /.row -->

        

        <hr>

    </div>
    <!-- /.container -->

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.geocomplete.js"></script>
<script>
    /* GOOGLE MAP JQUERY GEO MAPPING */
    // $("#savehome").click(function(){
    // 	var location = $("#geocomplete").val();
    // 	var image = $("#image").val()
    // });
$(function(){

  	$("#geocomplete").geocomplete({
    	map: ".map_canvas",
    	details: ".det ",
    	markerOptions: {
      	draggable: true
    	}
  	});
  
  	$("#geocomplete").bind("geocode:dragged", function(event, latLng){
    	$("input[name=lat]").val(latLng.lat());
    	$("input[name=lng]").val(latLng.lng());
    	$("#reset").show();
  	});
  
  
  	$("#reset").click(function(){
    	$("#geocomplete").geocomplete("resetMarker");
    	$("#reset").hide();
    	return false;
  	});
  
  	$("#find").click(function(){
    	$("#geocomplete").trigger("geocode");
  	}).click();
});
</script>