<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Account extends MY_Controller
{
   function __construct()
   {
      parent::__construct();

      $this->load->library('session');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->model('Customers');
   }

   public function index()
   {
      $this->data['title'] = "Account Customer | Lestari Printing";
      $this->template->public_render('public/account/account', $this->data);     
   }

   public function profil()
   {
      $this->data['title'] = "Pofil | Lestari Printing";
      $customer_id = $this->session->userdata('id_customer');
      $this->data['profil'] = $this->Customers->getDataWhere($customer_id);
      $this->template->public_render('public/account/profil', $this->data);     
   }

   function updateprofil()
	{
		$customer_id = $this->session->userdata('id_customer');
      $password = $this->input->post("password");

      if($password){
         $data = array(
            'name' => $this->input->post("name"),
            'phone' => $this->input->post("phone"),
            'email' => $this->input->post("email"),
            'password' => sha1($this->input->post("password"))
         );
         $this->Customers->updateData($customer_id, $data);
         $this->session->set_flashdata("update", "Ubah Data Profil Berhasil");
         redirect('Account/profil');
      }else{
         $data = array(
            'name' => $this->input->post("name"),
            'phone' => $this->input->post("phone"),
            'email' => $this->input->post("email")         
         );
         $this->Customers->updateData($customer_id, $data);
         $this->session->set_flashdata("update", "Ubah Data Profil Berhasil");
         redirect('Account/profil');
      }		
	}

   public function masuk()
   {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $data = array(
         'email' => $email,
         'password' => sha1($password)
      );

      $cek = $this->Customers->check($data)->num_rows();
      if ($cek > 0) {
         $customer = $this->Customers->getCustomer($email);
         foreach ($customer as $cus) {
               $data_session['logged_in'] = 'yes';
               $data_session['id_customer'] = $cus->id_customer;
               $data_session['name'] = $cus->name;
               $data_session['email'] = $cus->email;
               $data_session['phone'] = $cus->phone;               
               $data_session['stts'] = 'Customer';
         }
         $this->session->set_userdata($data_session);
         redirect('Account');
      } else {
         $this->session->set_flashdata("error", "Login Gagal, cek kembali Username dan password anda");
         redirect('Account');
      }
   }
   
   function daftar()
	{
      $data['name'] = $this->input->post('name');      
      $data['phone'] = $this->input->post('phone');
      $data['email'] = $this->input->post('email');
      $data['password'] = sha1($this->input->post("password"));
		
		$register = $this->Customers->insertData($data);

      if($register){         
         $customer = $this->Customers->getCustomer($data['email']);
         foreach ($customer as $cus) {
            $data_session['logged_in'] = 'yes';
            $data_session['id_customer'] = $cus->id_customer;
            $data_session['name'] = $cus->name;
            $data_session['email'] = $cus->email;
            $data_session['phone'] = $cus->phone;               
            $data_session['stts'] = 'Customer';
         }
         $this->session->set_userdata($data_session);        
      }
		$this->session->set_flashdata("success", "Daftar Akun Berhasil");
      redirect('Account');
	}

   public function signout()
   {
      $this->session->sess_destroy();
      redirect('', 'refresh');
   }
}