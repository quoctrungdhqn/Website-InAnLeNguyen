<?php
	$CI       =& get_instance();
	$CI->load->model('Video_model');
	$link = $CI->Video_model->getvideo();
?>
			<h2>
				<a href="#">
					Video
				</a>
			</h2>
			<div class="row">
		<?php
		foreach($link as $item)
		{

			?>

			<div class="col-sm-4" style="margin-bottom:10px;">
	
				<iframe class="img-responsive" src="<?php echo $item->link; ?>" frameborder="0" allowfullscreen></iframe>

			</div>

			<?php
		} ?>
		</div>