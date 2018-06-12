<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_retur extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_retur');
	}

    public function index(){
        $data = array(
            'page' => 'retur/dataretur',
            'link' => 'retur',
            'list' => $this->M_retur->list_retur()
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}