<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Model
{
   var $mst_customers = "customers";

   public function getCustomerById($customer_id)
   {
      $query = $this->db->select('name')
         ->from($this->mst_customers)
         ->where('id_customer', $customer_id)
         ->get();
      return $query->row();
   }
   
   function check($data)
	{
		return $this->db->get_where($this->mst_customers, $data);
	}

	public function getData()
	{
		$query = $this->db->select()
			->from($this->mst_customers)
			->get();
		return $query->result();
	}

	public function getDataWhere($customer_id)
	{
		$query = $this->db->select()
			->from($this->mst_customers)
			->where('id_customer', $customer_id)
			->get();
		return $query->result();
	}

	public function getCustomer($email)
	{
		$query = $this->db->select()
			->from($this->mst_customers)
			->where('email', $email)
			->get();
		return $query->result();
	}

   function insertData($data)
	{
		$this->db->insert($this->mst_customers, $data);
		return TRUE;
	}

	function updateData($id_customer, $data)
	{
		$this->db->where('id_customer', $id_customer);
		$this->db->update($this->mst_customers, $data);
		return TRUE;
	}
}