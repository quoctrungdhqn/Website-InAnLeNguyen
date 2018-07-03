        <!-- bootstrap 3.0.2 -->
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo base_url(); ?>assets/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link href="<?php echo base_url(); ?>assets/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<?php $count = 1; ?>
<div class="row">
	<div class="col-xs-12">


		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
					Danh sách menu
					<button onclick="location.href='<?php echo base_url()?>admin/menu/edit'" class="btn btn-primary btn-sm">
						Thêm mới
					</button>
				</h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">

				<ul>
					<?php

					function getSubcategory($parent_id)
					{
						$CI    =& get_instance();
						$query = $CI->db->get_where('menus', array('parent'=> $parent_id));
						$result = $query->result_array();
						foreach($result as $row){
							echo '<ul>';
							echo '<li><a href="'.base_url().'admin/menu/edit/'.$row['id'].'" >'.$row['name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'admin/menu/delete/'.$row['id'].'"><i class="fa fa-remove"></i><a></li>';
							getSubcategory($row['id']);
							echo '</ul>';
						}

					}
					foreach($list_menu as $row){
						// Tra lai tat ca cac Menu cha
						echo '<li><a href="'.base_url().'admin/menu/edit/'.$row['id'].'" >'.$row['name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'admin/menu/delete/'.$row['id'].'"><i class="fa fa-remove"></i><a></li>';
						// neu ton tai cac Menu con thi se duoc hien thi
						getSubcategory($row['id']);

					}
					?>
				</ul>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js">
</script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js" type="text/javascript">
</script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript">
</script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/app.js" type="text/javascript">
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/demo.js" type="text/javascript">
</script>
<!-- page script -->
<script type="text/javascript">
	$(function()
		{
			$("#example1").dataTable();
		});
</script>


