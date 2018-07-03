<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Binhluan_Model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        
        $this->table_name = 'comment';
    }
	

		 
	function getBluan()
	{
		$this->db->order_by('id', 'DESC');
		//$this->db->where("published=1");
		//$this->db->where('published','1');
		$query = $this->db->get('comment');
		
		return $query->result();
	}
		function getBluan2($id)
		{
			$this->db->order_by('p.id', 'DESC');
			$this->db->join('articles c', 'p.articlesId = c.id', 'left');		
			$this->db->where('p.published','1');
			$this->db->where('p.articlesId', $id);
			$query = $this->db->get('comment p');
			
			return $query->result();
		}
	function deleteItem($id)
	{
		$this->db->where("id", $id);
		
		try {
			$this->db->delete('comment');
			
			return true;
		}
		catch(Exeption $e)
		{
			return false;
		}
	}
	

}
?>