<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laminations extends CI_Model
{
   var $mst_laminations = "laminations";
	var $mst_categories = "categories";

   public function getLaminations()
	{
		$query = $this->db->select()
			->from($this->mst_laminations)
			->get();
		return $query->result();
	}

	function getLaminationsCategories()
	{
		$query = $this->db->select('*')
			->from('laminations')
			->join('categories', 'laminations.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getLaminationsWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('laminations')
			->join('categories', 'laminations.categories_id = categories.id_categories')
			->where('laminations.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_laminations, $data);
		return TRUE;
	}

	function updateData($id_lamination, $data)
	{
		$this->db->where('id_lamination', $id_lamination);
		$this->db->update($this->mst_laminations, $data);
		return TRUE;
	}

	function deleteData($id_lamination)
	{
		$this->db->where('id_lamination', $id_lamination);
		$this->db->delete($this->mst_laminations);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}