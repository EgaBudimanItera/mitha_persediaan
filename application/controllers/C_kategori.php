<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_kategori');
	}

    public function index(){
        $data = array(
            'page' => 'kategori/datakategori',
            'link' => 'kategori',
            'list' => $this->M_kategori->list_kategori(),            
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'kategori/tambahkategori',
            'link' => 'kategori',
            'list' => $this->M_kategori->id_kategori(),
            'id_kategori' => $this->M_kategori->id_kategori()
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formubah(){
        $ktgrId =$this->uri->segment(3);
         $data = array(
            'page' => 'kategori/ubahkategori',
            'link' => 'kategori',
            'list' => $this->M_kategori->ambil_kategori('ktgrId',$ktgrId)->row(),
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function tambahkategori(){
        $data = array(
            'ktgrId' => $this->M_kategori->id_kategori(),
            'ktgrNama' => $this->input->post('ktgrNama', true),
         );
         $simpankategori = $this->M_kategori->simpan_kategori($data);
         if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_kategori'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahkategori(){
        $ktgrId=$this->input->post('ktgrId', true);
        $data = array(
            'ktgrId' => $ktgrId,
            'ktgrNama' => $this->input->post('ktgrNama', true),
         );
         $ubahkategori = $this->M_kategori->ubah_kategori('ktgrId',$ktgrId,$data);
         if($ubahkategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            redirect(base_url().'c_kategori'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
         }
    }

    public function hapuskategori(){
     $ktgrId =$this->uri->segment(3);
     $hapuskategori = $this->M_kategori->hapus_kategori('ktgrId',$ktgrId);
     if($hapuskategori){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_kategori'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
}