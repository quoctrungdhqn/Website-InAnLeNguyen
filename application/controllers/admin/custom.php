<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct(); 
        $this->load->model('Custom_model');
        $this->template->set_template('admin');//Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }

	public function view() {
				
	    $list = $this->Custom_model->getAllCustom();			
		$data['list'] = $list;
		$this->template->write_view("content","admin/custom_list",$data);
		$this->template->render();		
	}
	
	public function edit($id = null)
	{
		if($id === null)
		{
			$data['pageTitle'] = 'Thêm mới';
			
		}
		else
		{
			$data['pageTitle'] = 'Chỉnh sửa';		
			$data['list'] = $this->Custom_model->getCustomInfo($id);
			$data['edit'] = 1;
		}			
		$this->template->write_view("content","admin/custom_edit",$data);
		$this->template->render();
	}
	
    public function saveOrUpdate()
	{
		$id = $this->input->post('id');	
		
		if(!$id) 
		{
			if($this->Custom_model->insertCustom())
			{
				$this->session->set_userdata(array('message' => 'Thêm thành công!'));
				redirect('admin/custom/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Thêm thất bại!'));
				redirect('admin/custom/view/');
			}
		}
		else
		{
			if($this->Custom_model->updateCustom())
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thành công!'));
				redirect('admin/custom/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thất bại!'));
				redirect('admin/custom/view/');
			}
		}
	}
    
    public function delete($id)
    {      
            
        $this->Custom_model->deleteItem($id);       
        
        redirect('admin/custom/view/');
    }
}
?>