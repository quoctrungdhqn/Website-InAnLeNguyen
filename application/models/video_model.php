<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class video_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getvideo()
    {
        $query = $this->db->get('video');
        return $query->result();
    }
	
	function getvideolimit($limit, $start)
    {
		$this->db->order_by('id','DESC');
		$this->db->limit($limit, $start);
        $query = $this->db->get('video');
        return $query->result();
    }
	
    function getvideoInfo($id)
    {

        $result = $this->db->get_where('video', array('id' => $id));

        return $result->row();
    }
    function insertvideo($image)
    {
        $data = array(
            'title' => $this->input->post('title'),
			'title_en' => $this->input->post('title_en'),
            'link'	=> $this->input->post('link'),
            'description' => $this->input->post('description'),'image' => $image
        );

        try
        {
            $this->db->insert('video', $data);
            return true;
        }
        catch(exception $ex)
        {
            return false;
        }

    }

    function updatevideo($image)
    {
        $data = array(
            'title' => $this->input->post('title'),
			'title_en' => $this->input->post('title_en'),
            'link'	=> $this->input->post('link'),
            'description' => $this->input->post('description'),
            'image' => $image
        );

        $this->db->where('id', $this->input->post('id'));

        $this->db->update('video', $data);
    }

    function deleteItem($id)
    {
        $this->db->where("id", $id);

        try {
            $this->db->delete('video');

            return true;
        }
        catch(Exeption $e)
        {
            return false;
        }
    }
}
?>