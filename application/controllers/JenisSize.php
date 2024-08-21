<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class JenisSize extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Sizes');
		$this->load->model('Categories');
	}

	public function index()
	{
		$this->data['title'] = "Jenis Ukuran | Lestari Printing";
      $this->data['sizes'] = $this->Sizes->getSizesCategories();
		$this->data['categories'] = $this->Categories->getCategories();
		$this->template->admin_render('admin/ukuran/ukuran', $this->data);
	}

	function insert()
	{
		$data = array(
			'size' => $this->input->post("size"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);
		$this->Sizes->insertData($data);
		$this->session->set_flashdata("success", "Tambah Data Ukuran Produk Berhasil");
		redirect('JenisSize');
	}

	function update()
	{
		$id_size = $this->input->post('id_size');
		$data = array(
			'size' => $this->input->post("size"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);

		$this->Sizes->updateData($id_size, $data);
		$this->session->set_flashdata("update", "Ubah Data Ukuran Produk Berhasil");
		redirect('JenisSize');
	}

	function delete($id_size)
	{
		$this->Sizes->deleteData($id_size);
		$this->session->set_flashdata("delete", "Hapus Data Ukuran Produk Berhasil");
		redirect('JenisSize');
	}
}
