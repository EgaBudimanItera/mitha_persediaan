<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barang');
	}

    public function index(){
        $data = array(
            'page' => 'barang/databarang',
            'link' => 'barang',
            'list' => $this->M_barang->list_barang(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'barang/tambahbarang',
            'link' => 'barang',
           
        );
        $this->load->view('template/wrapper-admin', $data);   
    }
}