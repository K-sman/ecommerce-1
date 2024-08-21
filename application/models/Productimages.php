<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productimages extends CI_Model
{
   var $mst_productimages = "productimages";

	function getImagesBy($id_product)
	{
		$query = $this->db->select('*')
			->from('productimages')			
			->where('productimages.product_id', $id_product)
			->get();
		return $query->result();
	}

   public function insertImage($file_name, $product_id) {
      $data = array(
         'product_id' => $product_id,
         'image' => $file_name   
      );

      $this->db->insert($this->mst_productimages, $data);
   }

	function insertData($data)
	{
		$this->db->insert($this->mst_productimages, $data);
		return TRUE;
	}	

	function deleteData($id_image)
	{
		$this->db->where('id_image', $id_image);
		$this->db->delete($this->mst_productimages);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}

}