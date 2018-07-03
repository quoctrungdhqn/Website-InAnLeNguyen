<div class="col-lg-12">
	<div class="panel panel-default bootstrap-admin-no-table-panel">
	    <div class="panel-heading">
	        <div class="text-muted bootstrap-admin-box-title"><?php echo $pageTitle;?></div>
	    </div>
	<form class="form-horizontal" role="form" action="<?php echo base_url() ?>admin/custom/saveOrUpdate/" method="post" name="form-view" enctype="multipart/form-data">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $pageTitle;?></h3>
                                    
                                </div><!-- /.box-header -->
                               <div>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;&nbsp;
                                        <!--<button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/custom/view'">Hủy</button>
                               </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tiêu đề</label>                                       
                                            <input type="text" value="<?php echo @$list->title ?>" class="form-control" id="exampleInputEmail1" <?php if(@$edit==1)?> placeholder="Tiêu đề" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã cấu hình</label>                                                                      <input type="text" value="<?php echo @$list->slug ?>" class="form-control" id="exampleInputEmail1" <?php if(@$edit==1) ?> placeholder="Mã cấu hình" name="slug">
                                            
                                        </div>
                                      <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="tinymcefull" name="content" rows="7" placeholder="Nhập giá trị ..."><?php echo @$list->content; ?></textarea>
                                        </div>                
                                          
                                       
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;&nbsp;
                                       <!-- <button type="button" class="btn btn-success">Lưu & thêm mới</button>&nbsp;&nbsp;-->
                                        <button type="button" class="btn btn-danger"onclick="location.href='<?php echo base_url()?>admin/custom/view'">Hủy</button>
                                    </div>
                                
                            </div><!-- /.box -->


                        </div><!--/.col (left) -->
                        <!-- right column -->

 <input type="hidden" name="id" value="<?php echo (@$list->id == null) ? 0 : @$list->id ?>" id="avatar_images" />
<input type="hidden" name="ids" value="" />   
    </form>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap-admin-theme-change-size.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/selectize/dist/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/twitter-bootstrap-wizard/jquery.bootstrap.wizard-for.bootstrap3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/vendors/boostrap3-typeahead/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
	$(function() { 	
	    $('#myTab a:first').tab('show');
	    $('.datepicker').datepicker();
	    $('.uniform_on').uniform();
	    $('.chzn-select').chosen();
	    $('.selectize-select').selectize();                
	});
</script>
<script src="<?php echo base_url(); ?>tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
        tinymce.init({
        selector: "textarea.tinymcefull",theme: "modern",
        plugins: [
        "code",
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
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