<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_histori extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('M_historistok');
	}

	public function index(){
		$this->load->model('M_retur');
		$data = array(
            'page' => 'histori/datahistori',
            'link' => 'histori',
            'data_barang' => $this->M_retur->list_barang(),
            'script' => 'script/historistok'
        );
        $this->load->view('template/wrapper-admin', $data);
	}
}