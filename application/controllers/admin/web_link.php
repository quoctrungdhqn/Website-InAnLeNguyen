<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_link extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct(); 
        
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model('Web_link_model');
        $this->template->set_template('admin');//Set Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }

	public function view() {
		
		
		$data['page_title'] = 'Quản lý liên kết website';		
	    $list = $this->Web_link_model->getSliders();			
		$data['list'] = $list;
		
		$this->template->write_view("content","admin/web_link/web_link_list",$data);
		$this->template->render();		
	}
	
	public function edit($id = null)
	{
		if($id === null)
		{
			$data['page_title'] = 'Thêm mới';
			
		}
		else
		{
			$data['page_title'] = 'Chỉnh sửa';		
			$data['info'] = $this->Web_link_model->getSlideInfo($id);
			$list = $data['info'];			
		}			
		$this->template->write_view("content","admin/web_link/web_link_edit",$data);
		$this->template->render();
	}
	
    public function save_update()
	{
		$id = $this->input->post('id');	
		$oldPic = $this->input->post('oldImage');//Giữ lại giá trị image cũ khi update
		
		if(!empty($_FILES['image']['name'][0])){
		
		$upload_conf = array(
            'upload_path'   => realpath('./uploads/web_link/'),
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '300000',
            );
    
        $this->upload->initialize( $upload_conf );
    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['image'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;   
            }
        }
        // Unset the useless one ;)
        unset($_FILES['image']);
    
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error 
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();
               // print_r($upload_data);
                $hinh[]= $upload_data['file_name'];
                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    //'width'         => 738,
                    'height'        => 100
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                }
               
            }
      
		
        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }      
       
    }
    	$image = implode(',',$hinh);
    }
    else{
		$image = $oldPic;
		//print_r($image);exit;
	}		
		
		if(!$id) 
		{
			if($this->Web_link_model->insertslide($image))
			{
				$this->session->set_userdata(array('message' => 'Thêm thành công!'));
				redirect('admin/web_link/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Thêm thất bại!'));
				redirect('admin/web_link/view/');
			}
		}
		else
		{
			if($this->Web_link_model->updateslide($image))
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thành công!'));
				redirect('admin/web_link/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thất bại!'));
				redirect('admin/web_link/view/');
			}
		}
	}
    
    public function delete($id)
    {        
            
            $this->Web_link_model->deleteItem($id);       
        
        redirect('admin/web_link/view/');
    }
}
?>