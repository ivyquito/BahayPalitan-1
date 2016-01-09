
    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">				
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <b>My New Travel Plans</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body" style="min-height:300px">
                            <form action="<?php echo base_url(); ?>user_page_travelplan/addNew" class="form-signin" method="post" accept-charset="utf-8">
                            <fieldset>
                            <div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Start Date</label>
                                <input type="date" name="startdate" class="form-control" value="<?php echo (isset($_POST['startdate']) ? $_POST['startdate'] : ''); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>End Date</label>
                                <input type="date" name="enddate" class="form-control" value="<?php echo (isset($_POST['enddate']) ? $_POST['enddate'] : ''); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Location</label>
                                <select class="form-control" name="location" required>
                                <option value=""></option>
                                <?php foreach($loc as $row):?>
                                    <option value="<?php echo $row->locID ?>" <?php echo (isset($_POST['location']) && $_POST['location'] == $row->locID ? 'selected' : ''); ?>><?php echo $row->cityName ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                           <div class="form-group col-lg-6">
                                <label>Max Guest</label>
                                <input type="text" name="maxguest" class="form-control" value="<?php echo (isset($_POST['maxguest']) ? $_POST['maxguest'] : ''); ?>" required>
                            </div>
                             <div class="form-group col-lg-12">
                                <label>Amenities</label>
                                <input type="text" name="amenities" class="form-control" value="<?php echo (isset($_POST['amenities']) ? $_POST['amenities'] : ''); ?>" required>
                            </div>
                            <div class=" col-lg-6 col-md-offset-5">
                                <br>
                                <input type="submit" name="add_new_travel_plan" class="btn btn-primary" id="" value="Save">
                                <a href="<?php echo base_url().'user_page_travelplan'?>" class="btn btn-primary">Back</a>
                            </div>
                            </fieldset>
                            </form>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>