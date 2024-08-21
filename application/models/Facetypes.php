<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facetypes extends CI_Model
{
   var $mst_facetypes = "facetypes";
	var $mst_categories = "categories";

   public function getFacetypes()
	{
		$query = $this->db->select()
			->from($this->mst_facetypes)
			->get();
		return $query->result();
	}

	function getFacetypesCategories()
	{
		$query = $this->db->select('*')
			->from('facetypes')
			->join('categories', 'facetypes.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getFacetypesWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('facetypes')
			->join('categories', 'facetypes.categories_id = categories.id_categories')
			->where('facetypes.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_facetypes, $data);
		return TRUE;
	}

	function updateData($id_facetype, $data)
	{
		$this->db->where('id_facetype', $id_facetype);
		$this->db->update($this->mst_facetypes, $data);
		return TRUE;
	}

	function deleteData($id_facetype)
	{
		$this->db->where('id_facetype', $id_facetype);
		$this->db->delete($this->mst_facetypes);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}