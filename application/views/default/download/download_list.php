	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text-muted bootstrap-admin-box-title">
				Văn bản
			</div>
		</div>
		
		<div class="bootstrap-admin-panel-content">
			<table width="40%" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr width="100%">
                        <th width="70%">Tên văn bản</th> 
                        <th width="10%">Xem trước</th>
                        <th width="10%">Tải file</th>                       
                        <th width="10%">Ngày tạo</th>                        
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list as $items):?>
                    <tr class="odd gradeX" width="100%">
	                    <td width="70%"><?php echo $items->title;?></td>	   
	                    <td width="10%">
	                    <a target="_blank" href="<?php echo base_url(); ?>download/detail/<?php echo $items->alias ?>"><button type="button" class="btn btn-primary">Xem trước</button>
	                    	</a>
	                    	</td>
	                     <td class="actions" width="10%">	                        
	                           <a href="<?php echo base_url(); ?>uploads/downloads/<?php echo $items->images;?>"><img src="<?php echo base_url(); ?>templates/default/images/img4.jpg"/></a>   
                        </td>                 
	                    <td width="10%"><?php echo date("d/m/Y", strtotime($items->created));?></td>	                    
	                   
                    </tr>
                 <?php endforeach; ?> 
                </tbody>
            </table>
		</div>
	</div>

<!-- Datatables -->
<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>templates/admin/css/DT_bootstrap.css">

<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/datatables/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/DT_bootstrap.js">
</script>
