<?php
class Event extends CI_Controller { 
	   
    public function __construct(){
    	
        parent::__construct();       
        
        $this->load->model('Event_Model');      
        //chuẩn bị template, load các vị trí
        $this->template->set_template('default');//Set Template group default        
        $this->template->write_view("menu","default/include/menu");
        $this->template->write_view("left","default/include/left");
        $this->template->write_view("right","default/include/right");
        $this->template->write_view("bottom","default/include/bottom");
    } 
   function index()
   {   	
   		$data['list_all'] = $this->Event_Model->get_all_items();
   		$data['list_upcomming'] = $this->Event_Model->get_items_type(1);   		
   		$data['list_archive'] = $this->Event_Model->get_items_type(2);
   		//print_r($data['list_archive']);exit;
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/event/event_list",$data);
		$this->template->render();	
   }
   
}
?>