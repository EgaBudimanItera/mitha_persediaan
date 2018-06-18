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

    function ambil_user($paramId, $id){
    	return $this->db->get_where('userlogin', array($paramId => $id));
    }

    function ubah_user($param_id, $id, $data){       
        $this->db->where($param_id, $id);
        $this->db->update('userlogin', $data); 
        return true;
    }

}