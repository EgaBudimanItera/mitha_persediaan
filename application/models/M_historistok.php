<?php


class M_historistok extends CI_Model {
	
	function simpan_historistok($data){
        $this->db->insert('historistok', $data);
        return true;
    }

    function ambil_historistok($param_id, $id){
       return $this->db->get_where('historistok', array($param_id => $id));
    }

}