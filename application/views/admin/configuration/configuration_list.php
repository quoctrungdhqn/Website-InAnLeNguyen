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
                                    <h3 class="box-title">Cấu hình <!--<button onclick="location.href='<?php echo base_url()?>admin/configuration/edit'" class="btn btn-primary btn-sm">Thêm mới</button>--></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Thứ tự</th>                                                
                                                <th>Mã cấu hình</th>
                                                <th>Tiêu đề</th>
                                                <th>Giá trị</th>
                                                <th>Sửa/Xóa</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list as $config):?>
                                            <tr>
                                            <td><?php echo $count; ?></td>                                               
                                             <td><?php echo $config->code; ?></td>
                                             <td><?php echo $config->title; ?></td>                                                                                    <td><?php echo $config->value; ?></td>
                                             <td>
                                                <a title="Sửa" href="<?php echo base_url(); ?>admin/configuration/edit/<?php echo $config->id;?>"><i class="fa fa-fw fa-edit">sửa</i></a>                                                                          
                                            <a title="Xóa" href="<?php echo base_url(); ?>admin/configuration/delete/<?php echo $config->id;?>"><i class="fa fa-fw fa-ban">xóa</i></a>
                                                </td>                                                
                                            </tr>
                                        <?php $count++; endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                                <th>Thứ tự</th>                                                
                                                <th>Mã cấu hình</th>
                                                <th>Tiêu đề</th>
                                                <th>Giá trị</th>
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


