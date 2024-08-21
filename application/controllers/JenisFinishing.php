<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class JenisFinishing extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Finishings');
		$this->load->model('Categories');
	}

	public function index()
	{
		$this->data['title'] = "Jenis Bahan Produk | Lestari Printing";
      $this->data['finishings'] = $this->Finishings->getFinishingsCategories();
		$this->data['categories'] = $this->Categories->getCategories();
		$this->template->admin_render('admin/finishing/finishing', $this->data);
	}

	function insert()
	{
		$data = array(
			'finishing' => $this->input->post("finishing"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);
		$this->Finishings->insertData($data);
		$this->session->set_flashdata("success", "Tambah Data Jenis Finishing Berhasil");
		redirect('JenisFinishing');
	}

	function update()
	{
		$id_finishing = $this->input->post('id_finishing');		
		$data = array(
			'finishing' => $this->input->post("finishing"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);

		$this->Finishings->updateData($id_finishing, $data);
		$this->session->set_flashdata("update", "Ubah Data Jenis Finishing Berhasil");
		redirect('JenisFinishing');
	}

	function delete($id_finishing)
	{
		$this->Finishings->deleteData($id_finishing);
		$this->session->set_flashdata("delete", "Hapus Data Jenis Finishing Berhasil");
		redirect('JenisFinishing');
	}
}
