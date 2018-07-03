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
                                    <h3 class="box-title">Module tùy chọn html <!--<button onclick="location.href='<?php echo base_url()?>admin/custom/edit'" class="btn btn-primary btn-sm">Thêm mới</button>--></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Thứ tự</th>  
                                                <th>Tiêu đề</th>                                               
                                                <th>Mã cấu hình</th>                                                                              
                                                <th>Sửa/Xóa</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list as $items):?>
                                            <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><a href="<?php echo base_url()?>admin/custom/edit/<?php echo $items->id;?>"><?php echo $items->title; ?></a></td>                                                                                
                                             <td><?php echo $items->slug; ?></td>
                                                                                            	 
                                             <td>
                                                <a class="btn btn-sm btn-primary" title="Sửa" href="<?php echo base_url(); ?>admin/custom/edit/<?php echo $items->id;?>"><i class="glyphicon glyphicon-pencil"></i>Sửa</a>                                                                          
                                            <a class="btn btn-sm btn-primary" title="Xóa" href="<?php echo base_url(); ?>admin/custom/delete/<?php echo $items->id;?>"><i class="glyphicon glyphicon-pencil"></i>Xóa</a>
                                                </td>                                                
                                            </tr>
                                        <?php $count++; endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                                <th>Thứ tự</th> 
                                                <th>Tiêu đề</th>                                               
                                                <th>Mã cấu hình</th>                                                                       
                                                <th>Sửa/Xóa</th>  
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();                
            });
        </script>


