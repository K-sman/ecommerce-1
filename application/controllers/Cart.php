<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Cart extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('logged_in')) or $this->session->userdata('stts') != 'Customer') {
			redirect('Account');
		}

		$this->load->model('Customers');
		$this->load->model('Products');
		$this->load->model('Categories');
		$this->load->model('Productimages');

		$this->load->model('Carts');
		$this->load->model('Cartsitems');
		$this->load->model('Country');
		$this->load->model('Payments');
		$this->load->model('Undangans');
		$this->load->helper('form');

   }

	public function index()
	{		
		$cart_id = $this->session->userdata('cart_id');		

		if($cart_id){
			$this->data['title'] = "Keranjang Anda | Lestari Printing";
			$customer_id = $this->session->userdata('id_customer');
			$this->data['carts'] = $this->Carts->getCartsItemsWhere($customer_id, $cart_id);
			$this->data['cart_id'] = $cart_id;
			$this->template->public_render('public/cart/cart', $this->data);		
		}else {
			redirect('Home');
		}		
	}
	public function cancelOrder($id_cartsitem)
	{
		$this->Cartsitems->deleteData($id_cartsitem);
    
    	$cart_id = $this->session->userdata('cart_id');
    	$customer_id = $this->session->userdata('id_customer');
    
    	$carts = $this->Carts->getCartsItemsWhere($customer_id, $cart_id);
    	if (empty($carts)) {
        	$this->session->unset_userdata('cart_id');
        	$this->template->public_render('public/cart/empty_cart', $this->data);
    	} else {
        // Jika tidak, arahkan kembali ke halaman keranjang
        	redirect('Cart');
		}
	}
	public function orders()
	{
		$this->data['title'] = "Orders | Lestari Printing";		
		$customer_id = $this->session->userdata('id_customer');
		$this->data['orders'] = $this->Payments->getDataBy($customer_id);		

		$this->template->public_render('public/account/orders', $this->data);
	}
	public function checkout($cart_id)
	{
		$this->data['title'] = "Checkout | Lestari Printing";
		$this->data['cart_id'] = $cart_id;
		$customer_id = $this->session->userdata('id_customer');
		$this->data['carts'] = $this->Carts->getCartsItemsWhere($customer_id, $cart_id);
		$this->data['province'] = $this->Country->getProvince();

		$this->template->public_render('public/cart/checkout', $this->data);
	}

	public function complete($cart_id)
	{
		$this->data['title'] = "Order Complete | Lestari Printing";
		$this->data['cart_id'] = $cart_id;
		$customer_id = $this->session->userdata('id_customer');
		$this->data['payments'] = $this->Payments->getDataWhere($cart_id);
		$this->data['carts'] = $this->Carts->getCartsItemsWhere($customer_id, $cart_id);
		$this->data['province'] = $this->Country->getProvince();

		$this->template->public_render('public/cart/complete', $this->data);
	}

	function addpayment()
   {
		$customer_id = $this->session->userdata('id_customer');
		$cart_id = $this->input->post('cart_id');

		$data = array(
			'customer_id' => $customer_id,		
			'cart_id' => $cart_id,
			'nameproduct' => $this->input->post('nameproduct'),
			'namalengkap' => $this->input->post('namalengkap'),
			'perusahaan' => $this->input->post('perusahaan'),
			'alamat' => $this->input->post('alamat'),
			'kota' => $this->input->post('kota'),
			'provinsi' => $this->input->post('provinsi'),
			'kodepos' => $this->input->post('kodepos'),
			'telepon' => $this->input->post('telepon'),
			'email' => $this->input->post('email'),
			'catatan' => $this->input->post('catatan'),
			'jmlbayar' => $this->input->post('jmlbayar'),
			'payment_method' => $this->input->post('payment_method'),
			'status' => 'B'
		);

		$complete = array(
			'is_completed' => 'T'
		);

		$this->Carts->updateData($cart_id, $complete);
		$this->Payments->insertData($data);
		$this->session->unset_userdata('cart_id');

		$this->session->set_flashdata("success", "Order Berhasil Dikirim");
		redirect('Cart/complete/' . $cart_id);
   }
   public function payment_proof()
   {
	   $this->load->library('upload');
   
	   $config['upload_path'] = 'C:/xampp/htdocs/ecommerce-1/uploads/payments_proof/';
	   $config['allowed_types'] = 'jpg|jpeg|png|gif';
	   $config['max_size'] = '5120';
   
	   $this->upload->initialize($config);
   
	   if (!$this->upload->do_upload('payment_proof')) {
		   $this->session->set_flashdata('error', $this->upload->display_errors());
		   redirect('Cart/complete/' . $this->input->post('cart_id'));
	   } else {
		   $file_data = $this->upload->data();
		   $payment_proof = $file_data['file_name'];
   
		   $cart_id = $this->input->post('cart_id');
   
		   $data = array(
			   'payment_proof' => $payment_proof
		   );
		   $this->Payments->updateDataByCartId($cart_id, $data);
   
		   $this->session->set_flashdata('success', 'Bukti Pembayaran Berhasil di Upload.');
		   redirect('Cart/complete/' . $cart_id);
		}
   }   
	function addproduklainnya()
   {
		$customer_id = $this->session->userdata('id_customer');
		$cart_id = $this->session->userdata('cart_id');		

		if($cart_id){
			//keranjang belanja berisi
			$datacart = array(
				'cart_id' => $cart_id,
				'product_id' => $this->input->post('product_id'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}else{
			//keranjang belanja masih kosong
			$data = array(
				'customer_id' => $customer_id,
				'is_completed' => 'F'
			);

			$cartid = $this->Carts->insertData($data);
			$data_session['cart_id'] = $cartid;
			$this->session->set_userdata($data_session);

			$datacart = array(
				'cart_id' => $cartid,
				'product_id' => $this->input->post('product_id'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}
   }
	function addmerchandise()
   {
		$customer_id = $this->session->userdata('id_customer');
		$cart_id = $this->session->userdata('cart_id');
		
		if($cart_id){
			$datacart = array(
				'cart_id' => $cart_id,
				'product_id' => $this->input->post('product_id'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}else{
			$data = array(
				'customer_id' => $customer_id,
				'is_completed' => 'F'
			);

			$cartid = $this->Carts->insertData($data);
			$data_session['cart_id'] = $cartid;
			$this->session->set_userdata($data_session);

			$datacart = array(
				'cart_id' => $cartid,
				'product_id' => $this->input->post('product_id'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}
		
   }

	function addsticker()
   {
		$customer_id = $this->session->userdata('id_customer');
		$cart_id = $this->session->userdata('cart_id');
		
		if($cart_id){
			$datacart = array(
				'cart_id' => $cart_id,
				'product_id' => $this->input->post('product_id'),
				'material_id' => $this->input->post('bahansticker'),
				'laminasi_id' => $this->input->post('jenislaminasi'),
				'finishing_id' => $this->input->post('jenispotong'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}else{
			$data = array(
				'customer_id' => $customer_id,
				'is_completed' => 'F'
			);

			$cartid = $this->Carts->insertData($data);
			$data_session['cart_id'] = $cartid;
			$this->session->set_userdata($data_session);

			$datacart = array(
				'cart_id' => $cartid,
				'product_id' => $this->input->post('product_id'),
				'material_id' => $this->input->post('bahansticker'),
				'laminasi_id' => $this->input->post('jenislaminasi'),
				'finishing_id' => $this->input->post('jenispotong'),
				'keterangan' => $this->input->post('keterangan'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			$this->Cartsitems->insertData($datacart);
			$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
			redirect('Cart');
		}				
   }
	function addspanduk()
   {
		$config['upload_path'] = './public/orders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/orders')) {
			mkdir('./public/orders', 0777, true);
		}
		if (!empty($_FILES['filecontoh']['name'])) {
			if ($this->upload->do_upload('filecontoh')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/orders/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/orders/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$customer_id = $this->session->userdata('id_customer');
				$cart_id = $this->session->userdata('cart_id');
				
				if($cart_id){
					$datacart = array(
						'cart_id' => $cart_id,
						'product_id' => $this->input->post('product_id'),
						'material_id' => $this->input->post('bahanspanduk'),
						'ukuran' => $this->input->post('lebar') .'x'. $this->input->post('panjang') . 'm',
						'finishing_id' => $this->input->post('finishingspanduk'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);

					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}else{
					$data = array(
						'customer_id' => $customer_id,
						'is_completed' => 'F'
					);
		
					$cartid = $this->Carts->insertData($data);
					$data_session['cart_id'] = $cartid;
					$this->session->set_userdata($data_session);
		
					$datacart = array(
						'cart_id' => $cartid,
						'product_id' => $this->input->post('product_id'),
						'material_id' => $this->input->post('bahanspanduk'),
						'ukuran' => $this->input->post('lebar') .'x'. $this->input->post('panjang') . 'm',
						'finishing_id' => $this->input->post('finishingspanduk'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);
					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}
			}
		}else if(empty($_FILES['filecontoh']['name'])){			

			$customer_id = $this->session->userdata('id_customer');
			$cart_id = $this->session->userdata('cart_id');
			
			if($cart_id){
				$datacart = array(
					'cart_id' => $cart_id,
					'product_id' => $this->input->post('product_id'),
					'material_id' => $this->input->post('bahanspanduk'),
					'ukuran' => $this->input->post('lebar') .'x'. $this->input->post('panjang') . 'm',
					'finishing_id' => $this->input->post('finishingspanduk'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);

				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}else{
				$data = array(
					'customer_id' => $customer_id,
					'is_completed' => 'F'
				);
	
				$cartid = $this->Carts->insertData($data);
				$data_session['cart_id'] = $cartid;
				$this->session->set_userdata($data_session);
	
				$datacart = array(
					'cart_id' => $cartid,
					'product_id' => $this->input->post('product_id'),
					'material_id' => $this->input->post('bahanspanduk'),
					'ukuran' => $this->input->post('lebar') .'x'. $this->input->post('panjang') . 'm',
					'finishing_id' => $this->input->post('finishingspanduk'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);
				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}
		}						
   }
   function addkartunama()
   {
		$config['upload_path'] = './public/orders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/orders')) {
			mkdir('./public/orders', 0777, true);
		}

		if (!empty($_FILES['filecontoh']['name'])) {
			if ($this->upload->do_upload('filecontoh')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/orders/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/orders/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$customer_id = $this->session->userdata('id_customer');
				$cart_id = $this->session->userdata('cart_id');
				
				if($cart_id){
					$datacart = array(
						'cart_id' => $cart_id,
						'product_id' => $this->input->post('product_id'),
						'material_id' => $this->input->post('bahankartu'),
						'facetype_id' => $this->input->post('jenismuka'),
						'laminasi_id' => $this->input->post('jenislaminasi'),
						'finishing_id' => $this->input->post('jenisfinishing'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);

					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}else{
					$data = array(
						'customer_id' => $customer_id,
						'is_completed' => 'F'
					);
		
					$cartid = $this->Carts->insertData($data);
					$data_session['cart_id'] = $cartid;
					$this->session->set_userdata($data_session);
		
					$datacart = array(
						'cart_id' => $cartid,
						'product_id' => $this->input->post('product_id'),
						'material_id' => $this->input->post('bahankartu'),
						'facetype_id' => $this->input->post('jenismuka'),
						'laminasi_id' => $this->input->post('jenislaminasi'),
						'finishing_id' => $this->input->post('jenisfinishing'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);
					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}
			}

		}else if(empty($_FILES['filecontoh']['name'])){			

			$customer_id = $this->session->userdata('id_customer');
			$cart_id = $this->session->userdata('cart_id');
			
			if($cart_id){
				$datacart = array(
					'cart_id' => $cart_id,
					'product_id' => $this->input->post('product_id'),
					'material_id' => $this->input->post('bahankartu'),
					'facetype_id' => $this->input->post('jenismuka'),
					'laminasi_id' => $this->input->post('jenislaminasi'),
					'finishing_id' => $this->input->post('jenisfinishing'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);

				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}else{
				$data = array(
					'customer_id' => $customer_id,
					'is_completed' => 'F'
				);
	
				$cartid = $this->Carts->insertData($data);
				$data_session['cart_id'] = $cartid;
				$this->session->set_userdata($data_session);
	
				$datacart = array(
					'cart_id' => $cartid,
					'product_id' => $this->input->post('product_id'),
					'material_id' => $this->input->post('bahankartu'),
					'facetype_id' => $this->input->post('jenismuka'),
					'laminasi_id' => $this->input->post('jenislaminasi'),
					'finishing_id' => $this->input->post('jenisfinishing'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);
				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}
		}						
   }

	function addrollbanner()
   {
		$config['upload_path'] = './public/orders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/orders')) {
			mkdir('./public/orders', 0777, true);
		}

		if (!empty($_FILES['filecontoh']['name'])) {
			if ($this->upload->do_upload('filecontoh')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/orders/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/orders/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$customer_id = $this->session->userdata('id_customer');
				$cart_id = $this->session->userdata('cart_id');
				
				if($cart_id){
					$datacart = array(
						'cart_id' => $cart_id,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukuran'),
						'material_id' => $this->input->post('bahan'),						
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);

					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}else{
					$data = array(
						'customer_id' => $customer_id,
						'is_completed' => 'F'
					);
		
					$cartid = $this->Carts->insertData($data);
					$data_session['cart_id'] = $cartid;
					$this->session->set_userdata($data_session);
		
					$datacart = array(
						'cart_id' => $cartid,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukuran'),
						'material_id' => $this->input->post('bahan'),						
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);
					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}
			}

		}else if(empty($_FILES['filecontoh']['name'])){			

			$customer_id = $this->session->userdata('id_customer');
			$cart_id = $this->session->userdata('cart_id');
			
			if($cart_id){
				$datacart = array(
					'cart_id' => $cart_id,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukuran'),
					'material_id' => $this->input->post('bahan'),											
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);

				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}else{
				$data = array(
					'customer_id' => $customer_id,
					'is_completed' => 'F'
				);
	
				$cartid = $this->Carts->insertData($data);
				$data_session['cart_id'] = $cartid;
				$this->session->set_userdata($data_session);
	
				$datacart = array(
					'cart_id' => $cartid,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukuran'),
					'material_id' => $this->input->post('bahan'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);
				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}
		}						
   }

	function addstandbanner()
   {
		$config['upload_path'] = './public/orders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/orders')) {
			mkdir('./public/orders', 0777, true);
		}

		if (!empty($_FILES['filecontoh']['name'])) {
			if ($this->upload->do_upload('filecontoh')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/orders/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/orders/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$customer_id = $this->session->userdata('id_customer');
				$cart_id = $this->session->userdata('cart_id');
				
				if($cart_id){
					$datacart = array(
						'cart_id' => $cart_id,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukuran'),
						'material_id' => $this->input->post('bahan'),						
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);

					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}else{
					$data = array(
						'customer_id' => $customer_id,
						'is_completed' => 'F'
					);
		
					$cartid = $this->Carts->insertData($data);
					$data_session['cart_id'] = $cartid;
					$this->session->set_userdata($data_session);
		
					$datacart = array(
						'cart_id' => $cartid,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukuran'),
						'material_id' => $this->input->post('bahan'),						
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);
					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}
			}

		}else if(empty($_FILES['filecontoh']['name'])){			

			$customer_id = $this->session->userdata('id_customer');
			$cart_id = $this->session->userdata('cart_id');
			
			if($cart_id){
				$datacart = array(
					'cart_id' => $cart_id,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukuran'),
					'material_id' => $this->input->post('bahan'),											
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);

				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}else{
				$data = array(
					'customer_id' => $customer_id,
					'is_completed' => 'F'
				);
	
				$cartid = $this->Carts->insertData($data);
				$data_session['cart_id'] = $cartid;
				$this->session->set_userdata($data_session);
	
				$datacart = array(
					'cart_id' => $cartid,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukuran'),
					'material_id' => $this->input->post('bahan'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);
				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}
		}						
   }
	function addbrosur()
   {
		$config['upload_path'] = './public/orders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '131072'; //5MB
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);				
		$this->load->library('upload', $config);

		if (!is_dir('public/orders')) {
			mkdir('./public/orders', 0777, true);
		}
		if (!empty($_FILES['filecontoh']['name'])) {
			if ($this->upload->do_upload('filecontoh')) {
				$foto = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './public/orders/' . $foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '50%';
				$config['width'] = 626;
				$config['height'] = 420;
				$config['new_image'] = './public/orders/' . $foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$customer_id = $this->session->userdata('id_customer');
				$cart_id = $this->session->userdata('cart_id');
				
				if($cart_id){
					$datacart = array(
						'cart_id' => $cart_id,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukurankertas'),
						'facetype_id' => $this->input->post('jenismuka'),
						'laminasi_id' => $this->input->post('jenislaminasi'),
						'finishing_id' => $this->input->post('jenisfinishing'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);

					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}else{
					$data = array(
						'customer_id' => $customer_id,
						'is_completed' => 'F'
					);
		
					$cartid = $this->Carts->insertData($data);
					$data_session['cart_id'] = $cartid;
					$this->session->set_userdata($data_session);
		
					$datacart = array(
						'cart_id' => $cartid,
						'product_id' => $this->input->post('product_id'),
						'size_id' => $this->input->post('ukurankertas'),
						'facetype_id' => $this->input->post('jenismuka'),
						'laminasi_id' => $this->input->post('jenislaminasi'),
						'finishing_id' => $this->input->post('jenisfinishing'),
						'filecontoh' => $foto['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'quantity' => $this->input->post('quantity'),
						'price' => $this->input->post('price')
					);
					$this->Cartsitems->insertData($datacart);
					$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					redirect('Cart');
				}
			}

		}else if(empty($_FILES['filecontoh']['name'])){			

			$customer_id = $this->session->userdata('id_customer');
			$cart_id = $this->session->userdata('cart_id');
			
			if($cart_id){
				$datacart = array(
					'cart_id' => $cart_id,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukurankertas'),
					'facetype_id' => $this->input->post('jenismuka'),
					'laminasi_id' => $this->input->post('jenislaminasi'),
					'finishing_id' => $this->input->post('jenisfinishing'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
				);

				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}else{
				$data = array(
					'customer_id' => $customer_id,
					'is_completed' => 'F'
				);
	
				$cartid = $this->Carts->insertData($data);
				$data_session['cart_id'] = $cartid;
				$this->session->set_userdata($data_session);
	
				$datacart = array(
					'cart_id' => $cartid,
					'product_id' => $this->input->post('product_id'),
					'size_id' => $this->input->post('ukurankertas'),
					'facetype_id' => $this->input->post('jenismuka'),
					'laminasi_id' => $this->input->post('jenislaminasi'),
					'finishing_id' => $this->input->post('jenisfinishing'),					
					'keterangan' => $this->input->post('keterangan'),
					'quantity' => $this->input->post('quantity'),
					'price' => $this->input->post('price')
					
				);
				$this->Cartsitems->insertData($datacart);
				$this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
				redirect('Cart');
			}
		}						
   }

	 public function addundangan()
	 {
			 $customer_id = $this->session->userdata('id_customer');
			 $cart_id = $this->session->userdata('cart_id');

			 $data = array(
					 'customer_id' => $customer_id,
					 'is_completed' => 'F'
			 );
			 // Mendapatkan nilai quantity dan price dari input POST
			 $quantity = $this->input->post('quantity');
			 $price = $this->input->post('price');
			 // Validasi quantity
			 if (empty($quantity)) {
					 $quantity = 0; // Atau sesuaikan dengan penanganan error yang sesuai
			 }
			 // Validasi price
			 if (empty($price)) {
					 $price = 0; // Atau sesuaikan dengan penanganan error yang sesuai
			 }
			 // Memeriksa apakah ada keranjang aktif
			 if ($cart_id) {
					 // Jika ada keranjang, masukkan data ke cartsitems dan undangans
					 $datacart = array(
							 'cart_id' => $cart_id,
							 'product_id' => $this->input->post('product_id'),
							 'template_id' => $this->input->post('model_undangan'),
							 'quantity' => $quantity, // Menggunakan nilai yang sudah divalidasi
							 'price' => $price // Menggunakan nilai yang sudah divalidasi
					 );
					 $cartitems_id = $this->Cartsitems->insertData($datacart);
					 // Data untuk tabel undangans
					 $dataundangan = array(
							 'cartsitem_id' => $cartitems_id,
							 'nama_wanita' => $this->input->post('nama_wanita'),
							 'panggilan_wanita' => $this->input->post('panggilan_wanita'),
							 'ayah_wanita' => $this->input->post('ayah_wanita'),
							 'ibu_wanita' => $this->input->post('ibu_wanita'),
							 'alamat_wanita' => $this->input->post('alamat_wanita'),
							 'nama_pria' => $this->input->post('nama_pria'),
							 'panggilan_pria' => $this->input->post('panggilan_pria'),
							 'ayah_pria' => $this->input->post('ayah_pria'),
							 'ibu_pria' => $this->input->post('ibu_pria'),
							 'alamat_pria' => $this->input->post('alamat_pria'),
							 'jamakad' => $this->input->post('jamakad'),
							 'tempatakad' => $this->input->post('tempatakad'),
							 'tanggalakad' => $this->input->post('tanggalakad'),
							 'jamresepsi' => $this->input->post('jamresepsi'),
							 'tempatresepsi' => $this->input->post('tempatresepsi'),
							 'tanggalresepsi' => $this->input->post('tanggalresepsi'),
							 'turut1' => $this->input->post('turut1'),
							 'turut2' => $this->input->post('turut2'),
							 'turut3' => $this->input->post('turut3'),
							 'turut4' => $this->input->post('turut4'),
							 'turut5' => $this->input->post('turut5'),
							 'model_undangan' => $this->input->post('model_undangan'),
							 'harga' => $price, // Menggunakan nilai yang sudah divalidasi
							 'jmlpesanan' => $quantity, // Menggunakan nilai yang sudah divalidasi
							 'customer_id' => $customer_id,
							 'namapemesan' => $this->session->userdata('name'),
							 'emailpemesan' => $this->session->userdata('email'),
							 'telepon' => $this->session->userdata('phone'),
							 'status' => 'Belum Diperiksa',
					 );

					 // Memasukkan data undangan ke dalam tabel
					 $this->Undangans->insertData($dataundangan);
					 $this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					 redirect('Cart');
			 } else {
					 // Jika tidak ada keranjang, buat keranjang baru dan masukkan data ke carts dan undangans
					 $cartid = $this->Carts->insertData($data);
					 $data_session['cart_id'] = $cartid;
					 $this->session->set_userdata($data_session);

					 $datacart = array(
							 'cart_id' => $cartid,
							 'product_id' => $this->input->post('product_id'),
							 'template_id' => $this->input->post('model_undangan'),
							 'quantity' => $quantity, // Menggunakan nilai yang sudah divalidasi
							 'price' => $price // Menggunakan nilai yang sudah divalidasi
					 );
					 $cartitems_id = $this->Cartsitems->insertData($datacart);
					 // Data untuk tabel undangans
					 $dataundangan = array(
							 'cartsitem_id' => $cartitems_id,
							 'nama_wanita' => $this->input->post('nama_wanita'),
							 'panggilan_wanita' => $this->input->post('panggilan_wanita'),
							 'ayah_wanita' => $this->input->post('ayah_wanita'),
							 'ibu_wanita' => $this->input->post('ibu_wanita'),
							 'alamat_wanita' => $this->input->post('alamat_wanita'),
							 'nama_pria' => $this->input->post('nama_pria'),
							 'panggilan_pria' => $this->input->post('panggilan_pria'),
							 'ayah_pria' => $this->input->post('ayah_pria'),
							 'ibu_pria' => $this->input->post('ibu_pria'),
							 'alamat_pria' => $this->input->post('alamat_pria'),
							 'jamakad' => $this->input->post('jamakad'),
							 'tempatakad' => $this->input->post('tempatakad'),
							 'tanggalakad' => $this->input->post('tanggalakad'),
							 'jamresepsi' => $this->input->post('jamresepsi'),
							 'tempatresepsi' => $this->input->post('tempatresepsi'),
							 'tanggalresepsi' => $this->input->post('tanggalresepsi'),
							 'turut1' => $this->input->post('turut1'),
							 'turut2' => $this->input->post('turut2'),
							 'turut3' => $this->input->post('turut3'),
							 'turut4' => $this->input->post('turut4'),
							 'turut5' => $this->input->post('turut5'),
							 'model_undangan' => $this->input->post('model_undangan'),
							 'harga' => $price, // Menggunakan nilai yang sudah divalidasi
							 'jmlpesanan' => $quantity, // Menggunakan nilai yang sudah divalidasi
							 'customer_id' => $customer_id,
							 'namapemesan' => $this->session->userdata('name'),
							 'emailpemesan' => $this->session->userdata('email'),
							 'telepon' => $this->session->userdata('phone'),
							 'status' => 'Belum Diperiksa',
					 );
					 // Memasukkan data undangan ke dalam tabel
					 $this->Undangans->insertData($dataundangan);
					 $this->session->set_flashdata("success", "Tambah Keranjang Berhasil");
					 redirect('Cart');
			 }
	 }

}