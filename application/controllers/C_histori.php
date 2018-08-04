<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_histori extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('M_historistok');
	}

	public function index(){
		$this->load->model('M_retur');
		$data = array(
            'page' => 'histori/datahistori',
            'link' => 'histori',
            'data_barang' => $this->M_retur->list_barang(),
            'script' => 'script/historistok'
        );
        $this->load->view('templatenew/wrapper', $data);
	}

	public function lihat_historistok_barang(){
		$id_barang = $this->input->post('barang', true);
		$dari = date_format(date_create($this->input->post('dari', true)),"Y-m-d");
		$sampai = date_format(date_create($this->input->post('sampai', true)),"Y-m-d");

		$this->db->from('historistok');
		$this->db->where('histBrngId', $id_barang);
		$this->db->where('histTanggal >=', $dari);
		$this->db->where('histTanggal <=', $sampai);
		$data = $this->db->get();
	?>
		<table class="table table-striped table-bordered">
		    <tr>
		        <td rowspan="2">No</td>
		        <td rowspan="2">Tanggal</td>
		        <td colspan="3">Penerimaan</td>
		        <td colspan="3">Pengeluaran</td>
		        <td colspan="3">Saldo</td>
		    </tr>
		    <tr>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		    </tr>
	<?php
		$no=1;
		foreach ($data->result() as $row) {
	?>
			<tr>
				<td><?=$no++?>.</td>
				<td><?=$row->histTanggal?></td>
				<td><?=$row->histStokMasuk?></td>
				<td><?='RP. '.number_format(round($row->histHargaMasuk), 0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalMasuk),0, ',', '.')?></td>
				<td><?=$row->histStokKeluar?></td>
				<td><?='RP. '.number_format(round($row->histHargaKeluar),0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalKeluar),0, ',', '.')?></td>
				<td><?=$row->histStokSaldo?></td>
				<td><?='RP. '.number_format(round($row->histHargaSaldo),0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalSaldo),0, ',', '.')?></td>
			</tr>
	<?php
		}
	?>
		</table>
	<?php
	}

	public function lihat_historistok_barangcetak(){
		$id_barang = $this->input->post('barang', true);
		$dari = date_format(date_create($this->input->post('dari', true)),"Y-m-d");
		$dari2 = date_format(date_create($this->input->post('dari', true)),"d M Y");
		$sampai = date_format(date_create($this->input->post('sampai', true)),"Y-m-d");
		$sampai2 = date_format(date_create($this->input->post('sampai', true)),"d M Y");
		$ttd = date('d M Y');
		$this->db->from('barang');
		
		$this->db->where('brngId', $id_barang);
		
		$data1 = $this->db->get()->row();

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
		<center><h4>Kartu Stok Barang</h4></center>
		<center><h4>Toko Fadila Jilbab</h4></center>
		<center><h4>Periode <?=$dari2?> S/D <?=$sampai2?></h4></center><hr/>
		<table class="table" >
		  <tr>
		  	<td width="30%">Kode Barang  </td>
		  	<td width="5%">:</td>
		  	<td width="65%"><?=$data1->brngId?></td>
		  </tr>
		  
		  <tr>
		  	<td>Nama Barang  </td>
		  	<td>:</td>
		  	<td><?=$data1->brngNama?></td>
		  </tr>
		</table>
		<br>
		<table class="table table-striped table-bordered">
		    <tr>
		        <td rowspan="2">No</td>
		        <td rowspan="2">Tanggal</td>
		        <td colspan="3">Penerimaan</td>
		        <td colspan="3">Pengeluaran</td>
		        <td colspan="3">Saldo</td>
		    </tr>
		    <tr>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		        <td>Jumlah</td>
		        <td>Harga Satuan</td>
		        <td>Total</td>
		    </tr>
	<?php
		$this->db->from('historistok');
		
		$this->db->where('histBrngId', $id_barang);
		$this->db->where('histTanggal >=', $dari);
		$this->db->where('histTanggal <=', $sampai);
		$data = $this->db->get();
		$no=1;
		foreach ($data->result() as $row) {
	?>
			<tr>
				<td><?=$no++?>.</td>
				<td><?=$row->histTanggal?></td>
				<td><?=$row->histStokMasuk?></td>
				<td><?='RP. '.number_format(round($row->histHargaMasuk), 0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalMasuk),0, ',', '.')?></td>
				<td><?=$row->histStokKeluar?></td>
				<td><?='RP. '.number_format(round($row->histHargaKeluar),0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalKeluar),0, ',', '.')?></td>
				<td><?=$row->histStokSaldo?></td>
				<td><?='RP. '.number_format(round($row->histHargaSaldo),0, ',', '.')?></td>
				<td><?='RP. '.number_format(round($row->histTotalSaldo),0, ',', '.')?></td>
			</tr>
	<?php
		}
	?>
		</table>
		
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
	<?php

	}
}