 <!-- form start -->
<form role="form" action="<?php echo base_url() ?>admin/pages/save_update/" method="post" name="form-view" enctype="multipart/form-data">
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
                                       <!-- <button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/pages/view'">Hủy</button>
                               </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tiêu đề</label>
                                            <input type="text" value="<?php echo @$pages->title ?>" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tiêu đề EN</label>
                                            <input type="text" value="<?php echo @$pages->title_en ?>" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title_en">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alias</label>
                                            <input type="text" value="<?php echo @$pages->alias ?>" class="form-control" id="exampleInputPassword1" placeholder="Alias tự sinh không cần nhập" name="alias">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alias EN</label>
                                            <input type="text" value="<?php echo @$pages->alias_en ?>" class="form-control" id="exampleInputPassword1" placeholder="Alias tự sinh không cần nhập" name="alias_en">
                                        </div>                                      
                                       
                                        <div class="radio">
                                                <label>
                                                    <input type="radio" name="published" id="state" value="1" <?php if(@$pages->published == '1') echo set_radio('published', '1', TRUE); ?> />
                                                    Hiển thị
                                                </label>&nbsp;&nbsp;
                                                 <label>
                                                    <input type="radio" name="published" id="state2" value="0" <?php if(@$pages->published == '0') echo set_radio('published', '0', TRUE); ?> />
                                                   ẩn
                                                </label>
                                            </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;&nbsp;
                                        <!--<button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/pages/view'">Hủy</button>
                                    </div>
                                
                            </div><!-- /.box -->


                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $pageTitle;?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                   
                                    <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="seo_description" rows="3" placeholder="Nhập mô tả SEO ..."><?php echo @$pages->seo_description; ?></textarea>
                                        </div>                         
                                         <div class="form-group">
                                            <label>Keywords</label>
                                            <textarea class="form-control" name="seo_keyword" rows="3" placeholder="Nhập từ khóa SEO ..."><?php echo @$pages->seo_keyword; ?></textarea>
                                        </div>                  
                                       
                                        </div>
                                      
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                             <div class="col-md-12">
                                 <div class="form-group">
                                          <label>Nội dung</label>  
                                            
                                                <textarea id="editor1" class="tinymcefull" name="detail" rows="10" cols="80">
                                                    <?php echo @$pages->detail; ?>
                                                </textarea>                                           
                                  </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="form-group">
                                          <label>Nội dung EN</label>  
                                            
                                                <textarea id="editor1" class="tinymcefull" name="detail_en" rows="10" cols="80">
                                                    <?php echo @$pages->detail_en; ?>
                                                </textarea>                                           
                                  </div>
                            </div>
                           
                        </div><!--/.col (right) -->
                    </div>
    <input type="hidden" name="old_image" value="<?php echo @$pages->introImage ?>" id="old_image" />
	<input type="hidden" name="id" value="<?php echo (@$pages->id == null) ? 0 : @$pages->id ?>" id="avatar_images" />
	<input type="hidden" name="ids" value="" /> 
</form>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>        
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/demo.js" type="text/javascript"></script>
        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
          
              
        <script src="<?php echo base_url(); ?>root/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        tinymce.init({
        selector: "textarea.tinymcefull",theme: "modern",
        plugins: [
        "code",
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager",
             "code"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | fontselect | fontsizeselect",
       toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
       image_advtab: true ,
       relative_urls: false,       
       external_filemanager_path:"<?php echo base_url(); ?>filemanager/",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "<?php echo base_url(); ?>filemanager/plugin.min.js"}
     });
        </script>

       
        
       