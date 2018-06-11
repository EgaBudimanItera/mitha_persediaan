<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang_masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barangmasuk');
		$this->load->model('M_barangmasukdetail');
	}

	public function index(){
		$data = array(
            'page' => 'barangmasuk/databarangmasuk',
            'link' => 'barangmasuk',
            'list' => $this->M_barangmasuk->list_barangmasuk(),
        );
        $this->load->view('template/wrapper-admin', $data);
	}

	public function formtambah(){
		$data = array(
            'page' => 'barangmasuk/tambahbarangmasuk',
            'link' => 'barangmasuk',
            'id_barangmasuk' => $this->M_barangmasuk->id_barangmasuk(),
            'supplier'=> $this->M_barangmasuk->list_supplier(),
            'barang' => $this->M_barangmasuk->list_barang(),
            'script' => 'script/barangmasuk'
        );
        $this->load->view('template/wrapper-admin', $data);
	}

	public function tambahbarang(){
		$data = array(
            'brmkId' => $this->input->post('brngId', true),
            'brmkSuplId' => $this->input->post('brngKtgrId', true),
            'brmkTanggal' => $this->input->post('tanggalbarangmasuk', true)
         );
		$dataDetailBarangMasuk = array();
		for($i=0;$i<count($this->input->post('idBarangDetail', true));$i++){
			$dataDetailBarangMasuk[] = array(
				'dbmkBrmkId' => $this->input->post('brngId', true),
				'dbmkBrngId' => $this->input->post('idBarangDetail', true)[$i],
				'dbmkJumlah' => $this->input->post('jmlBarangDetail', true)[$i],
				'dbmkHarga' => $this->input->post('hargaBarangDetail', true)[$i],
			);
		}
         $simpankategori = $this->M_barangmasuk->simpan_barangmasuk($data);
         $simpan = $this->M_barangmasukdetail->simpan_barangmasukdetail_batch($dataDetailBarangMasuk);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang_masuk'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
	}
}