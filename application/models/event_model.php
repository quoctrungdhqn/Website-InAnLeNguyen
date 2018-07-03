<?php
/**
* @author: dinhhieu67@gmail.com
* @link : http://www.dinhhieu.name.vn
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->table_name = 'event';
    }
	
	function get_all_items()
	{
		$this->db->order_by('id', 'DESC');		
		$result = $this->db->get($this->table_name);
		
		return $result->result();
	}
	function get_items_type($id)
	{
		$result = $this->db->get_where($this->table_name, array('type' => $id));
		
		return $result->result();
	}
	function get_items_info($id)
	{
		$result = $this->db->get_where($this->table_name, array('id' => $id));
		
		return $result->row();
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
			'alias' => mb_strtolower(url_title(removesign($this->input->post('title')))),
			//'id_category' => $this->input->post('id_category'),
			'type' => $this->input->post('type'),							
			'images' => $image,
			'detail' => $this->input->post('detail'),
			'ordering' => $this->input->post('ordering'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_keyword' => $this->input->post('seo_keyword'),
			'seo_description' => $this->input->post('seo_description'),
			'published' => $this->input->post('published')
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
			//'id_category' => $this->input->post('id_category'),
			'type' => $this->input->post('type'),						
			'images' => $image,
			'detail' => $this->input->post('detail'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_keyword' => $this->input->post('seo_keyword'),
			'seo_description' => $this->input->post('seo_description'),
			'ordering' => $this->input->post('ordering'),
			'published' => $this->input->post('published')
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