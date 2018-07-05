<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slide_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSliders()
    {

        //$this->db->order_by('id',);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('slide');

        return $query->result();
    }

    function getSlideInfo($id)
    {

        $result = $this->db->get_where('slide', array('id' => $id));

        return $result->row();
    }

    function insertSlide($image)
    {
        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link'),
            'image' => $image
        );

        if ($this->db->insert('slide', $data)) {
            return true;
        }
        return false;
    }

    function updateSlide($image)
    {
        $id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link'),
            'image' => $image
        );

        $this->db->where('id', $id);

        if ($this->db->update('slide', $data)) {
            return true;
        }
        return false;
    }

    function deleteItem($id)
    {
        $this->db->where("id", $id);

        try {
            $this->db->delete('slide');

            return true;
        } catch (Exeption $e) {
            return false;
        }
    }
}

?>