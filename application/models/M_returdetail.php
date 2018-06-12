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

    function hapus_retur_detail($param_id, $id){
        $this->db->delete('returdetail', array($param_id => $id)); 
        return true;
    }
}