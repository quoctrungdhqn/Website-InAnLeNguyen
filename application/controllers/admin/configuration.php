<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct(); 
        $this->load->model('Configuration_Model');
        $this->template->set_template('admin');//Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }
		public function view($message = null) {
				
	    $list = $this->Configuration_Model->getAllConfiguration();			
		$data['list'] = $list;
		$this->template->write_view("content","admin/configuration/configuration_list",$data);
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
			$data['list'] = $this->Configuration_Model->getConfigurationInfo($id);
			$data['edit'] = 1;
		}			
		$this->template->write_view("content","admin/configuration/configuration_edit",$data);
		$this->template->render();
	}
	
    public function saveOrUpdate()
	{
		$id = $this->input->post('id');	
		
		if(!$id) 
		{
			if($this->Configuration_Model->insertConfiguration())
			{
				$this->session->set_userdata(array('message' => 'Thêm thành công!'));
				redirect('admin/configuration/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Thêm thất bại!'));
				redirect('admin/configuration/view/');
			}
		}
		else
		{
			if($this->Configuration_Model->updateConfiguration())
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thành công!'));
				redirect('admin/configuration/view/');
			}
			else
			{
				$this->session->set_userdata(array('message' => 'Cập nhật thất bại!'));
				redirect('admin/configuration/view/');
			}
		}
	}
    
    public function delete($id)
    {       
            
        $this->Configuration_Model->delete($id);      
        
        redirect('admin/configuration/view/');
    }
    
   
}
?>