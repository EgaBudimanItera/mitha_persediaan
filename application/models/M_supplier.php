<?php


class M_supplier extends CI_Model {

	function simpan_supplier($data){
        $this->db->insert('supplier', $data);
        return true;
    }

    function ubah_supplier($param_id, $id, $data){       
        $this->db->where($param_id, $id);
        $this->db->update('supplier', $data); 
        return true;
    }

    function list_supplier(){
         return $query = $this->db->get('supplier')->result();  
    }

    function hapus_supplier($param_id, $id){
        $this->db->delete('supplier', array($param_id => $id)); 
        return true;
    }

    function ambil_supplier($param_id, $id){
       return $this->db->get_where('supplier', array($param_id => $id));
    }

    function id_supplier(){
    	//K002
    	$this->db->select('Right(spliId,3) as kode',false);
    	
    	$this->db->order_by('spliId','DESC');
    	$this->db->limit(1);
    	$query = $this->db->get('supplier');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "S".$kodemax;
        return $kodejadi;
   	}
}