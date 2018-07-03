<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Link_Model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	function getSliders()
	{
		
		$query = $this->db->get('web_link');
		
		return $query->result();
	}
	function getSlideInfo($id)
	{
		
		$result = $this->db->get_where('web_link', array('id' => $id));
		
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
			$this->db->insert('web_link', $data);
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
		
		$this->db->update('web_link', $data);
	}
	
	function deleteItem($id)
	{
		$this->db->where("id", $id);
		
		try {
			$this->db->delete('web_link');
			
			return true;
		}
		catch(Exeption $e)
		{
			return false;
		}
	}
}
?>