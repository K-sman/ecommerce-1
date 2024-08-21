<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class JenisLaminasi extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Laminations');
		$this->load->model('Categories');
	}

	public function index()
	{
		$this->data['title'] = "Jenis Laminasi | Lestari Printing";
      $this->data['laminations'] = $this->Laminations->getLaminationsCategories();
		$this->data['categories'] = $this->Categories->getCategories();
		$this->template->admin_render('admin/laminasi/laminasi', $this->data);
	}

	function insert()
	{
		$data = array(
			'lamination' => $this->input->post("lamination"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);
		$this->Laminations->insertData($data);
		$this->session->set_flashdata("success", "Tambah Data Jenis Laminasi Berhasil");
		redirect('JenisLaminasi');
	}

	function update()
	{
		$id_lamination = $this->input->post('id_lamination');
		$data = array(
			'lamination' => $this->input->post("lamination"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);

		$this->Laminations->updateData($id_lamination, $data);
		$this->session->set_flashdata("update", "Ubah Data Jenis Laminasi Berhasil");
		redirect('JenisLaminasi');
	}

	function delete($id_lamination)
	{
		$this->Laminations->deleteData($id_lamination);
		$this->session->set_flashdata("delete", "Hapus Data Jenis Laminasi Berhasil");
		redirect('JenisLaminasi');
	}
}
