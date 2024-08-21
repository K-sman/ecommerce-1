<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('get_subtotal')) {
	function get_subtotal($cart_id) {
		$ci = &get_instance();
		$ci->db->select_sum('price');
		$ci->db->where(['cart_id' => $cart_id]);
		$query = $ci->db->get('cartsitems');
		
		if ($query->num_rows() > 0) {
			return $query->row()->price;
		} else {
			return 0;
		}
	
	}
}
