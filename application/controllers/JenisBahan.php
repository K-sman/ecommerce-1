<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class JenisBahan extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Materials');
		$this->load->model('Categories');
	}

	public function index()
	{
		$this->data['title'] = "Jenis Bahan Produk | Lestari Printing";
      $this->data['materials'] = $this->Materials->getMaterialsCategories();
		$this->data['categories'] = $this->Categories->getCategories();
		$this->template->admin_render('admin/material/material', $this->data);
	}

	function insert()
	{
		$data = array(
			'material' => $this->input->post("material"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);
		$this->Materials->insertData($data);
		$this->session->set_flashdata("success", "Tambah Data Jenis Bahan Berhasil");
		redirect('JenisBahan');
	}

	function update()
	{
		$id_material = $this->input->post('id_material');		
		$data = array(
			'material' => $this->input->post("material"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);

		$this->Materials->updateData($id_material, $data);
		$this->session->set_flashdata("update", "Ubah Data Jenis Bahan Berhasil");
		redirect('JenisBahan');
	}

	function delete($id_material)
	{
		$this->Materials->deleteData($id_material);
		$this->session->set_flashdata("delete", "Hapus Data Jenis Bahan Berhasil");
		redirect('JenisBahan');
	}
}
