<?php
	class Gallery extends CI_Controller { 
	   
    public function __construct(){
    	
        parent::__construct(); 
        $this->load->helper(array("url"));
        $this->load->model('Gallery_Model');         
        //chuẩn bị template, load các vị trí
        $this->template->set_template('default');//Set Template group default        
        $this->template->write_view("menu","default/include/menu");
        $this->template->write_view("left","default/include/left");
        $this->template->write_view("right","default/include/right");
        $this->template->write_view("bottom","default/include/bottom");
    } 
  
   public function thuvienvideo() {
		

   		$data['videoct'] = $this->Gallery_Model->get_all_items();  	
   		
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/video/media",$data);
		$this->template->render();
	}
	

}
?>