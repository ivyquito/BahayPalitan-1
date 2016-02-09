<script>

    $(document).ready(function() {

           $.ajax({
            dataType: "json",
            url: '<?php echo site_url("user_page_travelplan/pullTravelPlan"); ?>',
            success: function(json){

                console.log(json);

                var arr = [];

                $.each(json, function(key, val){
                    arr.push({
                        title: val.GoogleAddr,
                        start: val.PStartDate,
                        end: val.PEndDate,
                        url: "<?php echo base_url(); ?>user_page_travelplan/editTravel?TravelPlanID=" + val.TravelPlanID + "&subID=" + val.subID
                    });

                });

                $('#calendar').fullCalendar({
                    //defaultDate: '2016-01-12',
                    events: arr,
                    eventClick: function(event) {
                        if (event.url) {
                            window.location.href = url
                            return false;
                        }
                    }
                });
            }
         });

    });

</script>



<style type="text/css">
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>


    <div style="padding-top:80px">
		 <div class="container-fluid">
				<div class="container-page">
					<div class="col-md-offset-2 col-lg-8">
						<div class="panel panel-default">

                            <div class="panel-heading">
                                <h4 style="display:inline-block;max-width:230px"><b>My travel plan(s)</b></h4>
                                <div style="float:right">
                                <a href="<?php echo base_url().'user_page_travelplan/addNew/'?>" class="btn btn-primary">Add</a>
                                </div>
                            </div>

                            <div class="panel-body" style="min-height:300px">
                                <div id='calendar'></div>
                            </div>

                        </div>
					</div>
				</div>
		</div>
    </div>
