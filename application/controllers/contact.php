<?php
class Contact extends CI_Controller { 
	   
    public function __construct(){
    	
        parent::__construct();       
              
        //chuẩn bị template, load các vị trí
        $this->template->set_template('default');//Set Template group default        
        $this->template->write_view("menu","default/include/menu");
        $this->template->write_view("left","default/include/left");
        $this->template->write_view("right","default/include/right");
        $this->template->write_view("bottom","default/include/bottom");
    } 
   function index()
   {   	
   		$data['list'] = "";
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/contact/index",$data);
		$this->template->render();	
   }
   function send()
   {   	
   		$data['list'] = "";
   		if($this->input->post('btnSend')){
   			
			$this->load->helper(array('form','url'));
			$config = array(
				'protocol' => 'smtp',
				'smtp_host'=> 'ssl://smtp.googlemail.com',
				'smtp_port'=> '465',
				'smtp_user'=> 'fireroxlv@gmail.com',
				'smtp_pass'=> '19081989'
			);

			//if ($this->form_validation->run() != FALSE){
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			$message = "<div><h3>Thông tin khách hàng</h3><div>Tên khách hàng : ".$this->input->post('name')."</div><div>Địa chỉ email : ".$this->input->post('email')."</div><div>Điện thoại : ".$this->input->post('hotline')."</div><div>Địa chỉ : ".$this->input->post('address')."</div>";
			$message .= $this->input->post('message');
			$message .= "</div>";
			$message .= "
			<style>
			.table-bordered {
			border: 1px solid #ddd;
			}
			table {
			background-color: transparent;
			max-width: 100%;
			}
			</style>
			";
			$this->email->from($this->input->post('email'), $this->input->post('title'));
			$this->email->to('hieund@firerox.org');			
			$this->email->subject('Thư liên hệ từ transinex');
			$this->email->message($message);
			if($this->email->send())
			{
				$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>Mail sent. Thanks !</div>');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		//truyền dữ liệu ra form
		$this->template->write_view("header","default/include/header",$data);
		$this->template->write_view("content","default/contact/index",$data);
		$this->template->render();	
   }
   
}
?>