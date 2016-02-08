<link rel="stylesheet" href="<?php echo base_url();?>assets/css/star-rating.css" type="text/css">
<script src="<?php echo base_url();?>assets/js/star-rating.js"></script>
<div class="container">
	<div class="col-md-12" style="margin-top:100px;">
		<legend>User Information</legend>
		<div class="col-md-3">
			<img style="width:100%;height:200px;" src="<?= base_url();?>uploads/<?php echo $profile->profilepic; ?>" />
		</div>
		<div class="col-md-5">	
			<p> Name: <?= $profile->fname.' '.$profile->mname.' '.$profile->lname?></p>
			<p> Birthdate: <?= $profile->birthdate ?> </p>
			<p> Gender:  <?= strtoupper($profile->gender)?> </p>
			<p> Email Address: <?= $profile->emailAdd?> </p>
			<p> Contact #: <?= $profile->contactno?> </p>

			<a href="<?php echo base_url();?>index.php/user_page_message?homeId=<?php echo $profile->subID; ?>&no=<?php echo $profile->subID; ?>" class="btn btn-primary">Send Message</a>

		</div>
		<div class="col-md-4">
			<input type="hidden" value="<?php echo $profile->subID ?>" id="subs_id" />
			<p align="center"><strong>Ratings and Feedback</strong></p>
			<p align="center"><input id="rate-user" type="number" value="<?php echo $rate_value ?>" class="rating rating-count" data-size="xs" min=0 max=5 step=1 /></p>
			<p>
				<textarea id="commentarea" placeholder="Your feedback here..." class="form-control"></textarea>
				<input type="button" value="Submit" onclick="submitComment();" class="btn btn-sm btn-default" />
			</p>
		</div>

	</div>

	<div class="col-md-12">
		<legend> Homes</legend>
		<div class="row">

			<?php foreach($homes as $home)  {?>
				<div class="col-sm-6 col-md-4">
		            <a href="<?php echo base_url();?>index.php/user_page_viewhome?homeId=<?php echo $home->ownerID; ?>&no=<?php echo $home->homeID; ?>" data-toggle="modal" class="thumbnail">
		              <img style="height:200px; width: 100%;" src="<?= base_url();?>uploads/<?php echo $home->photos; ?>" alt="...">
		            </a>
	          	</div>
          	<?php
          		}
          	?>
       
		</div>

		<?= $links;?>

	</div>
	
	<div class="col-md-12">
		<legend> Ratings and Reviews Here</legend>


		 <!-- use media object  -->
		 <div class="media well">
			<!-- <div class="media-left">
		     <a href="#">
		       <img class="media-object" src="..." alt="...">
		     </a>
		   </div> -->
		   	<div class="media-body">
           	 	<div style="display:inline-block;vertical-align:top;width:325px">
           	 	    <label>Stars:</label>
           	 	    <?php
           	 	    $x = 0;
           	 	    $totalStars = 0;
           	 	    $count = 0;
           	 	    foreach ($userRate_review as $key => $value) {
           	 	    	$totalStars += $value->rate_number;
           	 	    	$count++;
           	 	    }
           	 	    $aveStars = $totalStars / $count;
           	 	    $aveStars = round($aveStars);
           	 	    while($x < $aveStars){
           	 	     echo '<a href="#" class="hold"><i class="fa  fa-star"></i></a>';
           	 	     $x++;
           	 	    }
           	 	    while($x < 5){
           	 	     echo '<a href="#" class="hold"><i class="fa  fa-star-o"></i></a>';
           	 	     $x++; 
           	 	    }
		
           	 	    ?>
           	 	</div>
                <div class="form-group">
                    <label>Comment :</label>
                    <?php 
                    	foreach ($userRate_review as $key => $value) {
                    ?>
                    	<div style="max-width: 900px;"><?php echo $value->comment ?></div>
                    <?php
                    	}
                    ?>
                    
                    </div>
                </div>
		   	</div>
		 </div>
	</div>

</div>
<br>
<script type="text/javascript">
$(document).ready(function(){
	$(".clear-rating-active").hide();
	// $(".caption").hide();
	$("#rate-user").on('rating.change', function(){
       	$.post("<?php echo base_url(); ?>UserProfile/rate_user",
       	    {
       	        rateValue:          $('#rate-user').val(),
       	        user_to:            $("#subs_id").val()
       	    },function(data){
       	});
	});
});
function submitComment()
{
    if($("#commentarea").val() != "")
    {
        $.post("<?php echo base_url(); ?>UserProfile/submit_comment",
            {
                comment:            $("#commentarea").val(),
                user_to:            $("#subs_id").val()
            },function(data){
            if(data == 1)
            {
                alert("Thank you for your feedback.")
                window.location="<?php echo base_url(); ?>UserProfile/?id="+$("#subs_id").val()
            }
        });
    }else{  alert("Please fill up the field first before you submit.") }
}
</script>