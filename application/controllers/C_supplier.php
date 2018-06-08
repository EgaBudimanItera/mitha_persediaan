<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_supplier');
	}

    public function index(){
        $data = array(
            'page' => 'supplier/datasupplier',
            'link' => 'supplier',
            'list' => $this->M_supplier->list_supplier(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}