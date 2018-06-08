<?php


class M_retur extends CI_Model {
	
	function simpan_retur($data){
        $this->db->insert('retur', $data);
        return true;
    }

    function hapus_retur($param_id, $id){
        $this->db->delete('retur', array($param_id => $id)); 
        return true;
    }

    function ambil_retur($param_id, $id){
       return $this->db->get_where('retur', array($param_id => $id));
    }

    function id_retur(){
    	//BMmmYY  000001
    	$this->db->select('Right(retuId,6) as kode',false);
    	
    	$this->db->order_by('retuId','asc');
    	$this->db->limit(1);
    	$query = $this->db->get('retur');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
        $kodejadi  = "RT".date('my')."-".$kodemax;
        return $kodejadi;
   	}
}