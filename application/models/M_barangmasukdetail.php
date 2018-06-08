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
}