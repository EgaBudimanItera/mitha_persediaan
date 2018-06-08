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
}