<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
	
    public function __construct(){ 
	   	
        parent::__construct();
           
        $this->load->library('upload');
        $this->load->library('image_lib');     
        $this->load->model('Download_Model');   
        //chuẩn bị template, load các vị trí
        $this->template->set_template('admin');//Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }	
	public function view($message = null) {				
		
		$list = $this->Download_Model->get_all_items();
		$data['page_title'] = 'Quản lý tài liệu';			
		$data['list'] = $list;
		$this->template->write_view("content","admin/download/download_list",$data);
		$this->template->render();		
	}
    public function edit($id = null)
	{		
		
		if($id === null)
		{
			$data['page_title'] = 'Thêm mới bài viết';
			$data['formType'] = 'add';
		}
		else
		{
			$data['page_title'] = 'Sửa bài viết';
			$data['formType'] = 'edit';
			
			$data['info'] = $this->Download_Model->get_items_info($id);
		}
		//Lấy dữ liệu danh mục cha
		$this->load->library('mynestedsetmodel', array('tableName' => 'categories'));
		$parent = $this->mynestedsetmodel->getTree(0, 0, @$catid);
		foreach($parent as $item)
		{
			$select[$item->id] = str_repeat('|---', $item->level) . $item->title;
		}
       
        
		$data['select'] = $select;
		//truyền dữ liệu ra form
		$this->template->write_view("content","admin/download/download_edit",$data);
		$this->template->render();
	}
    
    public function save_update()
	{
		$id = $this->input->post('id');		
		$oldPic = $this->input->post('oldImage');//Giữ lại giá trị image cũ khi update
		$_FILES['images']['name'][0] = mb_strtolower(removesign($_FILES['images']['name'][0]));
		if(!empty($_FILES['images']['name'][0])){
		
		$upload_conf = array(
            'upload_path'   => realpath('./uploads/downloads/'),
            'allowed_types' => 'gif|jpg|png|jpeg|bmp|pdf|doc|docx|csv|txt|xsl|xl|xlsx|word',
            'overwrite'       => TRUE,
            'max_size'      => '0',
            );
    
        $this->upload->initialize($upload_conf);
    
        // Change $_FILES to new vars and loop them
      
        foreach($_FILES['images'] as $key=>$val)
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
        unset($_FILES['images']);
    
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
                $hinh[]= mb_strtolower(removesign($upload_data['file_name']));
                $upload_data['file_name'] = mb_strtolower(removesign($upload_data['file_name']));
                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'width'         => 425,
                    'height'        => 247
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
    	$image = mb_strtolower(removesign($image));
    }
    else{
		$image = $oldPic;
		//print_r($image);exit;
	}		
		if(!$id) //Thêm 1 item
		{
			if($this->Download_Model->insert($image))
			{
				
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thành công !</div>');
				redirect('admin/download/view/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thất bại !</div>');
				redirect('admin/download/view/');
			}
		}
		else //Cập nhật 
		{
			if($this->Download_Model->update($image))
			{
				
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thành công !</div>');
				redirect('admin/download/view/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thất bại !</div>');
				redirect('admin/download/view/');
			}
		}
		
		
	}
    
   public function delete($id)
	{	
		
		if($this->Download_Model->delete($id))
		{
			$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Xóa dữ liệu thành công !</div>');
				redirect('admin/download/view/');
		}
		else
		{
			$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Xóa dữ liệu thất bại !</div>');
				redirect('admin/download/view/');
		}
	}
	
}