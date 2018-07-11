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
        $this->load->view('templatenew/wrapper', $data);
	}

	public function formtambah(){
		$data = array(
            'page' => 'barangkeluar/tambahbarangkeluar',
            'link' => 'barangkeluar',
            'id_barangkeluar' => $this->M_barangkeluar->id_barangkeluar(),
            'barang' => $this->M_barangkeluar->list_barang(),
            'script' => 'script/barangkeluar'
        );
        $this->load->view('templatenew/wrapper', $data);
	}

	public function tambahbarang(){	
        $this->db->trans_begin();
        $data = array(
            'brklId' => $this->input->post('brngId', true),
            'brklTanggal' => date_format(date_create($this->input->post('tanggalbarangkeluar', true)),"Y-m-d"),
            
            'brklPelanggan' => $this->input->post('pelanggan', true),
            'brklAlamat' => $this->input->post('alamatpelanggan', true),
         );
        $datahistorystok = array();
        $dataDetailBarangMasuk = array();
        $dataupdatebarang = array();
        for($i=0;$i<count($this->input->post('idBarangDetail', true));$i++){
            $dataDetailBarangMasuk[] = array(
                'dbrkBrklId' => $this->input->post('brngId', true),
                'dbrkBrngId' => $this->input->post('idBarangDetail', true)[$i],
                'dbrkJumlah' => $this->input->post('jmlBarangDetail', true)[$i],
                'dbrkHarga' => $this->input->post('hargaBarangDetail', true)[$i],
            );

            $barang = $this->db->get_where('barang', array('brngId' => $this->input->post('idBarangDetail', true)[$i]));
            $harga_awal = $barang->row()->brngHarga;
            $stok_awal = $barang->row()->brngJumlah;

            $harga_out = $this->input->post('hargaBarangDetail', true)[$i];
            $stok_out = $this->input->post('jmlBarangDetail', true)[$i];

            $stok_akhir = $stok_awal - $stok_out;
            $harga_akhir = $stok_akhir * $harga_awal;

            $datahistorystok[] = array(
                'histTanggal' => date('Y-m-d'),
                'histStatus' => 'Barang Keluar',
                'histTranId' => $this->input->post('brngId', true),
                'histBrngId' => $this->input->post('idBarangDetail', true)[$i],
                'histStokKeluar' => $stok_out,
                'histHargaKeluar' => $harga_awal,
                'histTotalKeluar' => $stok_out*$harga_awal,
                'histHargaJual' => $harga_out,
                'histTotalJual' => $harga_out*$stok_out,
                'histStokSaldo' => $stok_akhir,
                'histHargaSaldo' => $harga_awal,
                'histTotalSaldo' => $stok_akhir * $harga_awal
            );

            $dataupdatebarang[] = array(
                'brngHarga' => $harga_akhir,
                'brngJumlah' => $stok_akhir
            );
            // $this->db->update('barang', $dataupdatebarang[$i], array('brngId' => $this->input->post('idBarangDetail', true)[$i]));
        }       

        
        $this->db->insert('barangkeluar', $data);
        $this->db->insert_batch('barangkeluardetail', $dataDetailBarangMasuk);
        // $this->db->insert_batch('historistok', $datahistorystok);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
            redirect(base_url().'c_barang_keluar'); //location
        }else{
            $this->db->trans_commit();
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang_keluar'); //location
        }
	}

    public function formubah(){
        $brngMskId =$this->uri->segment(3);
        $data = array(
            'page' => 'barangkeluar/ubahbarangkeluar',
            'link' => 'barangkeluar',
            'barang' => $this->M_barangkeluar->list_barang(),
            'data_barang_keluar' => $this->M_barangkeluar->ambil_barangkeluar('brklId', $brngMskId)->row(),
            'data_barang_keluar_detail' => $this->M_barangkeluardetail->ambil_barangkeluar_detail('dbrkBrklId', $brngMskId),
            // 'script' => 'script/ubahbarangkeluar'

        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function hapus_barangkeluar_dan_detail(){
        $brngId =$this->uri->segment(3);
            
        $row = $this->M_barangkeluardetail->ambil_barangkeluar_detail('dbrkId',$brngId);
        $hapusbarangmasuk = $this->M_barangkeluar->hapus_barangkeluar('brklId', $brngId);
        $hapusbarangmasukdetail = $this->M_barangkeluardetail->hapus_barangkeluar_detail('dbrkBrklId',$brngId);
        if($hapusbarangmasuk){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
            redirect(base_url().'c_barang_keluar'); //location
        }else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
        }
    }

    public function get_stok_harga(){
        $id_barangkeluar = $this->input->post('id_barang', true);
        $row = $this->M_barangkeluardetail->ambil_detail_barang('brngId', $id_barangkeluar);
        echo 'Stok: '.$row->row()->brngJumlah.' Harga: Rp.'. number_format($row->row()->brngHarga, 0, ',', '.');
    }

}