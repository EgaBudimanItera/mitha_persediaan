<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_histori extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array(
            'page' => 'histori/datahistori',
            'link' => 'histori'
        );
        $this->load->view('template/wrapper-admin', $data);
	}
}