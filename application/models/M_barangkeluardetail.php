<?php


class M_barangkeluardetail extends CI_Model {
    
    function simpan_barangkeluardetail($data){
        $this->db->insert('barangkeluardetail', $data);
        return true;
    }

    function simpan_barangkeluardetail_batch($data){
    	return $this->db->insert_batch('barangkeluardetail',$data);
        return true;
    }

    function ambil_barangkeluar_detail($param_id, $id){
    	$this->db->from('barangkeluardetail');
    	$this->db->join('barang', 'barang.brngId = barangkeluardetail.dbrkBrngId', 'left');
    	$this->db->where(array($param_id => $id));
    	return $this->db->get();
    }

    function ambil_detail_barang($param_id, $id){
        return $this->db->get_where('barang', array($param_id=>$id));
    }

    function hapus_barangkeluar_detail($param_id, $id){
        $this->db->delete('barangkeluardetail', array($param_id => $id)); 
        return true;
    }
}