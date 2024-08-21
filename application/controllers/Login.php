<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Login extends MY_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->model('Admins');
   }

   public function index()
   {
      $cek = $this->session->userdata('logged_in');
      if (empty($cek)) {
         $this->data['title'] = "Login | Lestari Printing";
         $this->load->view('login', $this->data);
      } else {
         redirect('Admin');
      }
   }

   public function signin()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $data = array(
         'username' => $username,
         'password' => sha1($password)
      );

      $cek = $this->Admins->check($data)->num_rows();
      if ($cek > 0) {
         $admin = $this->Admins->getAdmin($username);
         foreach ($admin as $adm) {
               $data_session['logged_in'] = 'yes';
               $data_session['id_admin'] = $adm->id;
               $data_session['name'] = $adm->name;
               $data_session['email'] = $adm->email;
               $data_session['telepon'] = $adm->phone;
               $data_session['username'] = $adm->username;               
               $data_session['stts'] = 'Admin';
         }
         $this->session->set_userdata($data_session);
         redirect('Admin');
      } else {
         $this->session->set_flashdata("error", "Login Gagal, cek kembali Username dan password anda");
         redirect('Login');
      }
   }

   public function signout()
   {
      $this->session->sess_destroy();
      redirect('Login', 'refresh');
   }

}