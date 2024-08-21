<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Model
{
   public function getProvince()
	{
		$query = $this->db->select()
			->from('provinces')
			->get();
		return $query->result();
	}

}