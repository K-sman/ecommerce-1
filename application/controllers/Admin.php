<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Admin') {
			redirect('Login');
		}

		$this->load->model('Admins');
		$this->load->model('Products');
		$this->load->model('Categories');
		$this->load->model('Productimages');
		$this->load->model('Undangans');
		$this->load->model('Carts');
		$this->load->model('Customers');
		$this->load->model('Payments');
		$this->load->helper('custom_helper');
	}

	public function index()
	{
		$this->data['title'] = "Beranda | Lestari Printing";
		$this->data['product_all'] = $this->Products->getTotalProducts();
		$this->data['processed_orders'] = $this->Carts->getTotalProcessedOrders();
		$this->data['total_customers'] = count($this->Customers->getData());
		$this->data['total_verified_payments'] = $this->Payments->getTotalVerifiedPayments();				
		$this->template->admin_render('admin/beranda/beranda', $this->data);
	}

	public function produk()
	{
		$this->data['title'] = "Daftar Produk | Lestari Printing";
		$this->data['products'] = $this->Products->getProductsCategories();
		$this->data['categories'] = $this->Categories->getCategoriesWhere();
		$this->template->admin_render('admin/produk/produk', $this->data);
	}

	public function undangan()
	{
		$this->data['title'] = "Pesanan Undangan | Lestari Printing";
		$this->data['undangan'] = $this->Undangans->getData();		
		$this->template->admin_render('admin/produk/undangan', $this->data);
	}

	public function orders()
	{
		$this->data['title'] = "Daftar Orders | Lestari Printing";
		$this->data['orders'] = $this->Carts->getCartsAll();
		$this->template->admin_render('admin/produk/orders', $this->data);
	}

	public function customers()
	{
		$this->data['title'] = "Daftar Customers | Lestari Printing";
		$this->data['customers'] = $this->Customers->getData();
		$this->template->admin_render('admin/customer/customer', $this->data);
	}
	public function payments()
	{
			$this->data['title'] = "Daftar Pembayaran | Lestari Printing";
			
			// Ambil parameter filter dari query string
			$start_date = $this->input->get('start_date');
			$end_date = $this->input->get('end_date');
			$status = $this->input->get('status');
			$namalengkap = $this->input->get('customer_name');
			
			// Mengambil data dengan filter
			$this->data['payments'] = $this->Payments->getFilteredPayments($start_date, $end_date, $status, $namalengkap);
			
			// Data untuk filter
			$this->data['start_date'] = $start_date;
			$this->data['end_date'] = $end_date;
			$this->data['status'] = $status;
			$this->data['customer_name'] = $namalengkap;
			
			// Render view
			$this->template->admin_render('admin/payment/payment', $this->data);
	}
	
	public function export($jenis='pdf')
	{
			if ($jenis == 'pdf') {
					$start_date = $this->input->get('start_date');
					$end_date = $this->input->get('end_date');
					$status = $this->input->get('status');
					$namalengkap = $this->input->get('customer_name');
	
					// Ambil data dengan filter
					$payments = $this->Payments->getFilteredPayments($start_date, $end_date, $status, $namalengkap);
	
					$grand_total = 0;
					foreach ($payments as $dt) {
							$grand_total += $dt->jmlbayar;
					}
	
					$data = [
							'payments' => $payments,
							'grand_total' => $grand_total,
							'start_date' => $start_date,
							'end_date' => $end_date,
							'status' => $status,
							'customer_name' => $namalengkap,
							'title' => 'Laporan Pembayaran'
					];
	
					$html = $this->load->view('admin/payment/pdfPayment', $data, TRUE);
					generatedPdf($html, 'laporan_pembayaran', 'A4', 'landscape', false); // true untuk attachment
	
					exit;
			}
	}	
	public function cetakDataPesanan($cart_id, $id_cartsitem) {
    // Load model and get data based on cart_id
    $data['orders'] = $this->Carts->getCartsById($cart_id);

    // Pass the id_cartsitem to the view for filtering
    $data['selected_id_cartsitem'] = $id_cartsitem;

    // Load the view and pass the data
    $html = $this->load->view('admin/produk/pdfDetail', $data, true);

    // Generate PDF
    generatedPdf($html, 'Order_Detail_'.$cart_id.'_'.$id_cartsitem);
}

public function verifpay() {
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	$send_order = $this->input->post('send_order'); // Tanggal pengiriman
	// Validasi data jika perlu
	// Update data di database
	$data = array(
			'status' => $status,
			'send_order' => $send_order, // Tanggal pengiriman
	);
	$this->Payments->updateData($id, $data);
	// Set flash data untuk notifikasi
	$this->session->set_flashdata("update", "Pembayaran telah diperbarui.");
	redirect('Admin/payments'); // Redirect ke halaman pembayaran admin
}

	function updateundangan()
	{
		$id_undangan = $this->input->post('id_undangan');		
		$data = array(
			'status' => 'Sudah Diperiksa'			
		);

		$this->Undangans->updateData($id_undangan, $data);
		$this->session->set_flashdata("update", "Validasi Undangan Berhasil");
		redirect('Admin/undangan');
	}

	public function updateorders() 
{
    $this->load->model('Carts');
    $id_cart = $this->input->post('id_cart');
    $send_order = $this->input->post('send_order');  // Ambil tanggal kirim dari form
    // Validasi input
    if (empty($send_order)) {
        $this->session->set_flashdata('error', 'Tanggal kirim tidak boleh kosong.');
        redirect('Admin/orders');
    }
    // Data yang akan diupdate
    $data = array(
        'is_completed' => 'T',
        'send_order' => $send_order  // Update tanggal kirim
    );
    // Panggil model untuk melakukan update
    $this->Carts->update_order($id_cart, $data);
    // Set flash data dan redirect
    $this->session->set_flashdata('message', 'Pesanan telah diperiksa dan tanggal kirim diperbarui.');
    redirect('Admin/orders');
}
	function insertproduct()
	{				
		$config['upload_path'] = './public/featureimage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/featureimage')) {
			mkdir('./public/featureimage', 0777, true);
		}

		if (!empty($_FILES['featureimage']['name'])) {
			if ($this->upload->do_upload('featureimage')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/featureimage/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/featureimage/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'name' => $this->input->post("name"),
					'description' => $this->input->post("description"),
					'information' => $this->input->post("information"),
					'baseprice' => $this->input->post("baseprice"),
					'stock' => $this->input->post("stock"),
					'featureimage' => $foto['file_name'],
					'categories_id' => $this->input->post("categories_id")			
				);

				$this->Products->insertData($data);		
				$this->session->set_flashdata("success", "Berhasil, Silahkan Upload Detail Gambar Produk");
				redirect('Admin/produk');
			} else {
				$this->session->set_flashdata("error", "Tambah Gambar Produk Gagal");
				redirect('Admin/produk');
			}
		}else if(empty($_FILES['featureimage']['name'])){			
			$data = array(
				'name' => $this->input->post("name"),
				'description' => $this->input->post("description"),
				'information' => $this->input->post("information"),
				'baseprice' => $this->input->post("baseprice"),
				'stock' => $this->input->post("stock"),				
				'categories_id' => $this->input->post("categories_id")			
			);

			$this->Products->insertData($data);		
			$this->session->set_flashdata("success", "Berhasil, Silahkan Upload Detail Gambar Produk");
			redirect('Admin/produk');
		}
	}

	function updateproduct()
	{
		$id_product = $this->input->post('id_product');		
		$this->db->where('id_product', $id_product);
		$query = $this->db->get('products');
		$row = $query->row();

		$config['upload_path'] = './public/featureimage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/featureimage')) {
			mkdir('./public/featureimage', 0777, true);
		}

		if (!empty($_FILES['featureimage']['name'])) {
			if ($this->upload->do_upload('featureimage')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/featureimage/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/featureimage/' . $foto['file_name'];
				$config['overwrite'] = TRUE;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'name' => $this->input->post("name"),
					'description' => $this->input->post("description"),
					'information' => $this->input->post("information"),
					'baseprice' => $this->input->post("baseprice"),
					'stock' => $this->input->post("stock"),
					'featureimage' => $foto['file_name'],
					'categories_id' => $this->input->post("categories_id")			
				);

				unlink("./public/featureimage/$row->featureimage");
				$this->Products->updateData($id_product, $data);
				$this->session->set_flashdata("success", "Berhasil, Silahkan Upload Detail Gambar Produk");
				redirect('Admin/produk');
			} else {
				$this->session->set_flashdata("error", "Tambah Gambar Produk Gagal");
				redirect('Admin/produk');
			}
		}else if(empty($_FILES['featureimage']['name'])){			
			$data = array(
				'name' => $this->input->post("name"),
				'description' => $this->input->post("description"),
				'information' => $this->input->post("information"),
				'baseprice' => $this->input->post("baseprice"),
				'stock' => $this->input->post("stock"),				
				'categories_id' => $this->input->post("categories_id")			
			);

			$this->Products->updateData($id_product, $data);
			$this->session->set_flashdata("success", "Berhasil, Silahkan Upload Detail Gambar Produk");
			redirect('Admin/produk');
		}
	}

	public function productimage($id_product)
	{
		$this->data['title'] = "Gambar Produk | Lestari Printing";
		$this->data['id_product'] = $id_product;
		$this->data['product'] = $this->Products->getProductsCategoriesBy($id_product);
		$this->data['images'] = $this->Productimages->getImagesBy($id_product);
		$this->template->admin_render('admin/produk/gambar', $this->data);
	}

	function insertimage()
	{
		$config['upload_path'] = './public/productimages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/productimages')) {
			mkdir('./public/productimages', 0777, true);
		}

		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/productimages/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/productimages/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'product_id'  => $this->input->post("product_id"),
					'image'       => $foto['file_name'],
					'description' => $this->input->post("description")
				);

				$this->Productimages->insertData($data);			
				$this->session->set_flashdata("success", "Tambah Gambar Produk Berhasil");
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata("error", "Tambah Gambar Produk Gagal");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	function deleteproduct($id_product)
	{
		$this->db->where('id_product', $id_product);
		$query = $this->db->get('products');
		$row = $query->row();
		unlink("./public/featureimage/$row->featureimage");
		$this->Products->deleteData($id_product);
		$this->session->set_flashdata("delete", "Hapus Data Gambar Berhasil");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function deleteimage($id_image)
	{
		$this->Productimages->deleteData($id_image);
		$this->session->set_flashdata("delete", "Hapus Data Gambar Berhasil");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function akun()
	{
		$this->data['title'] = "Pengaturan Akun | Lestari Printing";				
		$id_admin = $this->session->userdata('id_admin');
      $this->data['profil'] = $this->Admins->getDataWhere($id_admin);
		$this->template->admin_render('admin/akun/akun', $this->data);
	}

	function updateakun()
	{
		$id_admin = $this->session->userdata('id_admin');
    $password = $this->input->post("password");
		$konfpass = $this->input->post("konfirmasipassword");

      if($password && $konfpass){
			
			if($password == $konfpass ){		
         $data = array(
            'name' => $this->input->post("name"),
            'phone' => $this->input->post("phone"),
            'email' => $this->input->post("email"),
            'password' => sha1($this->input->post("password"))
         );
         $this->Admins->updateData($id_admin, $data);
         $this->session->set_flashdata("update", "Ubah Data Profil Berhasil");
         redirect('Admin/akun');
			}else{
				$this->session->set_flashdata("error", "Konfirmasi Password Gagal");
				redirect('Admin/akun');
			}
      }else{
         $data = array(
            'name' => $this->input->post("name"),
            'phone' => $this->input->post("phone"),
            'email' => $this->input->post("email")         
         );
         $this->Admins->updateData($id_admin, $data);
         $this->session->set_flashdata("update", "Ubah Data Profil Berhasil");
         redirect('Admin/akun');
      }		
	}

	
}