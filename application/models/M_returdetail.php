<?php


class M_returdetail extends CI_Model {
    
    function simpan_returdetail($data){
        $this->db->insert('returdetail', $data);
        return true;
    }

    function simpan_returdetail_batch($data){
    	return $this->db->insert_batch('returdetail',$data);
        return true;
    }

    function ambil_retur_detail($param, $id){
    	return $this->db->get_where('returdetail', array($param => $id));
    }

    function ambil_barangmasuk_detail($param_id, $id){
    	$this->db->from('returdetail');
    	$this->db->join('barang', 'barang.brngId = returdetail.dretBrngId', 'left');
    	$this->db->where(array($param_id => $id));
    	return $this->db->get();
    }

    function hapus_retur_detail($param_id, $id){
        $this->db->delete('returdetail', array($param_id => $id)); 
        return true;
    }
}