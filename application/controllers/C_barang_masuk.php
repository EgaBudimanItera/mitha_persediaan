<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang_masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barangmasuk');
	}

	public function index(){
		$data = array(
            'page' => 'barangmasuk/databarangmasuk',
            'link' => 'barangmasuk',
            'list' => $this->M_barangmasuk->list_barangmasuk(),
        );
        $this->load->view('template/wrapper-admin', $data);
	}
}