<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Model
{
   var $mst_products = "products";
	var $mst_categories = "categories";

   public function getProducts()
	{
		$query = $this->db->select()
			->from($this->mst_products)
			->get();
		return $query->result();
	}

	function getProductsCategories()
	{
		$query = $this->db->select('*')
			->from('products')
			->join('categories', 'products.categories_id = categories.id_categories')
			->get();
		return $query->result();
	}

	function getProductsWhere($categories_id)
	{
		$query = $this->db->select('*')
			->from('products')
			->join('categories', 'products.categories_id = categories.id_categories')			
			->where('products.categories_id', $categories_id)
			->get();
		return $query->result();
	}

	function getProductsWhereId($categories_id, $id_product)
	{
		$query = $this->db->select('*')
			->from('products')
			->join('categories', 'products.categories_id = categories.id_categories')			
			->where('products.categories_id', $categories_id)
			->where('products.id_product', $id_product)
			->get();
		return $query->result();
	}

	function getProductsCategoriesBy($id_product)
	{
		$query = $this->db->select('*')
			->from('products')
			->join('categories', 'products.categories_id = categories.id_categories')
			->where('products.id_product', $id_product)
			->get();
		return $query->result();
	}

	function insertData($data)
	{
		$this->db->insert($this->mst_products, $data);
		return $this->db->insert_id();
	}

	function updateData($id_product, $data)
	{
		$this->db->where('id_product', $id_product);
		$this->db->update($this->mst_products, $data);
		return TRUE;
	}

	function deleteData($id_product)
	{
		$this->db->where('id_product', $id_product);
		$this->db->delete($this->mst_products);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}
	public function getTotalProducts()
	{
		return $this->db->count_all($this->mst_products);
	}
}