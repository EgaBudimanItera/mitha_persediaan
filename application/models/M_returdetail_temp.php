<?php


class M_returdetail_temp extends CI_Model {
    
    function simpan_returdetail_temp($data){
        $this->db->insert('returdetail_temp', $data);
        return true;
    }

    function hapus_returdetail_temp($param_id, $id){
        $this->db->delete('returdetail_temp', array($param_id => $id)); 
        return true;
    }

}