<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Model
{
   var $mst_payments = "payments";	

   public function getData()
	{
		$query = $this->db->select()
			->from($this->mst_payments)
			->get();
		return $query->result();
	}

	public function getDataWhere($cart_id)
	{
		$query = $this->db->select()
			->from($this->mst_payments)
			->where('cart_id', $cart_id)
			->get();
		return $query->result();
	}

	public function getDataBy($customer_id)
	{
		$query = $this->db->select()
			->from($this->mst_payments)
			->where('customer_id', $customer_id)
			->get();
		return $query->result();
	}
	public function getDataById($cart_id)
	{
		 $query = $this->db->select()
				->from($this->mst_payments)
				->where('cart_id', $cart_id)
				->get();
		 return $query->row(); // Mengembalikan satu baris hasil query
	}
	function insertData($data)
	{
		$this->db->insert($this->mst_payments, $data);
		return TRUE;
	}	

	function updateData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->mst_payments, $data);
		return TRUE;
	}
	function updateDataByCartId($cart_id, $data)
	{
		$this->db->where('cart_id', $cart_id);
		$this->db->update($this->mst_payments, $data);
		return TRUE;
	}
	function deleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->mst_payments);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}
	public function getTotalVerifiedPayments()
	{
		$query = $this->db->select('SUM(jmlbayar) as total_verified_payments')
					->from($this->mst_payments)
					->where('status','Sudah Diterima')
					->get();
		return $query->row()->total_verified_payments;
	}
	public function getPaymentsByDateRange($start_date, $end_date)
	{
			$this->db->select('p.*, c.order_date');
			$this->db->from('payments p');
			$this->db->join('carts c', 'p.cart_id = c.id_cart', 'left');
			$this->db->where('c.order_date >=', $start_date);
			$this->db->where('c.order_date <=', $end_date);
			$query = $this->db->get();
			return $query->result();
	}
	public function getFilteredPayments($start_date = null, $end_date = null, $status = null, $namalengkap = null)
{
    $this->db->select('p.*, c.order_date');
    $this->db->from('payments p');
    $this->db->join('carts c', 'p.cart_id = c.id_cart', 'left');

    if ($start_date && $end_date) {
        $this->db->where('c.order_date >=', $start_date);
        $this->db->where('c.order_date <=', $end_date);
    }

    if ($status) {
        $this->db->where('p.status', $status);
    }

    if ($namalengkap) {
        $this->db->like('p.namalengkap', $namalengkap);
    }

    $query = $this->db->get();
    return $query->result();
}
}