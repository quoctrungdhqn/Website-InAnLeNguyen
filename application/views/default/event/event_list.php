<script src="<?php echo base_url(); ?>templates/default/js/countdown.js" type="text/javascript"></script>
<link href="<?php echo base_url()?>templates/default/css/slide_event.css" rel="stylesheet">
<!--<img src="<?php echo base_url(); ?>templates/default/images/event.jpg" />-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url(); ?>templates/default/images/slide_event.png" alt="...">
      <div class="carousel-caption">
          <h3>ASIA TOURISM HOSPITALITY YOUTH SUMMIT</h3>
          <div class="count_slide">
          	<script type="application/javascript">
									var myCountdown1 = new Countdown({
									 	time: 86400 * 12, // 86400 seconds = 1 day
										width:300, 
										height:60,  
										rangeHi:"day",
										//style:"flip"	// <- no comma on last item!
										//padding : 1.0, // Sets the text size to a percentage of the overall height. (I probably should have nemed this better.)
									numbers		: 	{
													font 	: "Arial",
													color	: "#B26E6E",
													bkgd	: "#FFFFFF",
													fontSize : 200,
													rounded	: 0.15,				// percentage of size 
													shadow	: {
																x : 0,			// x offset (in pixels)
																y : 3,			// y offset (in pixels)
																s : 4,			// spread
																c : "#FFFFFF",	// color
																a : 0.4			// alpha	// <- no comma on last item!
																}
													},
									
									labels : {
												textScale : 0.8,
												offset : 5
											} // <- no comma on last item!
										});

									</script>
          </div>
          
      </div>
    </div>
   <!-- <div class="item">
      <img src="<?php echo base_url(); ?>templates/default/images/slide_event.png" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text</h3>
      </div>
    </div>-->
  
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
<div class="container-fluid event_list">

		<ul class="nav nav-tabs event">
			<li class="active"><a data-toggle="tab" href="#home">All(<?php echo count($list_all)?>)</a></li>			
			<li class=""><a data-toggle="tab" href="#profile">Up Coming(<?php echo count($list_upcomming)?>)</a></li>
			<li class=""><a data-toggle="tab" href="#messages">Archive(<?php echo count($list_archive)?>)</a></li>					
		
		</ul>
		<div class="row-fluid ">
			<div class="row-fluid">
				<div class="tab-content span4">
					<div id="home" class="tab-pane active">
						<?php
						if(count($list_upcomming) > 0)
						{
						
							foreach($list_all as $items)
							{									                           	
							    if(@$items->images != '')
							    {
							    	$img = explode(',',$items->images);
							    }
						?>
							<div class="media">
								  <a class="media-left media-middle" href="#">
								    <img class="img-rounded" title="<?php echo $items->title;?>" src="<?php echo base_url(); ?>uploads/event/thumb_<?php echo $img[0]; ?>" />
								  </a>
								  <div class="media-body">
								    <h4 class="media-heading"><?php echo $items->title;?></h4>
								    <?php 
							        	$text = strip_tags($items->detail);
							        	echo word_limiter($text,30);
							        ?>
							        
								        <div><a href="#" class="register btn">Register</a></div>
								        <div class="col-xs-12">
								        <div class="countdown col-xs-6">
								        																														<script type="application/javascript">
									var myCountdown1 = new Countdown({
									 	time: 86400 * 10, // 86400 seconds = 1 day
										width:300, 
										height:60,  
										rangeHi:"day",
										//style:"flip"	// <- no comma on last item!
										//padding : 1.0, // Sets the text size to a percentage of the overall height. (I probably should have nemed this better.)
									numbers		: 	{
													font 	: "Arial",
													color	: "#B26E6E",
													bkgd	: "#FFFFFF",
													fontSize : 200,
													rounded	: 0.15,				// percentage of size 
													shadow	: {
																x : 0,			// x offset (in pixels)
																y : 3,			// y offset (in pixels)
																s : 4,			// spread
																c : "#000000",	// color
																a : 0.4			// alpha	// <- no comma on last item!
																}
													},
									
									labels : {
												textScale : 0.8,
												offset : 5
											} // <- no comma on last item!
										});

									</script>
										
										</div>
									<div class="col-xs-6"><a title="Google" href="#"><img src="<?php echo base_url(); ?>templates/default/images/google.png" /></a>&nbsp;&nbsp;&nbsp;<a title="facebook" href="#"><img src="<?php echo base_url(); ?>templates/default/images/fb.png" /></a></div>
									</div>
								  </div>
								  
							</div>
						<?php	
								}
							}
						?>
					</div>
					<div id="profile" class="tab-pane">
						<?php							
							if(count($list_upcomming) > 0)
							{						
							
								foreach($list_upcomming as $items1)
								{									                           	
								    if(@$items1->images != '')
								    {
								    	$img1 = explode(',',$items1->images);
								    }
						?>
							<div class="media">
								  <a class="media-left media-middle" href="#">
								    <img class="img-rounded" title="<?php echo $items1->title;?>" src="<?php echo base_url(); ?>uploads/event/thumb_<?php echo $img1[0]; ?>" />
								  </a>
								  <div class="media-body">
								    <h4 class="media-heading"><?php echo $items1->title;?></h4>
								    <?php 
							        	$text1 = strip_tags($items1->detail);
							        	echo word_limiter($text1,30);
							        ?>
							        <div><a href="#" class="btn btn-primary btn-lg">Register</a></div>
							        <div class="col-xs-12">
								        <div class="countdown col-xs-6">
								        																														<script type="application/javascript">
									var myCountdown1 = new Countdown({
									 	time: 86400 * 12, // 86400 seconds = 1 day
										width:300, 
										height:60,  
										rangeHi:"day",
										//style:"flip"	// <- no comma on last item!
										//padding : 1.0, // Sets the text size to a percentage of the overall height. (I probably should have nemed this better.)
									numbers		: 	{
													font 	: "Arial",
													color	: "#B26E6E",
													bkgd	: "#FFFFFF",
													fontSize : 200,
													rounded	: 0.15,				// percentage of size 
													shadow	: {
																x : 0,			// x offset (in pixels)
																y : 3,			// y offset (in pixels)
																s : 4,			// spread
																c : "#000000",	// color
																a : 0.4			// alpha	// <- no comma on last item!
																}
													},
									
									labels : {
												textScale : 0.8,
												offset : 5
											} // <- no comma on last item!
										});

									</script>
										
										</div>
									<div class="col-xs-6"><a title="Google" href="#"><img src="<?php echo base_url(); ?>templates/default/images/google.png" /></a>&nbsp;&nbsp;&nbsp;<a title="facebook" href="#"><img src="<?php echo base_url(); ?>templates/default/images/fb.png" /></a></div>
									</div>
								  </div>
								  
							</div>
						<?php	
								}
							}
						?>
					</div>
					<div id="messages" class="tab-pane">
						<?php							
							if(count($list_archive) > 0)
							{						
							
								foreach($list_archive as $items1)
								{									                           	
								    if(@$items1->images != '')
								    {
								    	$img1 = explode(',',$items1->images);
								    }
						?>
							<div class="media">
								  <a class="media-left media-middle" href="#">
								    <img class="img-rounded" title="<?php echo $items1->title;?>" src="<?php echo base_url(); ?>uploads/event/thumb_<?php echo $img1[0]; ?>" />
								  </a>
								  <div class="media-body">
								    <h4 class="media-heading"><?php echo $items1->title;?></h4>
								    <?php 
							        	$text1 = strip_tags($items1->detail);
							        	echo word_limiter($text1,30);
							        ?>
							        <div><a href="#" class="btn btn-primary btn-lg">Register</a></div>
							        <div class="col-xs-12">
								        <div class="countdown col-xs-6">
								        																														<script type="application/javascript">
									var myCountdown1 = new Countdown({
									 	time: 86400 * 5, // 86400 seconds = 1 day
										width:300, 
										height:60,  
										rangeHi:"day",
										//style:"flip"	// <- no comma on last item!
										//padding : 1.0, // Sets the text size to a percentage of the overall height. (I probably should have nemed this better.)
									numbers		: 	{
													font 	: "Arial",
													color	: "#B26E6E",
													bkgd	: "#FFFFFF",
													fontSize : 200,
													rounded	: 0.15,				// percentage of size 
													shadow	: {
																x : 0,			// x offset (in pixels)
																y : 3,			// y offset (in pixels)
																s : 4,			// spread
																c : "#000000",	// color
																a : 0.4			// alpha	// <- no comma on last item!
																}
													},
									
									labels : {
												textScale : 0.8,
												offset : 5
											} // <- no comma on last item!
										});

									</script>
										
										</div>
									<div class="col-xs-6"><a title="Google" href="#"><img src="<?php echo base_url(); ?>templates/default/images/google.png" /></a>&nbsp;&nbsp;&nbsp;<a title="facebook" href="#"><img src="<?php echo base_url(); ?>templates/default/images/fb.png" /></a></div>
									</div>
								  </div>
								  
							</div>
						<?php	
								}
							}
						?>
					</div>
					
				</div>
			</div>
		</div>
</div>