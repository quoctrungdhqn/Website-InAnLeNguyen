<?php 
/**
* @author: dinhhieu67@gmail.com
* @link : http://www.dinhhieu.name.vn
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct();
        
        $this->load->library('upload');
        $this->load->library('image_lib');
 		$this->load->model('Event_Model'); 		
        //chuẩn bị template, load các vị trí
        $this->template->set_template('admin');//Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }

	public function view($message = null) {	
		
		$data['page_title'] = 'Danh sách';
		$list = $this->Event_Model->get_all_items();			
		$data['list'] = $list;
		$this->template->write_view("content","admin/event/event_list",$data);
		$this->template->render();		
	}
	
	public function edit($id = null)
	{		
		
		if($id === null)
		{
			$data['page_title'] = 'Thêm mới event';			
		}
		else
		{
			$data['page_title'] = 'Chỉnh sửa event';					
			$data['info'] = $this->Event_Model->get_items_info($id);
		}				  	
		//truyền dữ liệu ra form
		$this->template->write_view("content","admin/event/event_edit",$data);
		$this->template->render();
	}
	
	public function save_update()
	{
		$id = $this->input->post('id');		
		$oldPic = $this->input->post('old_image');//Giữ lại giá trị image cũ khi update
		
		if(!empty($_FILES['images']['name'][0])){
		
		$upload_conf = array(
            'upload_path'   => realpath('./uploads/event/'),
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '30000',
            );
    
        $this->upload->initialize( $upload_conf );
    
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
                $hinh[]= $upload_data['file_name'];
                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'width'         => 300,
                    'height'        => 150
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
	    else
	    {
			$image = $oldPic;		
		}
				
		if(!$id) //Thêm 1 sản phẩm mới
		{
			if($this->Event_Model->insert($image))
			{
				
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thành công !</div>');
				redirect('admin/event/view/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thất bại !</div>');
				redirect('admin/event/view/');
			}
		}
		else //Cập nhật sản phẩm
		{
			if($this->Event_Model->update($image))
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thành công !</div>');
				redirect('admin/event/view/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Lưu dữ liệu thất bại !</div>');
				redirect('admin/event/view/');
			}
		}
		
		
	}
    
   public function delete($id)
	{
		
		if($this->Event_Model->delete($id))
		{
			$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Dữ liệu đã được xóa !</div>');
			redirect('admin/event/view/');
		}
		else
		{
			$this->session->set_flashdata('message', '<div role="alert" class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>Xóa thất bại !</div>');
			redirect('admin/event/view/');
		}
	}
}
?>