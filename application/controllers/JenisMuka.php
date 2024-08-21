<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class JenisMuka extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Facetypes');
		$this->load->model('Categories');
	}

	public function index()
	{
		$this->data['title'] = "Jenis Muka | Lestari Printing";
      $this->data['facetypes'] = $this->Facetypes->getFacetypesCategories();
		$this->data['categories'] = $this->Categories->getCategories();
		$this->template->admin_render('admin/jenismuka/jenismuka', $this->data);
	}

	function insert()
	{
		$data = array(
			'facetype' => $this->input->post("facetype"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);
		$this->Facetypes->insertData($data);
		$this->session->set_flashdata("success", "Tambah Data Jenis Muka Berhasil");
		redirect('JenisMuka');
	}

	function update()
	{
		$id_facetype = $this->input->post('id_facetype');
		$data = array(
			'facetype' => $this->input->post("facetype"),
			'description' => $this->input->post("description"),
			'categories_id' => $this->input->post("categories_id"),
			'add_price' => $this->input->post("add_price")
		);

		$this->Facetypes->updateData($id_facetype, $data);
		$this->session->set_flashdata("update", "Ubah Data Jenis Muka Berhasil");
		redirect('JenisMuka');
	}

	function delete($id_facetype)
	{
		$this->Facetypes->deleteData($id_facetype);
		$this->session->set_flashdata("delete", "Hapus Data Jenis Muka Berhasil");
		redirect('JenisMuka');
	}
}
