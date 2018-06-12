<?php


class M_barangmasukdetail extends CI_Model {
    
    function simpan_barangmasukdetail($data){
        $this->db->insert('barangmasukdetail', $data);
        return true;
    }

    function simpan_barangmasukdetail_batch($data){
    	return $this->db->insert_batch('barangmasukdetail',$data);
        return true;
    }

    function ambil_barangmasuk_detail($param_id, $id){
    	$this->db->from('barangmasukdetail');
    	$this->db->join('barang', 'barang.brngId = barangmasukdetail.dbmkBrngId', 'left');
    	$this->db->where(array($param_id => $id));
    	return $this->db->get();
    }

    function hapus_barangmasuk_detail($param_id, $id){
        $this->db->delete('barangmasukdetail', array($param_id => $id)); 
        return true;
    }

    function update_barangmasuk_detail_batch($data, $param){
    	$this->db->update_batch('barangmasukdetail', $data, $param);
    	return true;
    }
}