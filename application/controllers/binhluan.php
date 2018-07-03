<?php
	class Binhluan extends CI_Controller { 
	   
    public function __construct(){
    	
        parent::__construct(); 
        $this->load->helper(array("url","text")); 
        $this->load->model('Binhluan_model');
        $this->load->model('News_model');  
        $this->load->library("cart");    
        //chuẩn bị template, load các vị trí
        $this->template->set_template('default');//Set Template group default        
        $this->template->write_view("menu","default/include/menu");
        $this->template->write_view("left","default/include/left");
        $this->template->write_view("right","default/include/right");
        $this->template->write_view("bottom","default/include/bottom");
    }

       public function bluan(){	
    		
			if($this->input->post('btnSend')){
				
				$this->load->helper(array('form', 'url'));				
				$config = array(
	                'protocol' => 'smtp',
	                'smtp_host' => 'ssl://smtp.googlemail.com',
	                'smtp_port' => '465',
	                'smtp_user' => 'fireroxlv@gmail.com',
	                'smtp_pass' => '19081989'
	      			  );
				
				//if ($this->form_validation->run() != FALSE){
					$this->load->library('email', $config);
		            $this->email->set_newline("\r\n");                                
		            $config['mailtype'] = 'html';
		            $this->email->initialize($config);
		           		
		            $message = "<div><h3>Thông tin bình luận</h3><div>Họ và tên : ".$this->input->post('namecm')."</div><div>Nội dung bình luận : ".$this->input->post('noidungcm')."</div>";
		           
		            $message.= "</div>";
		            $message.="
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
		      		$this->email->from($this->input->post('email'), $this->input->post('name'));
		            $this->email->to('anhvinh118@gmail.com');
		            // $this->email->cc('info@firerox.org');		   
		            $this->email->subject('nội dung bình luận từ web đại học quy nhơn');		
		            $this->email->message($message);
		            //Chuẩn bị dữ liệu lưu đơn hàng xuống db
		            $data = array(
					'namecm' => $this->input->post('namecm'),					
					'noidungcm' => $this->input->post('noidungcm'),	
					'published' => ('0'),	
					'articlesId' => $this->input->post('id')			
					/*'customer_phone' => $this->input->post('phone'),
					'customer_address' => $this->input->post('address'),					
					'customer_info' => $this->input->post('info'),
					'date_order' => date('Y-m-d H:i:s'),
					'user_id' => $this->input->post('user_id'),
					'detail' => $this->input->post('detail')	*/	            
				);                        		
		           		//Nếu gửi mail và lưu xuống db thành công
		           		if($this->email->send() && $this->db->insert('comment', $data)){
						//Xóa giỏ hàng
			        	$this->cart->destroy();
			        	$this->template->write_view("content","default/checkout_success");
			        	redirect('home');
			        }
			        else
			        {
			            show_error($this->email->print_debugger());
			        }
				//}			
				
			}
			$data = $this->cart->contents();
			//truyền dữ liệu ra form
			
			$this->template->render();
		}
		}
?>
