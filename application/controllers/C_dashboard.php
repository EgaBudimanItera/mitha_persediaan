<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barang');
	}

    public function index(){
        $data = array(
            'page' => 'datadashboard',
            'link' => 'dashboard',
            
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}