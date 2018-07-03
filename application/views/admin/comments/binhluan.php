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
                                    <h3 class="box-title">Quản lý bình luận </h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Thứ tự</th>                                                
                                                <th>Họ và tên</th>
                                             	<th>Published</th>
                                                <!--<th>Email</th>
                                                <th>Địa chỉ</th>-->
                                                <!--<th>Lời nhắn</th>-->
                                                <th>Nội dung bình luận</th>   
                                                <th>Xóa</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list as $item):?>
                                            <tr>
                                            <td><?php echo $count; ?></td>                                               											<td><?php echo $item->namecm;?></td>
                                         <td>
                                         	<!--<input name="published" size="5" value="<?php echo $item->published;?>" class="text_area" style="text-align: center;" type="text">
                                         	
                                         	<a title="Bật/Tắt" href="<?php echo base_url(); ?>admin/binhluan/onbinhluan/<?php echo $item->published;?>"><input name="published" size="5" value="<?php echo $item->published;?>" class="text_area" style="text-align: center;" type="text"></a>-->
                     <select id="options" onchange="optionCheck('<?php echo $item->id;?>')" style="width:246px; height:18px;">
									
						<option <?php if($item->published=='0'){
							echo "selected='selected'";
						}
						
						 ?> value="0">Tắt</option>				
						<option <?php if($item->published=='1'){
							echo "selected='selected'";
						}
						
						 ?> value="1">Bật</option>		

					</select>
					
                                         	
                                         	
                                         	
                                         </td>
                                         <td><?php echo $item->noidungcm;?></td>
                                            <!--   <td><?php echo $item->customer_email;?></td>                                                                        	<td><?php echo $item->customer_address;?></td> 	-->						
                                            <!--<td><?php echo $item->customer_info;?></td>--> 
                                            <!--<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $item->id?>">Xem</button>-->
                                            <!-- Modal -->
											<!--<div class="modal fade" id="myModal<?php echo $item->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											  <div class="modal-dialog modal-lg">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											        <h4 class="modal-title" id="myModalLabel">Nội dung bình luận</h4>
											      </div>
											      <div class="modal-body">
											      	<p>Họ và tên : <strong><?php echo $item->namecm;?></strong></p>-->
											      	<!--<p>Điện thoại : <strong><?php echo $item->customer_phone?></strong></p>
											      	<p>Email : <strong><?php echo $item->customer_email?></strong></p>
											      	<p>Địa chỉ : <strong><?php echo $item->customer_address?></strong></p>-->
											      	<!--<p>Nội dung : <strong><?php echo $item->noidungcm?></strong></p>-->
											        <!--<?php echo $item->detail; ?>-->
	<!--										      </div>
											      <div class="modal-footer">
											       
											      </div>
											    </div>
											  </div>
											</div>
                                            </td> -->
                                            <td><a title="Xóa" href="<?php echo base_url(); ?>admin/binhluan/delete/<?php echo $item->id;?>"><i class="fa fa-fw fa-ban">xoa</i></a></td>                                              
                                            </tr>
                                           
                                           
                                        <?php $count++; endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                                <th>Thứ tự</th>                                                
                                                <th>Họ và tên</th>
                                                <th>Published</th>
<!--                                            <th>Điện thoại</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>-->
                                                <!--<th>Lời nhắn</th>-->
                                                <th>Nội dung bình luận</th> 
                                                <th>Xóa</th>  
                                        </tfoot>
                                    </table>
                                    <!-- Button trigger modal -->



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

<script type="text/javascript">
    function optionCheck(id){
        var option = document.getElementById("options").value;
        if(option == "0"){
            window.location = "http://firerox.info/hieund/dhqn/admin/binhluan/update/"+id+"/0";
        }
        if(option == "1"){
            window.location = "http://firerox.info/hieund/dhqn/admin/binhluan/update/"+id+"/1";
        }
    }
</script>
