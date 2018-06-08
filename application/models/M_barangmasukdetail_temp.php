<?php


class M_barangmasukdetail_temp extends CI_Model {
    
    function simpan_barangmasukdetail_temp($data){
        $this->db->insert('barangmasukdetail_temp', $data);
        return true;
    }

    function hapus_barangmasukdetail_temp($param_id, $id){
        $this->db->delete('barangmasukdetail_temp', array($param_id => $id)); 
        return true;
    }

}