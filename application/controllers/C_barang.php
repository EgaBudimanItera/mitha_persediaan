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
            'list' => $this->M_barang->list_barang_join_kategori(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'barang/tambahbarang',
            'link' => 'barang',
            'kategori' => $this->M_barang->list_kategori(),
            'idbarang' => $this->M_barang->id_barang(),
            'script' => 'script/barang'
        );
        $this->load->view('template/wrapper-admin', $data);   
    }

    public function formubah(){
        $brngId =$this->uri->segment(3);
         $data = array(
            'page' => 'barang/ubahbarang',
            'link' => 'barang',
            'list' => $this->M_barang->ambil_barang('brngId',$brngId)->row(),
            'kategori' => $this->M_barang->list_kategori(),
            'script' => 'script/barang'
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function tambahbarang(){
        $data = array(
            'brngId' => $this->M_barang->id_barang(),
            'brngKtgrId' => $this->input->post('brngKtgrId', true),
            'brngNama' => $this->input->post('brngNama', true),
            'brngKet' => $this->input->post('brngKet', true),
            'brngHarga' => $this->input->post('brngHarga', true),
            'brngJumlah' => $this->input->post('brngJumlah', true),
         );
         $simpankategori = $this->M_barang->simpan_barang($data);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahbarang(){
        $data = array(
            'brngKtgrId' => $this->input->post('brngKtgrId', true),
            'brngNama' => $this->input->post('brngNama', true),
            'brngKet' => $this->input->post('brngKet', true),
            'brngHarga' => $this->input->post('brngHarga', true),
            'brngJumlah' => $this->input->post('brngJumlah', true),
         );
         $simpankategori = $this->M_barang->ubah_barang('brngId', $this->input->post('brngId', true),$data);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function hapuskategori(){
     $brngId =$this->uri->segment(3);
     $hapuskategori = $this->M_barang->hapus_barang('brngId',$brngId);
     if($hapuskategori){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_barang'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
}