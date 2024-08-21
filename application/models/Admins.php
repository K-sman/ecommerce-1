<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends CI_Model
{
   var $mst_admins = "admins";

   function check($data)
	{
		return $this->db->get_where($this->mst_admins, $data);
	}

	public function getAdmin($username)
	{
		$query = $this->db->select()
			->from($this->mst_admins)
			->where('username', $username)
			->get();
		return $query->result();
	}

	public function getDataWhere($id)
	{
		$query = $this->db->select()
			->from($this->mst_admins)
			->where('id', $id)
			->get();
		return $query->result();
	}

	function updateData($id_admin, $data)
	{
		$this->db->where('id', $id_admin);
		$this->db->update($this->mst_admins, $data);
		return TRUE;
	}

}