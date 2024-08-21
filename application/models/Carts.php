<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carts extends CI_Model
{
   var $mst_carts = "carts";
	var $mst_cartsitems = "cartsitems";
    var $mst_products = "products";
    var $mst_materials = "materials";
    var $mst_customers = "customers";
    var $mst_finishings = "finishings";
    var $mst_facetypes = "facetypes";
    var $mst_laminations = "laminations";
    var $mst_sizes = "sizes";

   public function getCarts()
	{
		$query = $this->db->select()
			->from($this->mst_carts)
			->get();
		return $query->result();
	}

	function getCartsAll()
	{
		$query = $this->db->select('carts.*, cartsitems.*, 
																customers.name AS customer_name, 
																products.name AS product_name, 
																materials.material AS material_name, 
																finishings.finishing AS finishing_name, 
																facetypes.facetype AS facetype_name, 
																laminations.lamination AS lamination_name, 
																sizes.size AS size_name')
				->from('carts')
				->join('cartsitems', 'carts.id_cart = cartsitems.cart_id', 'left')
				->join('products', 'cartsitems.product_id = products.id_product', 'left')
				->join('materials', 'cartsitems.material_id = materials.id_material', 'left')
				->join('customers', 'carts.customer_id = customers.id_customer', 'left')
				->join('finishings', 'cartsitems.finishing_id = finishings.id_finishing', 'left')
				->join('facetypes', 'cartsitems.facetype_id = facetypes.id_facetype', 'left')
				->join('laminations', 'cartsitems.laminasi_id = laminations.id_lamination', 'left')
				->join('sizes', 'cartsitems.size_id = sizes.id_size', 'left')         
				->get();
		return $query->result();
	}
	public function getCartsById($cart_id)
	{
			// Contoh penggunaan getCartsAll dalam getCartsById
			$query = $this->db->select('carts.*, cartsitems.*, 
																	customers.name AS customer_name, 
																	products.name AS product_name, 
																	materials.material AS material_name, 
																	finishings.finishing AS finishing_name, 
																	facetypes.facetype AS facetype_name, 
																	laminations.lamination AS lamination_name, 
																	sizes.size AS size_name')
					->from('carts')
					->join('cartsitems', 'carts.id_cart = cartsitems.cart_id', 'left')
					->join('products', 'cartsitems.product_id = products.id_product', 'left')
					->join('materials', 'cartsitems.material_id = materials.id_material', 'left')
					->join('customers', 'carts.customer_id = customers.id_customer', 'left')
					->join('finishings', 'cartsitems.finishing_id = finishings.id_finishing', 'left')
					->join('facetypes', 'cartsitems.facetype_id = facetypes.id_facetype', 'left')
					->join('laminations', 'cartsitems.laminasi_id = laminations.id_lamination', 'left')
					->join('sizes', 'cartsitems.size_id = sizes.id_size', 'left')         
					->where('carts.id_cart', $cart_id)
					->get();

			return $query->result();
	}
	function getCartsItems($customer_id)
	{
		$query = $this->db->select('*')
			->from('carts')
			->join('cartsitems', 'carts.id_cart = cartsitems.cart_id')
			->join('products', 'cartsitems.product_id = products.id_product')
			->where('carts.customer_id', $customer_id)			
			->get();
		return $query->result();
	}

	function getLastCart($customer_id)
	{
		$query = $this->db->select('*')
			->from('carts')
			->join('cartsitems', 'carts.id_cart = cartsitems.cart_id')
			->join('products', 'cartsitems.product_id = products.id_product')
			->where('carts.customer_id', $customer_id)
			->where('carts.is_completed', 'F')			
			->get()->row()->cart_id;
		return $query;
	}
	function getCartsItemsWhere($customer_id, $cart_id)
	{
		$query = $this->db->select('*')
		->from('carts')
		->join('cartsitems', 'carts.id_cart = cartsitems.cart_id')
		->join('products', 'cartsitems.product_id = products.id_product')
		->where('carts.customer_id', $customer_id)
		->where('cartsitems.cart_id', $cart_id)
		->get();
		return $query->result();
	}
	
	function insertData($data)
	{
		$this->db->insert($this->mst_carts, $data);
		return $this->db->insert_id();
	}
	
	function updateData($id_cart, $data)
	{
		$this->db->where('id_cart', $id_cart);
		$this->db->update($this->mst_carts, $data);
		return TRUE;
	}
	
	function deleteData($id_cart)
	{
		$this->db->where('id_cart', $id_cart);
		$this->db->delete($this->mst_carts);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}
	function getTotalProcessedOrders()
	{
		$query = $this->db->select('COUNT(*) as total_processed_orders')
		->from('carts')
		->where('is_completed','T')
		->get();
		return $query->row()->total_processed_orders;
	}
	
	public function update_order($id_cart, $data) {
		$this->db->where('id_cart', $id_cart);
		$this->db->update('carts', $data);
		return TRUE;
	}
	
}