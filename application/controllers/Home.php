<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Home extends MY_Controller
{
   function __construct()
	{
		parent::__construct();
		$this->load->database();
      $this->load->model('Products');		
	}

   public function index()
	{
      $this->data['title'] = "E-Commerce";
      $this->data['produk'] = $this->Products->getProductsCategories();
      $this->data['undangan'] = $this->Products->getProductsWhere(1);
      $this->template->public_render('public/beranda/beranda', $this->data);
   }
}