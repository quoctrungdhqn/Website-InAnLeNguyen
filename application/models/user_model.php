<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	function checkLogin($username, $password)
	{
	   $this->db->select('u.*, g.id as gId, g.role, g.groupName');
	   $this->db->join('users_groups g', 'g.id=u.userGroup');	
		$query = $this->db->get_where('users u', array('username' => $username, 'password' => $password));
		
		return $query->row();
	}
	
	function getAllUsers()
	{
	
		$this->db->select('u.*, g.groupName');
		$this->db->join('users_groups AS g', 'u.userGroup=g.id');
		$this->db->order_by('userGroup', 'ASC');
		$query = $this->db->get('users u');
		
		return $query->result();
	}
	
	function getUserInfo($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		
		return $query->row();
	}
	
	function insertUser($image)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'birthday' => mdate( '%d-%m-%Y', strtotime($this->input->post('birthday'))),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'userGroup' => $this->input->post('userGroup'),
			'avatar' => $image,
            'createdDate' => date( 'd-m-Y H:i:s')
		);
	
		if($this->db->insert('users', $data))
		{
			return true;
		}
		
		return false;
	}
	
	function updateUser($image)
	{
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'birthday' => mdate( '%Y-%m-%d', strtotime($this->input->post('birthday'))),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'userGroup' => $this->input->post('userGroup'),
			'avatar' => $image
		);
		
		if($password != '')
		{
			$data['password'] = md5($password);
		}
	
		$this->db->where('id', $id);
		if($this->db->update('users', $data))
		{
			return true;
		}
		
		return false;
	}
    
    function removeUser($userid)
    {
        if($this->db->delete('users', array('id' => $userid)))
            return true;
        
        return false;
    }
    
    function getUsersListForDashBoard()
    {
        $this->db->select('id, username, firstname, lastname, createdDate');
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('users');
        
        return $query->result();
    }
}
?>