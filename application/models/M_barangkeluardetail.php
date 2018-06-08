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
}