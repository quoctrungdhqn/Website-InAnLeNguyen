<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct(); 
        $this->template->set_template('admin');//Set Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }

	public function view($message = null) {
				
		$this->load->model('User_model');
		$listUsers = $this->User_model->getAllUsers();			
		$data['list'] = $listUsers;
		$this->template->write_view("content","admin/user_list",$data);
		$this->template->render();		
	}
	
	public function edit($userid = null)
	{
		if($userid === null)
		{
			$data['page_title'] = 'Add Users';
			$data['formType'] = 'add';
		}
		else
		{
			$data['page_title'] = 'Edit Users';
			$data['formType'] = 'edit';
			$this->load->model('User_model');
			$data['userInfo'] = $this->User_model->getUserInfo($userid);
		}
		
		$this->load->model('User_group_model');
		
		$groupsList = $this->User_group_model->getAllUserGroup();
		
		$data['groupsList'] = $groupsList;
		$this->template->write_view("content","admin/user/user_edit",$data);
		$this->template->render();
	}
	
	public function save_update()
	{
		$id = $this->input->post('id');
		$this->load->model('User_model');
		$oldPic = $this->input->post('oldImage');//Giữ lại giá trị image cũ khi update
		
		//Upload image
		if(!empty($_FILES['avatar']['name'])){			
			$config['upload_path'] = './uploads/users/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '1280';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload("avatar")){
	            $image = $oldPic;
	        }else{
	            $image_data = $this->upload->data(); 
	            $image = 'uploads/users/' . $image_data['file_name']; //Lấy đường dẫn cộng tên hình
	            if($oldPic !='') @unlink($oldPic);						
						$imageWidth = $image_data['image_width'];
                        if($imageWidth > 426)//Nếu chiều rộng hình >426px thì resize hình
                        {
                            $this->load->library('image_lib');
                            $config['image_library'] = 'GD2';
                            $config['source_image'] = $image_data['full_path'];
                            $config['quality'] = 75;
                            $config['maintain_ratio'] = TRUE;
                            $config['master_dim'] = 'auto';
                            $config['width'] = 100;
                            $config['height'] = 100;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                        }
	        }
		}
		else{
			$image = $oldPic;
		}
		//End upload image
        
		if(!$id) //Thêm 1 người dùng mới
		{
			if($this->User_model->insertUser($image))
			{
				
				$this->session->set_userdata(array('message' => 'Thêm thành công!'));
				redirect('admin/user/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Thêm thất bại!'));
				redirect('admin/user/view/');
			}
		}
		else //Cập nhật người dùng
		{
			if($this->User_model->updateUser($image))
			{
				
				$this->session->set_userdata(array('message' => 'Cập nhật thành công!'));
				redirect('admin/user/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thất bại!'));
				redirect('admin/user/view/');
			}
		}
	}
    
    public function delete($userid)
    {
        if($userid != 1000)//Không cho xóa super admin
        {
            $this->load->model('User_model');
            $this->User_model->removeUser($userid);
        }
        
        redirect('admin/user/view/');
    }
}
?>