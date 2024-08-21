<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Orders extends CI_Model {

	var $mst_customers = "customers";
    var $mst_materials = "materials";
    var $mst_laminations = "laminations";
    var $mst_products = "products";
    var $mst_finishings = "finishings";
    var $mst_facetypes = "facetypes";
    var $mst_categories = "categories";
    
    // Metode untuk mengambil daftar pesanan beserta informasi tambahan
    
    public function getOrdersWithDetails() {
        $sql = "SELECT orders.*, customers.name as customer_name, materials.material as material, finishings.finishing as finishing 
                FROM orders 
                LEFT JOIN customers ON orders.customer_id = customers.id 
                LEFT JOIN materials ON orders.material_id = materials.id 
                LEFT JOIN finishings ON orders.finishing_id = finishings.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}