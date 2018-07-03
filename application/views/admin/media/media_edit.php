 <!-- form start -->
<form role="form" action="<?php echo base_url() ?>admin/media/saveOrUpdate/" method="post" name="form-view" enctype="multipart/form-data">
<div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $pageTitle;?></h3>
                                    
                                </div><!-- /.box-header -->
                               <div>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;&nbsp;
                                        <!--<button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/media/view'">Hủy</button>
                               </div>
                              
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tiêu đề</label>
                                            <input type="text" value="<?php echo @$list->title ?>" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Link liên kết</label>
                                            <input type="text" value="<?php echo @$list->link ?>" class="form-control" id="exampleInputEmail1" placeholder="Link liên kết" name="link">
                                        </div>                                                                           
                                       <div class="form-group">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <input type="file" name="image[]" id="image" multiple=""/>
                                           
                                            <?php                            	
                                    		if(@$list->image != ''){
                                    			$img = explode(',',$list->image);
                                    			/*for($i=0;$i<=count($img);$i++){
        											echo $img[$i];
        										}*/
                                    	?>
                                    			
        										<img src="<?php echo base_url(); ?>uploads/slide/thumb_<?php echo $img[0]; ?>" /> 
        								<?php }?>
                                        </div>
                                      
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;&nbsp;
                                       <!-- <button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/media/view'">Hủy</button>
                                    </div>
                                
                            </div><!-- /.box -->


                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Phần dành cho SEO web</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                   
                                    <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả SEO ..."><?php echo @$list->description; ?></textarea>
                                        </div>                         
                                         <div class="form-group">
                                            <label>Keywords</label>
                                            <textarea class="form-control" name="keyword" rows="3" placeholder="Nhập từ khóa SEO ..."><?php echo @$list->keyword; ?></textarea>
                                        </div>                  
    
                                      
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>
<input type="hidden" name="oldImage" value="<?php echo @$list->image ?>" id="oldImage" />
 <input type="hidden" name="id" value="<?php echo (@$list->id == null) ? 0 : @$list->id ?>" id="avatar_images" />
<input type="hidden" name="ids" value="" />   
</form>
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
        <script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/demo.js" type="text/javascript"></script><?php

?>