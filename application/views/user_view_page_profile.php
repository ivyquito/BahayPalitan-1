
<div class="container">

	<div class="col-md-12" style="margin-top:100px;">
		<legend>User Information</legend>
		<div class="col-md-3">
			<img style="width:100%;height:200px;" src="<?= base_url();?>uploads/<?php echo $profile->profilepic; ?>" />
		</div>
		<div class="col-md-9">	
			<p> Name: <?= $profile->fname.' '.$profile->mname.' '.$profile->lname?></p>
			<p> Birthdate: <?= $profile->birthdate ?> </p>
			<p> Gender:  <?= strtoupper($profile->gender)?> </p>
			<p> Email Address: <?= $profile->emailAdd?> </p>
			<p> Contact #: <?= $profile->contactno?> </p>

			<a href="<?php echo base_url();?>index.php/user_page_message?homeId=<?php echo $profile->subID; ?>&no=<?php echo $profile->subID; ?>" class="btn btn-primary">Send Message</a>

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

	</div>
	
	<div class="col-md-12">
		<legend> Ratings and Reviews Here</legend>


		 <!-- use media object  -->
		 <div class="media well">
		   <div class="media-left">
		     <a href="#">
		       <img class="media-object" src="..." alt="...">
		     </a>
		   </div>
		   <div class="media-body">
		     <h4 class="media-heading">Media heading</h4>
		     sample lungs hahah
		   </div>
		 </div>
	</div>

</div>
<br>