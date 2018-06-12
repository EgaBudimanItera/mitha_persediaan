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

	public function formubah(){
		$brngMskId =$this->uri->segment(3);
		$data = array(
            'page' => 'barangmasuk/ubahbarangmasuk',
            'link' => 'barangmasuk',
            'supplier'=> $this->M_barangmasuk->list_supplier(),
            'barang' => $this->M_barangmasuk->list_barang(),
            'data_barang_masuk' => $this->M_barangmasuk->ambil_barangmasuk('brmkId', $brngMskId)->row(),
            'data_barang_masuk_detail' => $this->M_barangmasukdetail->ambil_barangmasuk_detail('dbmkBrmkId', $brngMskId),
            'script' => 'script/ubahbarangmasuk'

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
		$this->db->trans_begin();
		$this->db->insert('barangmasuk', $data);
		$this->db->insert_batch('barangmasukdetail', $dataDetailBarangMasuk);
         if($this->db->trans_status() === FALSE){
         	$this->db->trans_rollback();
         	$this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
            redirect(base_url().'c_barang_masuk'); //location
         }else{
         	$this->db->trans_commit();
           	$this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            
         }
	}

	public function hapusdetailbarang(){
		$brngId =$this->uri->segment(3);

		$row = $this->M_barangmasukdetail->ambil_barangmasuk_detail('dbmkId',$brngId);
		$hapuskategori = $this->M_barangmasukdetail->hapus_barangmasuk_detail('dbmkId',$brngId);
		if($hapuskategori){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
			);
			redirect(base_url().'c_barang_masuk/formubah/'.$row->row()->dbmkBrmkId); //location
		}else{
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
			);
		}
	}

	public function ubahbarang(){
		$data = array(
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
		$dataforupdatedetail = array();
		for($k=0;$k<count($this->input->post('idbrgdetaile', true)); $k++){
			$dataforupdatedetail[] = array(
				'dbmkId' => $this->input->post('idbrgdetaile')[$k],
				'dbmkJumlah' => $this->input->post('jmlbrgdetaile', true)[$k],
				'dbmkHarga' => $this->input->post('hargabrgdetaile', true)[$k],
			);

			$this->db->update('barangmasukdetail', $dataforupdatedetail[$k], array('dbmkId' => $this->input->post('idbrgdetaile')[$k]));
		}
		// var_dump($dataforupdatedetail);exit();
        $simpankategori = $this->M_barangmasuk->ubah_barangmasuk('brmkId', $this->input->post('brngId', true),$data);
        //update detail barang masuk yang sudah ada
        // $this->db->update_batch('barangmasukdetail', $dataforupdatedetail, 'dbmkId');
        // $update_barang_masuk = $this->M_barangmasukdetail->update_barangmasuk_detail_batch($dataforupdatedetail, 'dbmkId');
        if(count($this->input->post('idBarangDetail', true) ) > 0){
         	$simpan = $this->M_barangmasukdetail->simpan_barangmasukdetail_batch($dataDetailBarangMasuk);
        }
         
        if($simpankategori){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang_masuk/formubah/'.$this->input->post('brngId', true)); //location
        }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
        }
	}

	public function hapus_barangmasuk_dan_detail(){
		$brngId =$this->uri->segment(3);
			
		$row = $this->M_barangmasukdetail->ambil_barangmasuk_detail('dbmkId',$brngId);
		$hapusbarangmasuk = $this->M_barangmasuk->hapus_barangmasuk('brmkId', $brngId);
		$hapusbarangmasukdetail = $this->M_barangmasukdetail->hapus_barangmasuk_detail('dbmkBrmkId',$brngId);
		if($hapusbarangmasuk){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
			);
			redirect(base_url().'c_barang_masuk'); //location
		}else{
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
			);
		}
	}
}