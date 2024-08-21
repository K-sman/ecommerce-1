<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Pages extends MY_Controller
{
	function __construct()
	{
      parent::__construct();
		$this->load->database();
   }

   public function tentang()
	{
		$this->data['title'] = "Tentang | Lestari Printing";		
		$this->template->public_render('public/halaman/tentang', $this->data);
	}

   public function kontak()
	{
		$this->data['title'] = "Kontak Kami | Lestari Printing";		
		$this->template->public_render('public/halaman/kontak', $this->data);
	}

}