<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index(){
        $data = array(
            'page' => 'user/datauser',
            'link' => 'user',
            'list' => $this->M_user->list_user(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}