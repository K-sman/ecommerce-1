<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Model
{
   var $mst_categories = "categories";

   public function getCategories()
	{
		$query = $this->db->select()
			->from($this->mst_categories)			
			->get();
		return $query->result();
	}

	public function getCategoriesWhere()
	{
		$query = $this->db->select()
			->from($this->mst_categories)			
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_categories, $data);
		return TRUE;
	}

	function updateData($id_categories, $data)
	{
		$this->db->where('id_categories', $id_categories);
		$this->db->update($this->mst_categories, $data);
		return TRUE;
	}

	function deleteData($id_categories)
	{
		$this->db->where('id_categories', $id_categories);
		$this->db->delete($this->mst_categories);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}