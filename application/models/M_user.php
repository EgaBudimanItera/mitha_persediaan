<?php


class M_user extends CI_Model {

	function simpan_user($data){
        $this->db->insert('userlogin', $data);
        return true;
    }

    function hapus_user($param_id, $id){
        $this->db->delete('userlogin', array($param_id => $id)); 
        return true;
    }

    function list_user(){
    	return $this->db->get('userlogin');
    }
    
}