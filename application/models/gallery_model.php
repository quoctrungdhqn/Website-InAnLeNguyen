<?php
/**
* @author: dinhhieu67@gmail.com
* @link : http://www.dinhhieu.name.vn
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_Model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->table_name = 'gallery';
    }
	
	function get_all_items()
	{
		$this->db->order_by('id', 'ASC');		
		$result = $this->db->get($this->table_name);
		
		return $result->result();
	}
	
	function get_items_info($id)
	{
		$result = $this->db->get_where($this->table_name, array('id' => $id));
		
		return $result->row();
	}
		function get_items_home()
	{
		$this->db->order_by('p.title', 'ASC');
		$this->db->where('p.published','1');
		$this->db->limit('3');
		$this->db->where('p.fontpage','1');
		$this->db->join('gallery_category c', 'p.id_category = c.id', 'left');
		$this->db->select('p.*, c.title as catTitle');
		$result = $this->db->get('gallery p');
		
		return $result->result();
	}
    
    function get_items_alias($alias)
	{
		$result = $this->db->get_where($this->table_name, array('alias' => $alias));
		
		return $result->row();
	}
	
	function get_items_num()
	{
		$result = $this->db->get($this->table_name);
		
		return $result->num_rows();
	}	
	
	function insert($image)
	{
		$user = $this->session->userdata('userLogged');
		$data = array(
			'created' => date( 'Y-m-d H:i:s'),
			'created_by' => $user->id,
			'title' => $this->input->post('title'),
			'link' => $this->input->post('link'),
			'alias' => mb_strtolower(url_title(removesign($this->input->post('title')))),			
			'images' => $image,
			'detail' => $this->input->post('detail'),
			'ordering' => $this->input->post('ordering'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_keyword' => $this->input->post('seo_keyword'),
			'seo_description' => $this->input->post('seo_description'),
			'published' => $this->input->post('published'),
			'fontpage' => $this->input->post('fontpage')
		);
		
		if($this->db->insert($this->table_name, $data))
		{
			return true;
		}
		
		return false;
	}
	
	function update($image)
	{
		$user = $this->session->userdata('userLogged');
		$id = $this->input->post('id');
		$data = array(
			'modified' => date( 'Y-m-d H:i:s'),
			'modified_by' => $user->id,
			'title' => $this->input->post('title'),
			'alias' => mb_strtolower(url_title(removesign($this->input->post('title')))),			
			'images' => $image,
			'detail' => $this->input->post('detail'),
			'link' => $this->input->post('link'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_keyword' => $this->input->post('seo_keyword'),
			'seo_description' => $this->input->post('seo_description'),
			'ordering' => $this->input->post('ordering'),
			'published' => $this->input->post('published'),
			'fontpage' => $this->input->post('fontpage')
		);
		
		$this->db->where('id', $id);
		
		if($this->db->update($this->table_name, $data))
		{
			return true;
		}
		
		return false;
	}
	
	function published($id, $state)
	{
		$this->db->where('id' , $id);
		$data = array('state' => $state);
		
		if($this->db->update($this->table_name, $data))
		{
			return true;
		}
		
		return false;
	}	
	
	
	function delete_all()
	{
		$ids = $this->input->post('ids');
		$this->db->where("id IN $ids");
		
		try {
			$this->db->delete($this->table_name);
			
			return true;
		}
		catch(Exeption $e)
		{
			return false;
		}
	}
	
	function delete($id)
	{
		$this->db->where("id", $id);
		
		try {
			$this->db->delete($this->table_name);
			
			return true;
		}
		catch(Exeption $e)
		{
			return false;
		}
	}   
  
}
?>