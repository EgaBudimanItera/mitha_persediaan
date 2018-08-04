<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_retur extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_retur');
        $this->load->model('M_returdetail');
	}

    public function index(){
        $data = array(
            'page' => 'retur/dataretur',
            'link' => 'retur',
            'list' => $this->M_retur->list_retur()
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formlapretur(){
        $data = array(
            'page' => 'retur/lapretur',
            'link' => 'lapretur',
            
        );
        $this->load->view('templatenew/wrapper', $data);    
    }

    public function formtambah($idbm =  ""){
        $data = array(
            'page' => 'retur/tambahretur',
            'link' => 'retur',
            'id_retur' => $this->M_retur->id_retur(),
            'id_bm' => $idbm,
            'list_barang_masuk' => $this->M_retur->list_barang_masuk(),
            // 'supplier'=> $this->M_retur->list_supplier(),
            'barang' => $this->M_retur->list_barang(),
            'bmnya' => $this->ambil_detail_barang_by_kodebarang($idbm),
            'script' => 'script/retur',

        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function formviewtambah(){
        $data = array(
            'page' => 'retur/databmretur',
            'link' => 'retur',
            'list' => $this->M_retur->list_barangmasuk_to_retur()
        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function kirim($idretur){
       $data=array(
        'retuStatus'=>'Sudah Dikirim'
       );
       $ubahStatus=$this->M_retur->ubah_retur('retuId',$idretur,$data);
       if($ubahStatus){
        $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
        );
        redirect(base_url().'c_retur'); //location 
       }
       else{
        $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
        );
        redirect(base_url().'c_retur'); //location 
       }
    }

    public function tambahbarang(){
        $this->db->trans_begin();
        $data = array(
            'retuId' => $this->input->post('brngId', true),
            'retuBrmkId' => $this->input->post('kodebarangmasuk', true),
            'retuTanggal' => date_format(date_create($this->input->post('tanggalretur', true)),"Y-m-d"),
            'retuKet'=>$this->input->post('retuKet', true),

        );
        // print_r($data);
        // exit();
        $datahistorystok = array();
        $dataDetailBarangMasuk = array();
        $dataupdatebarang = array();
        for($i=0;$i<count($this->input->post('idBarangDetail', true));$i++){
            $dataDetailBarangMasuk[] = array(
                'dretRetuId' => $this->input->post('brngId', true),
                'dretBrngId' => $this->input->post('idBarangDetail', true)[$i],
                'dretJumlah' => $this->input->post('jmlBarangDetail', true)[$i],
                'dretHarga' => $this->input->post('hargaBarangDetail', true)[$i],
            );

            $barang = $this->db->get_where('barang', array('brngId' => $this->input->post('idBarangDetail', true)[$i]));
            $harga_awal = $barang->row()->brngHarga;
            $stok_awal = $barang->row()->brngJumlah;

            $harga_retur = $this->input->post('hargaBarangDetail', true)[$i];
            $stok_retur = $this->input->post('jmlBarangDetail', true)[$i] * -1;

            $stok_akhir = $stok_awal + $stok_retur;
            $harga_akhir = (($harga_awal*$stok_awal) + ($harga_retur*$stok_retur))/$stok_akhir;

            $datahistorystok[] = array(
                'histTanggal' => date('Y-m-d'),
                'histStatus' => 'Retur',
                'histTranId' => $this->input->post('brngId', true),
                'histBrngId' => $this->input->post('idBarangDetail', true)[$i],
                'histStokMasuk' => $stok_retur,
                'histHargaMasuk' => $harga_retur,
                'histTotalMasuk' => $stok_retur * $harga_retur,
                'histStokSaldo' => $stok_akhir,
                'histHargaSaldo' => $harga_akhir,
                'histTotalSaldo' => $stok_akhir * $harga_akhir
            );

            $dataupdatebarang[] = array(
                'brngHarga' => $harga_akhir,
                'brngJumlah' => $stok_akhir
            );
            // $this->db->update('barang', $dataupdatebarang[$i], array('brngId' => $this->input->post('idBarangDetail', true)[$i]));
        }       

        
        $this->db->insert('retur', $data);
        $this->db->insert_batch('returdetail', $dataDetailBarangMasuk);
        // $this->db->insert_batch('historistok', $datahistorystok);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
            redirect(base_url().'c_retur'); //location
        }else{
            $this->db->trans_commit();
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_retur'); //location
        }
    }

    public function hapus_retur_dan_detail(){
        $brngId =$this->uri->segment(3);
            
        $row = $this->M_returdetail->ambil_retur_detail('dretRetuId',$brngId);
        $hapusbarangmasuk = $this->M_retur->hapus_retur('retuId', $brngId);
        $hapusbarangmasukdetail = $this->M_returdetail->hapus_retur_detail('dretRetuId',$brngId);
        if($hapusbarangmasuk){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
            redirect(base_url().'c_retur'); //location
        }else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
        }
    }

    public function formubah(){
        $brngMskId =$this->uri->segment(3);
        $data = array(
            'page' => 'retur/ubahretur',
            'link' => 'retur',
            'list_barang_masuk' => $this->M_retur->list_barang_masuk(),
            'barang' => $this->M_retur->list_barang(),
            'data_retur' => $this->M_retur->ambil_retur('retuId', $brngMskId)->row(),
            'data_retur_detail' => $this->M_returdetail->ambil_barangmasuk_detail('dretRetuId', $brngMskId),
            // 'script' => 'script/ubahbarangkeluar'

        );
        $this->load->view('templatenew/wrapper', $data);
    }

    public function ambil_detail_barang_by_kodebarang($kodebarangmasuk){
        // $kodebarangmasuk = $this->input->post('kodebarangmasuk', true);
        $this->db->from('barangmasukdetail');
        $this->db->join('barang', 'barangmasukdetail.dbmkBrngId = barang.brngId');
        $this->db->where(array('dbmkBrmkId'=>$kodebarangmasuk));
        $this->db->order_by('dbmkBrngId', 'ASC');
        $data = $this->db->get();
        return $data;
        // echo json_encode($data->result_array());
    }

    public function get_stok_harga(){
        $id_barangkeluar = $this->input->post('id_barang', true);
        $kodemasuk=$this->input->post('kode', true);
        $row = $this->M_retur->ambil_detail_barang_retur($kodemasuk,$id_barangkeluar);
        $data = array(
            'jumlah' => $row->row()->dbmkJumlah,
            'harga' => $row->row()->dbmkHarga,
        );
        echo json_encode($data);
    }

    public function cetakretur(){
        $dari = date_format(date_create($this->input->post('dari', true)),"Y-m-d");
        $dari2 = date_format(date_create($this->input->post('dari', true)),"d M Y");
        $sampai = date_format(date_create($this->input->post('sampai', true)),"Y-m-d");
        $sampai2 = date_format(date_create($this->input->post('sampai', true)),"d M Y");
        $ttd = date('d M Y');
        $this->db->select('*')->from('returdetail')->join('retur','dretRetuId=retuId')->join('barang','dretBrngId=brngId', 'left')->where('retuTanggal >=',$dari)->where('retuTanggal <=',$sampai);
        $data=$this->db->get()->result();
        $total_harga = 0;
        $total_jumlah = 0;
        // var_dump($data);
    ?>
        <link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/css/bootstrap.min.css">
        <style type="text/css" media="print">
          @page { size: landscape; },
          .table-borderless td,
          .table-borderless th {
            border: 0;
          }
        </style>
        <script type="text/javascript">
            window.print();
        </script>
        <center><h4>Laporan Retur</h4></center>
        <center><h4>Toko Fadila Jilbab</h4></center>
        <center><h4>Periode <?=$dari2?> S/D <?=$sampai2?></h4></center><hr/>
        <table class="table table-striped table-bordered">
            <tr>
                <td >No</td>
                <td>Kode Retur</td>
                <td>Tanggal</td>
                <td>Nama Barang</td>
                <td>Status</td>
                <td>Harga</td>
                <td>Jumlah</td>
            </tr>
            <?php $no = 1;foreach($data as $row){
                $total_jumlah += $row->dretJumlah;
                $total_harga += $row->dretHarga;
            ?>
            <tr>
                <td><?=$no++?>.</td>
                <td><?=$row->retuId?></td>
                <td><?=date_format(date_create($row->retuTanggal), 'd M Y')?></td>
                <td><?=$row->brngNama?></td>
                <td><?=$row->retuStatus?></td>
                <td><?='Rp. '.number_format($row->dretHarga, 0, ',', '.')?></td>
                <td><?=$row->dretJumlah?></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="5" align="right">Total</td>
                <td><?='Rp. '.number_format($total_harga, 0, ',', '.')?></td>
                <td><?=$total_jumlah?></td>
            </tr>
            <br>
        <table>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bandar Lampung, <?=$ttd?></td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pimpinan</td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp</td>
            <td >&nbsp</td>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(...................................)</td>
          </tr>
        </table>
        </table>
    <?php 

    }
}