<div class="col-lg-12">
<div class="panel panel-default mr">
<div class="panel-heading">
    <h3 class="panel-title">Video</h3>
  </div>
    <div class="panel-body">
			<?php
				foreach($videoct as $items)
				{
					
			?>
			<div class="col-lg-4">
				<div class="video">
					 <iframe width="270" height="230"
						src="http://www.youtube.com/embed/<?php echo $items->link; ?>">
					</iframe> 
				</div>
				<div class="titlevideo">
					<?php echo $items->title; ?>
				</div>
			</div>
			<?php
				}
			?>
</div>
</div>
</div>