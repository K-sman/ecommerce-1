<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cartsitems extends CI_Model
{
   var $mst_cartsitems = "cartsitems";	

   public function getCarts()
	{
		$query = $this->db->select()
			->from($this->mst_cartsitems)
			->get();
		return $query->result();
	}	

	function insertData($data)
	{
		$this->db->insert($this->mst_cartsitems, $data);
		return $this->db->insert_id();
	}	

	function deleteData($id_cartsitem)
	{
		$this->db->where('id_cartsitem', $id_cartsitem);
		$this->db->delete($this->mst_cartsitems);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}