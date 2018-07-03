<div class="col-lg-12">
	<div class="panel panel-default bootstrap-admin-no-table-panel">
	    <div class="panel-heading">
	        <div class="text-muted bootstrap-admin-box-title">Thêm mới tour</div>
	    </div>
	<form class="form-horizontal" role="form" action="<?php echo base_url() ?>admin/product/save_update/" method="post" name="form-view" enctype="multipart/form-data">
	<div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>		  
		  <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">Thông tin SEO web</a></li>		 
		</ul>
		<div class="tab-content">		
			<div role="tabpanel" class="tab-pane active" id="home">				
                    <fieldset>
                        <legend>
                        	<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    						<a href="<?php echo base_url() ?>admin/product/view/" class="btn btn-default">Hủy</a>
                        </legend>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Tiêu đề </label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nhập tiêu đề" required="" class="form-control col-md-6" name="title" value="<?php echo @$product->title ?>">                
                            </div>
                        </div>
						<!--<div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Tiêu đề_EN </label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nhập tiêu đề" required="" class="form-control col-md-6" name="title_en" value="<?php echo @$product->title_en ?>">                
                            </div>
                        </div> -->
						
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Alias </label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Alias tự sinh không cần nhập" class="form-control col-md-6" name="alias" value="<?php echo @$product->alias ?>">                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Danh mục </label>
                           <div class="col-lg-10">
                                <?php echo form_dropdown('categoryId', $select, @$product->categoryId,'class="form-control"');?>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="fileInput">Hình ảnh</label>
                            <div class="col-lg-10">
                                <input class="form-control uniform_on" id="fileInput" name="image[]" multiple="" type="file">
                                <p class="help-block">Nên nhập tên hình không dấu và không có khoảng trắng.</p>
                                <?php                            	
                                    if(@$product->image != '')
                                    {
                                    	$img = explode(',',$product->image);                                    	
                                ?>
                                    <p><img width="100" height="80" src="<?php echo base_url(); ?>uploads/product/<?php echo $img[0]; ?>" /></p> 
        						<?php } ?>
                                
                            </div>                   
                        </div>
                         <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Giá</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control col-md-6" name="price" value="<?php echo @$product->price ?>" placeholder="Ví dụ nhập: 2500000)" >                
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Thời gian</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="thoigian" value="<?php echo @$product->thoigian; ?>" placeholder="Ví dụ nhập: 2 ngày 1 đêm" >                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Phương tiện</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="phuongtien" value="<?php echo @$product->phuongtien; ?>" placeholder="Ví dụ nhập: Đi về bằng máy bay" >                
                            </div>
                        </div>
                        
						<!--<div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Phương tiện_EN</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="phuongtien_en" value="<?php echo @$product->phuongtien_en; ?>" placeholder="Ví dụ nhập: Đi về bằng máy bay" >                
                            </div>
                        </div> -->
						
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Khởi hành</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="khoihanh" value="<?php echo @$product->khoihanh; ?>" placeholder="Ví dụ nhập: Thứ 5 hàng tuần" >                
                            </div>
                        </div>
						
						<!--<div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Khởi hành_EN</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="khoihanh_en" value="<?php echo @$product->khoihanh_en; ?>" placeholder="Ví dụ nhập: Thứ 5 hàng tuần" >                
                            </div>
                        </div> -->
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="typeahead">Điện thoại liên hệ</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control col-md-6" name="dienthoai" value="<?php echo @$product->dienthoai; ?>" placeholder="Ví dụ nhập: 0944.165577 (khách đoàn) - 0943.165577 (khách lẻ)" >                
                            </div>
                        </div>
                        
                        <div class="form-group">
                              <label class="col-lg-2 control-label" for="fileInput">Tour nổi bật</label>                 
                                    <input type="radio" name="new" id="new" value="1" <?php if(@$product->new == '1') echo set_radio('new', '1', TRUE); ?> />
                                    Hiển thị&nbsp;&nbsp;&nbsp;                                
                                    <input type="radio" name="new" id="new2" value="0" <?php if(@$product->new == '0') echo set_radio('new', '0', TRUE); ?> />
                                   Ẩn                                                
                        </div> 
                        <div class="form-group">
                              <label class="col-lg-2 control-label" for="fileInput">Tour khuyến mãi</label>                 
                                    <input type="radio" name="khuyenmai" id="khuyenmai" value="1" <?php if(@$product->khuyenmai == '1') echo set_radio('khuyenmai', '1', TRUE); ?> />
                                    Hiển thị&nbsp;&nbsp;&nbsp;                                
                                    <input type="radio" name="khuyenmai" id="khuyenmai2" value="0" <?php if(@$product->khuyenmai == '0') echo set_radio('khuyenmai', '0', TRUE); ?> />
                                   Ẩn                                                
                        </div>   
                      	<div class="form-group">
                              <label class="col-lg-2 control-label" for="fileInput">Bật/Tắt</label>                 
                                    <input type="radio" name="published" id="published" value="1" <?php if(@$product->published == '1') echo set_radio('published', '1', TRUE); ?> />
                                    Hiển thị&nbsp;&nbsp;&nbsp;                                
                                    <input type="radio" name="published" id="published2" value="0" <?php if(@$product->published == '0') echo set_radio('published', '0', TRUE); ?> />
                                   Ẩn                                                
                        </div>    
                   
                		   
                	<!--	<label class="col-lg-2 control-label" for="typeahead">Mô tả ngắn </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="5" name="mota"><?php echo @$product->mota; ?></textarea>               
			                </div>
                		</div> -->
						
						<!--<label class="col-lg-2 control-label" for="typeahead">Mô tả ngắn_EN </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="5" name="mota_en"><?php echo @$product->mota_en; ?></textarea>               
			                </div>
                		</div> -->
						
                		<label class="col-lg-2 control-label" for="typeahead">Mô tả chi tiết </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="detail"><?php echo @$product->detail; ?></textarea>               
			                </div>
                		</div>
						
						<!--<label class="col-lg-2 control-label" for="typeahead">Mô tả chi tiết_EN </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="detail_en"><?php echo @$product->detail_en; ?></textarea>               
			                </div>
                		</div> -->
						
                		<label class="col-lg-2 control-label" for="typeahead">Bảng giá</label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="gia"><?php echo @$product->gia; ?></textarea>               
			                </div>
                		</div>
						
						<!--<label class="col-lg-2 control-label" for="typeahead">Bảng giá_EN</label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="gia_en"><?php echo @$product->gia_en; ?></textarea>               
			                </div>
                		</div> -->
						
                		<label class="col-lg-2 control-label" for="typeahead">Điều khoản </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="dieukhoan"><?php echo @$product->dieukhoan; ?></textarea>               
			                </div>
                		</div>
						
						<!--<label class="col-lg-2 control-label" for="typeahead">Điều khoản_EN </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="dieukhoan_en"><?php echo @$product->dieukhoan_en; ?></textarea>               
			                </div>
                		</div> -->
						
                		<label class="col-lg-2 control-label" for="typeahead">Liên hệ </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="lienhe"><?php echo @$product->lienhe; ?></textarea>               
			                </div>
                		</div>
						
						<!--<label class="col-lg-2 control-label" for="typeahead">Liên hệ_EN </label>            		
                		  <div class="form-group">                		   	                
			                <div class="col-lg-12">                                 
			                    <textarea class="tinymcefull" rows="15" name="lienhe_en"><?php echo @$product->lienhe_en; ?></textarea>               
			                </div>
                		</div> -->
						
                    </fieldset>
                      		
			</div>
					   
		    <div role="tabpanel" class="tab-pane" id="seo">
			    <fieldset>
	                <legend><?php echo $page_title;?></legend>
					 <div class="form-group">
			                <label class="col-lg-2 control-label" for="typeahead">SEO title </label>
			                <div class="col-lg-10">                                 
			                    <textarea class="form-control" name="seo_title" rows="3" placeholder="Nhập title SEO ..."><?php echo @$product->seo_title; ?></textarea>               
			                </div>
	                	</div>
	    				<div class="form-group">
			                <label class="col-lg-2 control-label" for="typeahead">SEO keyword </label>
			                <div class="col-lg-10">                                 
			                    <textarea class="form-control" name="seo_keyword" rows="3" placeholder="Nhập keyword SEO ..."><?php echo @$product->seo_keyword; ?></textarea>               
			                </div>
                		</div>
	    				<div class="form-group">
			                <label class="col-lg-2 control-label" for="typeahead">SEO description </label>
			                <div class="col-lg-10">                                 
			                    <textarea class="form-control" name="seo_description" rows="3" placeholder="Nhập description SEO ..."><?php echo @$product->seo_description; ?></textarea>               
			                </div>
                		</div> 
				</fieldset>  
		    </div>	
		    	 
		</div>
	<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    <a href="<?php echo base_url() ?>admin/product/view/" class="btn btn-default">Hủy</a>
	</div>	
	<input type="hidden" name="id" value="<?php echo (@$product->id == null) ? 0 : @$product->id ?>"/>
	<input type="hidden" name="oldImage" value="<?php echo @$img[0]; ?>"/>	
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