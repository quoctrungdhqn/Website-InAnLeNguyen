<?php
class download extends CI_Controller { 
	   
    public function __construct(){
    	
        parent::__construct();       
        
        $this->load->model('Download_Model');      
        //chuẩn bị template, load các vị trí
        $this->template->set_template('default');//Set Template group default        
        $this->template->write_view("menu","default/include/menu");
        $this->template->write_view("left","default/include/left");
        $this->template->write_view("right","default/include/right");
        $this->template->write_view("bottom","default/include/bottom");
    } 
   function index()
   {   	
   		$data['list'] = $this->Download_Model->get_all_items();   		
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/download/download_list",$data);
		$this->template->render();	
   }
     function detail($alias)
   {   	
   		//$id = $this->uri->segment(3);
   		$data['detail'] = $this->Download_Model->get_items_alias($alias); 
   		//$cat_id = $data['list']->id_category;   		
   		//$data['relative_list'] = $this->News_model->get_items_relative();   		
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/download/download_detail",$data);
		$this->template->render();	
   }
   
}
?>