<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materials extends CI_Model
{
   var $mst_materials = "materials";
	var $mst_categories = "categories";

   public function getMaterials()
	{
		$query = $this->db->select()
			->from($this->mst_materials)
			->get();
		return $query->result();
	}
	//miss
	public function getAllMaterials()
	{
		$query = $this->db->select('id_material, material, description, categories_id, add_price')
                  ->from($this->mst_materials)
                  ->get();
				  
        return $query->result();
	}
	function getMaterialsById($id)
{
    $query = $this->db->get_where('materials', array('id_material' => $id));
    return $query->row();
}

	function getMaterialsCategories()
	{
		$query = $this->db->select('*')
			->from('materials')
			->join('categories', 'materials.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getMaterialsWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('materials')
			->join('categories', 'materials.categories_id = categories.id_categories')
			->where('materials.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_materials, $data);
		return TRUE;
	}

	function updateData($id_material, $data)
	{
		$this->db->where('id_material', $id_material);
		$this->db->update($this->mst_materials, $data);
		return TRUE;
	}

	function deleteData($id_material)
	{
		$this->db->where('id_material', $id_material);
		$this->db->delete($this->mst_materials);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}