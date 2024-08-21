<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();        
      $this->data['assets_dir'] = $this->config->item('assets_dir');
      $this->data['public_dir'] = $this->config->item('public_dir');
      $this->data['admin_dir'] = $this->config->item('admin_dir');        
      $this->data['auth_dir'] = $this->config->item('auth_dir');        
      $this->data['upload_dir'] = $this->config->item('upload_dir');

      $this->data['title'] = $this->config->item('page_title');                        
   }

   

}