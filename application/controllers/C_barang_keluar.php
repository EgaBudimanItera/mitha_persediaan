<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang_keluar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barangkeluar');
		$this->load->model('M_barangkeluardetail');
	}

	public function index(){
		$data = array(
            'page' => 'barangkeluar/databarangkeluar',
            'link' => 'barangkeluar',
            'list' => $this->M_barangkeluar->lits_barangkeluar(),
        );
        $this->load->view('template/wrapper-admin', $data);
	}

	public function formtambah(){
		$data = array(
            'page' => 'barangkeluar/tambahbarangkeluar',
            'link' => 'barangkeluar',
            'id_barangkeluar' => $this->M_barangkeluar->id_barangkeluar(),
            'barang' => $this->M_barangkeluar->list_barang(),
            'script' => 'script/barangkeluar'
        );
        $this->load->view('template/wrapper-admin', $data);
	}

	public function tambahbarang(){
		$data = array(
            'brklId' => $this->input->post('brngId', true),
            'brklTanggal' => $this->input->post('tanggalbarangkeluar', true),
            'brklPelanggan' => $this->input->post('pelanggan', true),
            'brklAlamat' => $this->input->post('alamatpelanggan', true),
         );
		$dataDetailBarangMasuk = array();
		$simpankategori = $this->M_barangkeluar->simpan_barangkeluar($data);
		for($i=0;$i<count($this->input->post('idBarangDetail', true));$i++){
			$dataDetailBarangMasuk[] = array(
				'dbrkBrklId' => $this->input->post('brngId', true),
				'dbrkBrngId' => $this->input->post('idBarangDetail', true)[$i],
				'dbrkJumlah' => $this->input->post('jmlBarangDetail', true)[$i],
				'dbrkHarga' => $this->input->post('hargaBarangDetail', true)[$i],
			);
			$this->M_barangkeluardetail->simpan_barangkeluardetail($dataDetailBarangMasuk[$i]);
		}
         
         // $simpan = $this->M_barangkeluardetail->simpan_barangkeluardetail_batch($dataDetailBarangMasuk);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang_keluar'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
	}

}