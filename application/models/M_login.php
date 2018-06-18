<?php


class M_login extends CI_Model {

	function ambil_user($paramId, $id){
    	return $this->db->get_where('userlogin', array($paramId => $id));
    }
    
}