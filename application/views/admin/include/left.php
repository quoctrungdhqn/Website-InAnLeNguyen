<?php 
	$CI =& get_instance();									    
    $CI->load->model('News_model');
    $CI->load->model('News_category_model');
    $total_news = $CI->News_model->get_items_num();	
    $total_news_cat = $CI->News_category_model->get_items_num();							
?>
<div class="col-md-2 bootstrap-admin-col-left">
                    <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                        <li>
                            <a href="<?php echo base_url()?>admin/configuration/view"><i class="glyphicon glyphicon-chevron-right"></i> Cấu hình website</a>
                        </li>                                        
                        
                        <li>
                            <a href="<?php echo base_url()?>admin/news/view"><span class="badge pull-right"><!--<?php echo $total_news;?>--></span> Bài viết</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admin/news_category/view"><span class="badge pull-right"><!--<?php echo $total_news_cat;?>--></span> Danh mục bài viết</a>
                        </li> <li>
                            <a href="<?php echo base_url()?>admin/product/view"><span class="badge pull-right"></span> Tour</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admin/product_category/view"><span class="badge pull-right"></span> Danh mục tour</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url()?>admin/slide/view"><span class="badge pull-right"></span> Quản lý slide</a>
                        </li>
						
						<li>
                            <a href="<?php echo base_url()?>admin/video/view"><span class="badge pull-right"></span> Quản lý video</a>
                        </li>
                       
					   <li>
                            <a href="<?php echo base_url()?>admin/page/view"><span class="badge pull-right"></span> Quản lý trang</a>
                        </li>
                        <!--<li>
                            <a href="<?php echo base_url()?>admin/gallery_category/view"><i class="glyphicon glyphicon-chevron-right"></i> Danh mục hình ảnh</a>
                        </li>-->
<!--                        <li>
                           <a href="<?php echo base_url()?>admin/gallery/view"><i class="glyphicon glyphicon-chevron-right"></i> Hình ảnh/Slide</a>
                        </li>-->
                        <!--<li>
                           <a href="<?php echo base_url()?>admin/gallery/view"><i class="glyphicon glyphicon-chevron-right"></i> Thư viện video</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admin/download/view"><i class="glyphicon glyphicon-chevron-right"></i> Văn bản</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url()?>admin/binhluan/view"><i class="glyphicon glyphicon-chevron-right"></i> Quản lý bình luận</a>
                        </li>-->
                                                <li>
                           <a href="<?php echo base_url()?>admin/custom/view"><i class="glyphicon glyphicon-chevron-right"></i>Module tùy chọn html</a>
                        </li>
                       <!-- <li>
                            <a href="<?php echo base_url()?>admin/event/view"><i class="glyphicon glyphicon-chevron-right"></i> Sự kiện</a>
                        </li>-->
                      
                       <!-- <li>
                            <a href="#"><span class="badge pull-right">4,231</span> Logs</a>
                        </li>-->
                    </ul>
                </div>