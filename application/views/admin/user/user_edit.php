<?php
date_default_timezone_set("Asia/Bangkok");
 ?>
<form action="<?php echo base_url() ?>admin/user/saveOrUpdate/" method="post" name="form-view" id="form-view" class="form"  enctype="multipart/form-data">
	<div class="span6">
		<div class="head">
			<div class="isw-ok">
			</div>
			<h1>
				User edit
			</h1>
			<div class="clear">
			</div>
		</div>
		<div class="block-fluid">
			<div class="row-form">
				<div class="span3">
					Họ:
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->lastname ?>" class="validate[required]" type="text" name="lastname" id="lastname"/>					
				</div>
				<div class="clear">
				</div>
			</div>
			<div class="row-form">
				<div class="span3">
					Tên:
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->firstname ?>" class="validate[required]" type="text" name="firstname" id="firstname"/>					
				</div>
				<div class="clear">
				</div>
			</div>		

			<div class="row-form">
				<div class="span3">
					Ngày sinh:
				</div>
				<div class="span9">
					<input value="<?php echo mdate('%m/%d/%Y', strtotime(@$userInfo->birthday)); ?>" class="" type="text" name="birthday" id="birthday"/>
					<span>
						Ví dụ: 06/07/1988
					</span>
				</div>
				<div class="clear">
				</div>
			</div>

			<div class="row-form">
				<div class="span3">
					E-mai(*):
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->email ?>" class="validate[required,custom[email]]" type="text" name="email" id="email" />					
				</div>
				<div class="clear">
				</div>
			</div>
			
			<div class="row-form">
				<div class="span3">
					Điện thoại:
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->phone ?>" class="validate[minSize[9]]" type="text" name="phone" id="phone"/>					
				</div>
				<div class="clear">
				</div>
			</div>
			<div class="row-form">
				<div class="span3">
					Địa chỉ:
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->address ?>" class="" type="text" name="address" id="address"/>					
				</div>
				<div class="clear">
				</div>
			</div>
			
			<div class="row-form">
				<div class="span3">
					Nhóm người dùng:
				</div>
				<div class="span9">
					<?php echo form_dropdown('userGroup', $groupsList, @$userInfo->userGroup) ?>
				</div>
				<div class="clear">
				</div>
			</div>
			 <div class="row-form">
                            <div class="span5">Hình đại diện:</div>
                            <div class="span7">                                                                
                                <input type="file" name="avatar" id="avatar"/>
                            </div>
                            <div class="span7">
                            	<?php 
                            	
                            		if(@$userInfo->avatar != ''){?>
										<img src="<?php echo base_url(); ?><?php echo @$userInfo->avatar; ?>" /> 
								<?php }?>
                            </div>
                            <div class="clear"></div>
                        </div> 
               <div class="row-form">
                            <div class="span5">Trạng thái:</div>
                            <div class="span7">
                                <label class="checkbox inline">
                                    <input type="radio" name="state" disabled="disabled"/> Ẩn
                                </label>
                                <label class="checkbox inline">
                                    <input type="radio" name="state" disabled="disabled" checked="checked"/> Hiện
                                </label>
                            </div>
                            <div class="clear"></div>
                        </div>    
              <div class="row-form"> 
              <div class="controls">
	             
	             	<button type="submit" class="btn">Lưu</button>
	             	<button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url()?>admin/user/view'">Hủy</button>
	            
             </div>
			</div>
		</div>

	</div>
	<div class="span6">
		<div class="head">
			<div class="isw-ok">
			</div>
			<h1>
				User edit
			</h1>
			<div class="clear">
			</div>
		</div>
		<div class="block-fluid">
			<div class="row-form">
				<div class="span3">
					Tên đăng nhập
				</div>
				<div class="span9">
					<input value="<?php echo @$userInfo->username ?>" class="validate[required,maxSize[5]]" type="text" name="password" id="password" <?php echo ($formType == 'add') ? '' : 'disabled="disabled"' ?> required/>				
				</div>
				<div class="clear">
				</div>
			</div>
			<div class="row-form">
				<div class="span3">
					Mật khẩu mới :
				</div>
				<div class="span9">
					<input value="" class="validate[required,minSize[5]]" type="password" name="cofirmpassword" id="cofirmpassword"/>
					<span>
						Để trống nếu không thay đổi
					</span>
				</div>
				<div class="clear">
				</div>
			</div>
			<div class="row-form">
				<div class="span3">
					Xác nhận mật khẩu:
				</div>
				<div class="span9">
					<input value="" class="validate[required,minSize[5]]" type="password" name="password" id="password"/>					
				</div>
				<div class="clear">
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" name="oldImage" value="<?php echo @$userInfo->avatar ?>" id="oldImage" />
		<input type="hidden" name="id" value="<?php echo (@$userInfo->id == null) ? 0 : @$userInfo->id ?>" id="avatar_images" />
		<input type="hidden" name="ids" value="" />
</form>