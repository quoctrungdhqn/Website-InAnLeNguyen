<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Binhluan extends CI_Controller {
	
	public function __construct(){ 
	   	
        parent::__construct(); 
        $this->load->model('Binhluan_model');
        $this->table_name = 'comment';
        $this->template->set_template('admin');//Template group admin
        $this->template->write_view("header","admin/include/header");
        $this->template->write_view("menu","admin/include/menu");
        $this->template->write_view("left","admin/include/left");
        $this->template->write_view("right","admin/include/right");
        $this->template->write_view("bottom","admin/include/bottom");
    }

	public function view() {		
		$data['list'] = $this->Binhluan_model->getBluan();	
		$this->template->write_view("content","admin/comments/binhluan",$data);
		$this->template->render();		
	}	
	
    public function delete($id)
    {
        if($this->Binhluan_model->deleteItem($id))
        {            
             redirect('admin/binhluan/view/');
        }     
       
    }
        public function update(){  
   	    $id = $this->uri->segment('4');
   	    $published = $this->uri->segment('5');   	   
				$data = array(			
				'published' => $published
				);
			
			$this->db->where('id', $id);
			$this->db->update($this->table_name, $data);
		  	//print_r($data);exit;   
    	
		redirect('admin/binhluan/view');
		//$this->template->write_view("content","admin/product_list",$data);
		//$this->template->render();
	}

}
?>