
<div class="content">
 <div class="l_ct">

    <div class="block_k">

        <h4 class="title_bk">Tư vấn bảo vệ</h4><!-- End .title_bk -->

		<?php echo $tuvan->content ;?>
    </div><!-- End .block_k -->

    <div class="block_k">

        <h4 class="title_bk">Các chi nhánh</h4><!-- End .title_bk -->
		<?php echo $chinhanh->content ;?>
        

    </div><!-- End .block_k -->

</div><!-- End .l_ct -->
<div class="c_ct2">
    <div class="block_k" style="padding-bottom: 0px;">
        <h4 class="title_cct">Video</h4><!-- End .title_cct -->
        <div class="main_news_cct">
            <div class="kh_tl">
                <ul>
                   <?php $i=0; 
                 foreach($videoct as $item){ 
					if(@$item->image != ''){
                      $img = explode(',',$item->image);
				?> 
                  <li>
                        <div class="img_kh_tl">
                            <span>
                                <a title="<?php echo $item->title; ?>" href="http://www.youtube.com/embed/<?php echo $item->link; ?>?rel=0&amp;wmode=transparent" class="youtube cboxElement">
                                    <img alt="<?php echo $item->title; ?>" src="<?php echo base_url(); ?>uploads/slide/thumb_<?php echo $img[0]; ?>">
                                </a>
                            </span>
                        </div><!-- End .img_kh_tl -->
                        <h4><?php echo $item->title; ?></h4>
                    </li>     
		<?php $i++; }?>
 		<?php } ?>               
                </ul>
                <div class="clear"></div>
                <div class="frame_phantrang">
                    <div class="PageNum">
                                            </div>
                    <div class="clear"></div>
                </div><!-- End .frame_phantrang -->
            </div><!-- End .kh_tl -->
        </div><!-- End .main_news_cct -->
    </div><!-- End .block_k -->
</div><!-- End .c_ct2 -->                <div class="clear"></div>
            </div>