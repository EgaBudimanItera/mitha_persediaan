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
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'supplier/tambahsupplier',
            'link' => 'supplier',
            'id_supplier' => $this->M_supplier->id_supplier()
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formubah(){
        $splId =$this->uri->segment(3);
         $data = array(
            'page' => 'supplier/ubahsupplier',
            'link' => 'supplier',
            'list' => $this->M_supplier->ambil_supplier('spliId',$splId)->row(),
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function tambahsupplier(){
        $data = array(
            'spliId' => $this->M_supplier->id_supplier(),
            'spliNama' => $this->input->post('spliNama', true),
            'spliOwner' => $this->input->post('spliOwner', true),
            'spliAlamat' => $this->input->post('spliAlamat', true),
            'spliTelp' => $this->input->post('spliTelp', true),
         );
         $simpankategori = $this->M_supplier->simpan_supplier($data);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_supplier'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahsupplier(){
        $data = array(
            'spliNama' => $this->input->post('spliNama', true),
            'spliOwner' => $this->input->post('spliOwner', true),
            'spliAlamat' => $this->input->post('spliAlamat', true),
            'spliTelp' => $this->input->post('spliTelp', true),
         );
         $simpankategori = $this->M_supplier->ubah_supplier('spliId', $this->input->post('spliId', true),$data);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_supplier'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function hapuskategori(){
     $spliId =$this->uri->segment(3);
     $hapuskategori = $this->M_supplier->hapus_supplier('spliId',$spliId);
     if($hapuskategori){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_supplier'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
}