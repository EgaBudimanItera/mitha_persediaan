<?php


class M_barangkeluardetail_temp extends CI_Model {
    
    function simpan_barangkeluardetail_temp($data){
        $this->db->insert('barangkeluardetail_temp', $data);
        return true;
    }

    function hapus_barangkeluardetail_temp($param_id, $id){
        $this->db->delete('barangkeluardetail_temp', array($param_id => $id)); 
        return true;
    }

}