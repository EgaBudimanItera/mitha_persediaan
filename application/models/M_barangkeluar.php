<?php


class M_barangkeluar extends CI_Model {
	
	function simpan_barangkeluar($data){
        $this->db->insert('barangkeluar', $data);
        return true;
    }

    function hapus_barangkeluar($param_id, $id){
        $this->db->delete('barangkeluar', array($param_id => $id)); 
        return true;
    }

    function ambil_barangkeluar($param_id, $id){
       return $this->db->get_where('barangkeluar', array($param_id => $id));
    }

    function id_barangkeluar(){
    	//BMmmYY  000001
    	$this->db->select('Right(brklId,6) as kode',false);
    	
    	$this->db->order_by('brklId','asc');
    	$this->db->limit(1);
    	$query = $this->db->get('barangkeluar');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
        $kodejadi  = "BK".date('my')."-".$kodemax;
        return $kodejadi;
   	}
}