<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sizes extends CI_Model
{
   var $mst_sizes = "sizes";
	var $mst_categories = "categories";

   public function getSizes()
	{
		$query = $this->db->select()
			->from($this->mst_sizes)
			->get();
		return $query->result();
	}

	function getSizesCategories()
	{
		$query = $this->db->select('*')
			->from('sizes')
			->join('categories', 'sizes.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getSizessWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('sizes')
			->join('categories', 'sizes.categories_id = categories.id_categories')
			->where('sizes.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_sizes, $data);
		return TRUE;
	}

	function updateData($id_size, $data)
	{
		$this->db->where('id_size', $id_size);
		$this->db->update($this->mst_sizes, $data);
		return TRUE;
	}

	function deleteData($id_size)
	{
		$this->db->where('id_size', $id_size);
		$this->db->delete($this->mst_sizes);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}