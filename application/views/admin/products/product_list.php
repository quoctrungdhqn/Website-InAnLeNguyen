<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text-muted bootstrap-admin-box-title">
				Quản lý mẫu web
				<a href="<?php echo base_url()?>admin/product/edit" title="Click vào để thêm mới" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
			</div>
		</div>
		<?php echo $this->session->flashdata('message');?>
		<div class="bootstrap-admin-panel-content">
			<table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>  
                        <th>SP trang chủ</th>                      
                        <th>Bật/Tắt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list as $product):?>
                    <tr class="odd gradeX">
	                    <td>	                    
	                    <a title="Sửa" href="<?php echo base_url(); ?>admin/product/edit/<?php echo $product->id;?>"><?php echo $product->title; ?></a>
	                    </td>	
	                     <td align="center">

                                                	<?php                            	

                                            		if(@$product->image != ''){

                                            			$img = explode(',',$product->image);

                                            			

                                                	?>                                           			

                									<a title="Sửa" href="<?php echo base_url(); ?>admin/product/edit/<?php echo $product->id;?>"><img width="50" height="50" src="<?php echo base_url(); ?>uploads/product/<?php echo $img[0]; ?>" /></a> 

                								<?php }else{?>

                								    <a title="Sửa" href="<?php echo base_url(); ?>admin/product/edit/<?php echo $product->id;?>"><img width="50" height="50" src="<?php echo base_url(); ?>uploads/no_image.jpg" /></a> 

                								<?php }?>

                                             </td>      
                                             <td>
	                    	<?php
	                    		if($product->new == '1')
	                    		{
									echo "<a class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Bật</a>";
								}
								else
								{
									echo "<a class='btn btn-warning'><i class='glyphicon glyphicon-off'></i> Tắt</a>";
								}
	                    	?>
	                    </td>              
	                    <td>
	                    	<?php
	                    		if($product->published == '1')
	                    		{
									echo "<a class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Bật</a>";
								}
								else
								{
									echo "<a class='btn btn-warning'><i class='glyphicon glyphicon-off'></i> Tắt</a>";
								}
	                    	?>
	                    </td>
	                    <td class="actions">	                        
	                            <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>admin/product/edit/<?php echo $product->id;?>">
	                                <i class="glyphicon glyphicon-pencil"></i>
	                                Sửa
	                            </a>
	                                               
	                        <a class="btn btn-sm btn-danger" href="<?php echo base_url()?>admin/product/delete/<?php echo $product->id;?>">	                            
	                                <i class="glyphicon glyphicon-trash"></i>
	                                Xóa	                            
	                        </a>
                        </td>
                    </tr>
                 <?php endforeach; ?>
                </tbody>
            </table>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/twitter-bootstrap-hover-dropdown.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap-admin-theme-change-size.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/datatables/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/DT_bootstrap.js">
</script>
<script type="text/javascript">
            $(function() { 
            	$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
				    $(".alert-success").alert('close');
				});
            });
</script>