<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Khach_hang_Model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	function getSliders()
	{
		
		$query = $this->db->get('khach_hang');
		
		return $query->result();
	}
	function getSlideInfo($id)
	{
		
		$result = $this->db->get_where('khach_hang', array('id' => $id));
		
		return $result->row();
	}
	function insertslide($image)
	{
		$data = array(
					'title' => $this->input->post('title'),
			'link'	=> $this->input->post('link'),
			'description' => $this->input->post('description'),
			'image' => $image
		);
		
		try
		{
			$this->db->insert('khach_hang', $data);
			return true;
		}
		catch(exception $ex)
		{
			return false;
		}
		
	}
	
	function updateslide($image)
	{
		$data = array(
			'title' => $this->input->post('title'),
			'link'	=> $this->input->post('link'),
			'description' => $this->input->post('description'),
			'image' => $image
		);
		
		$this->db->where('id', $this->input->post('id'));
		
		$this->db->update('khach_hang', $data);
	}
	
	function deleteItem($id)
	{
		$this->db->where("id", $id);
		
		try {
			$this->db->delete('khach_hang');
			
			return true;
		}
		catch(Exeption $e)
		{
			return false;
		}
	}
}
?>