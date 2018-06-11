<?php


class M_barang extends CI_Model {

	function simpan_barang($data){
        $this->db->insert('barang', $data);
        return true;
    }

    function ubah_barang($param_id, $id, $data){       
        $this->db->where($param_id, $id);
        $this->db->update('barang', $data); 
        return true;
    }

    function hapus_barang($param_id, $id){
        $this->db->delete('barang', array($param_id => $id)); 
        return true;
    }

    function list_barang(){
         return $query = $this->db->get('barang')->result();  
    }

    function list_barang_join_kategori(){
      $this->db->from('barang');
      $this->db->join('kategori', 'kategori.ktgrId=barang.brngKtgrId', 'left');
      return $this->db->get()->result();
    }

    function list_kategori(){
         return $query = $this->db->get('kategori')->result();  
    }

    function ambil_barang($param_id, $id){
       return $this->db->get_where('barang', array($param_id => $id));
    }

    function hitungjumlahbarang_masuk($jumlahmasuk,$id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $jumlahakhirbarang=$brngId->brngJumlah + $jumlahmasuk;
       return $jumlahakhirbarang;
    }

    function hitunghargabarang_masuk($jumlahmasuk,$hargamasuk,$id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $jumlahawalbarang=$brngId->brngJumlah;
       $jumlahakhirbarang=$brngId->brngJumlah + $jumlahmasuk;
       $hargaawalbarang=$brngId->brngHarga;
       $hargaakhirbarang=(($hargaawalbarang*$jumlahawalbarang)+($hargamasuk*$jumlahmasuk))/($jumlahakhirbarang);
       return $hargaakhirbarang;
    }

    function hitungjumlahbarang_retur($jumlahretur,$id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $jumlahakhirbarang=$brngId->brngJumlah - $jumlahretur;
       return $jumlahakhirbarang;
    }

    function hitunghargabarang_retur($jumlahretur,$hargaretur,$id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $jumlahawalbarang=$brngId->brngJumlah;
       $jumlahakhirbarang=$brngId->brngJumlah - $jumlahretur;
       $hargaawalbarang=$brngId->brngHarga;
       $hargaakhirbarang=(($hargaawalbarang*$jumlahawalbarang)-($hargamasuk*$jumlahretur))/($jumlahakhirbarang);
       return $hargaakhirbarang;
    }

    function hitungjumlahbarang_keluar($jumlahkeluar,$id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $jumlahakhirbarang=$brngId->brngJumlah - $jumlahkeluar;
       return $jumlahakhirbarang;
    }

    function hitunghargabarang_keluar($id){
       $brngId=$this->ambil_barang('brngId',$id)->row();
       $hargaakhirbarang=$brngId->brngHarga;
       return $hargaakhirbarang;
    }

    function id_barang(){
    	//K002
    	$this->db->select('Right(brngId,5) as kode',false);
    	
    	$this->db->order_by('brngId','DESC');
    	$this->db->limit(1);
    	$query = $this->db->get('barang');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi  = "B".$kodemax;
        return $kodejadi;
   	}
}