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
        $this->load->view('template/wrapper-admin', $data);
	}

	public function lihat_historistok_barang(){
		$id_barang = $this->input->post('barang', true);
		$dari = $this->input->post('dari', true);
		$sampai = $this->input->post('sampai', true);
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
				<td><?=$row->histHargaMasuk?></td>
				<td><?=$row->histTotalMasuk?></td>
				<td><?=$row->histStokKeluar?></td>
				<td><?=$row->histHargaKeluar?></td>
				<td><?=$row->histTotalKeluar?></td>
				<td><?=$row->histStokSaldo?></td>
				<td><?=$row->histHargaSaldo?></td>
				<td><?=$row->histTotalSaldo?></td>
			</tr>
	<?php
		}
	?>
		</table>
	<?php
	}

	public function lihat_historistok_barangcetak(){
		$id_barang = $this->input->post('barang', true);
		$dari = $this->input->post('dari', true);
		$sampai = $this->input->post('sampai', true);
		$this->db->from('historistok');
		$this->db->where('histBrngId', $id_barang);
		$this->db->where('histTanggal >=', $dari);
		$this->db->where('histTanggal <=', $sampai);
		$data = $this->db->get();
	?>
		<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/css/bootstrap.min.css">
		<style type="text/css" media="print">
		  @page { size: landscape; }
		</style>
		<script type="text/javascript">
			window.print();
		</script>
		<center><h4>Kartu Stok Barang</h4></center><hr/>
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
				<td><?=$row->histHargaMasuk?></td>
				<td><?=$row->histTotalMasuk?></td>
				<td><?=$row->histStokKeluar?></td>
				<td><?=$row->histHargaKeluar?></td>
				<td><?=$row->histTotalKeluar?></td>
				<td><?=$row->histStokSaldo?></td>
				<td><?=$row->histHargaSaldo?></td>
				<td><?=$row->histTotalSaldo?></td>
			</tr>
	<?php
		}
	?>
		</table>
	<?php
	}
}