
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




                    <div class="map_canvas" id='map_canvas' style="width: 100%; height: 180px;"></div>

                    <form>
                        <fieldset hidden>
                            <label>Latitude</label>
                            <input name="lat" id='lat' type="text" value="">
                          
                            <label>Longitude</label>
                            <input name="lng" id='lng' type="text" value="">
                          
                            <label>Formatted Address</label>
                            <input name="formatted_address" id='f_address' type="text" value="">
                        </fieldset>
                    </form>


                            <div class="row">

                                <div class="col-md-6">
                                    <label>Start Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id='startdate'>
                                        <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
                                    </div>

                                    <br />

                                    <label>Location</label>
                                    <input id="geocomplete" type="text" class="form-control input-sm" placeholder="Type in an address" value="Philippines">
                                </div>

                                <div class="col-md-6">
                                    <label>End Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id='enddate'>
                                        <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
                                    </div>

                                    <br />

                                    <label>Max Guest</label>
                                    <input type="text" class="form-control" id='maxguest'>
                                </div>
                            </div>

                            <br />

                            <label>Amenities</label>
                            <input type="text" class="form-control" id='amenities'>

                            <br />

                            <center>
                                <button class="btn btn-primary" id='btnTravelPlanSave'>Save</button>
                                <a href="<?php echo base_url().'user_page_travelplan'?>" class="btn btn-primary">Back</a>
                            </center>
                        </div>
                        <!-- .panel-body -->
						</div>			
					</div>	
				</div>
		</div>
    </div>


    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.geocomplete.js"></script>


<script type="text/javascript">

$(document).ready(function(){

    //DISPLAY DEFAULT LOCATION

    var latlng = new google.maps.LatLng('10.3156992', '123.88543660000005');
    var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: "Hello World!"
    });
});


    $('#btnTravelPlanSave').on('click', function()
        {
            var startdate       = $('#startdate').val(),
                location        = $('#f_address').val(),
                enddate         = $('#enddate').val(),
                maxguest        = $('#maxguest').val(),
                amenities       = $('#amenities').val(),
                lat             = $('#lat').val(),
                lng             = $('#lng').val(),
                errMsg          = '';

            if(startdate == '') { errMsg += 'Start Date is required'; }
            if(enddate == '')   { errMsg += '\nEnd Date is required'; }
            if(location == '')  { errMsg += '\nLocation is required'; }
            if(maxguest == '')  { errMsg += '\nPlease Indicate Max Guest'; }

            if(errMsg == '')
            {

                $.ajax({
                   type: "POST",
                   dataType: "json",
                   data: {
                            stdate  : $.trim(startdate),
                            nddate  : $.trim(enddate),
                            loc     : $.trim(location),
                            maxgst  : $.trim(maxguest),
                            aments  : $.trim(amenities),
                            lat     : $.trim(lat),
                            lng     : $.trim(lng)
                         },
                   url: '<?php echo site_url("user_page_travelplan/addNewTravelPlan"); ?>',
                   success: function(json){
                        if(json.success)
                        {
                            alert(json.message);
                            window.location.href = '<?php echo base_url(); ?>user_page_travelplan/addNew/';
                        }
                   }
                   
                });

            }
            else
            {
                alert(errMsg);
            }
        });

    $('.input-group.date').datepicker({
    format: "mm/dd/yyyy",
    //startDate: "2012-01-01",
    //endDate: "2015-01-01",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });



    /* GOOGLE MAP JQUERY GEO MAPPING */

  $(function(){
    $("#geocomplete").geocomplete({
      map: ".map_canvas",
      details: "form ",
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