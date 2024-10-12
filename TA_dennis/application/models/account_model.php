<?php

	/**
	* 
	*/
	class Account_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function simpan($table, $data)
		{
			$this->db->insert($table, $data);
		}

		function getuser($user)
		{ 
			$this->db->where('username', $user['username']);
			$this->db->where('password', $user['password']);
			$this->db->from('user');
			$this->db->select('*');
			$sql = $this->db->get();
			if ($sql->num_rows() > 0) {
				return $sql->result();
			}
			else{
				return '';
			}
		}

		function ambilsession($data)
		{
			$this->db->where('username', $data['username']);
			$this->db->where('password', $data['password']);
			$this->db->from('user');
			$this->db->select('*');
			$sql = $this->db->get();
			if ($sql->num_rows() > 0) {
				foreach ($sql->result() as $row) {
					$this->username = $data['username'];
				}
			}
		}
	}
?>