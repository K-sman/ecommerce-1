<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/third_party/fpdf185/fpdf.php'; // Sesuaikan path dengan struktur project Anda

class Pdf extends FPDF {
    public function __construct() {
        parent::__construct();
    }
}
