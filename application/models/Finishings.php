<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finishings extends CI_Model
{
   var $mst_finishings = "finishings";
	var $mst_categories = "categories";

   public function getFinishings()
	{
		$query = $this->db->select()
			->from($this->mst_finishings)
			->get();
		return $query->result();
	}

	function getFinishingsCategories()
	{
		$query = $this->db->select('*')
			->from('finishings')
			->join('categories', 'finishings.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getFinishingsWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('finishings')
			->join('categories', 'finishings.categories_id = categories.id_categories')
			->where('finishings.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_finishings, $data);
		return TRUE;
	}

	function updateData($id_finishing, $data)
	{
		$this->db->where('id_finishing', $id_finishing);
		$this->db->update($this->mst_finishings, $data);
		return TRUE;
	}

	function deleteData($id_finishing)
	{
		$this->db->where('id_finishing', $id_finishing);
		$this->db->delete($this->mst_finishings);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}