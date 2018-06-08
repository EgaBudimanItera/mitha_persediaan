<?php


class M_kategori extends CI_Model {
	
	function simpan_kategori($data){
        $this->db->insert('kategori', $data);
        return true;
    }

    function ubah_kategori($param_id, $id, $data){       
        $this->db->where($param_id, $id);
        $this->db->update('kategori', $data); 
        return true;
    }

    function hapus_kategori($param_id, $id){
        $this->db->delete('kategori', array($param_id => $id)); 
        return true;
    }

    function list_kategori(){
         return $query = $this->db->get('kategori')->result();  
    }

    function ambil_kategori($param_id, $id){
       return $this->db->get_where('kategori', array($param_id => $id));
    }

    function id_kategori(){
    	//K002
    	$this->db->select('Right(ktgrId,3) as kode',false);
    	
    	$this->db->order_by('ktgrId','asc');
    	$this->db->limit(1);
    	$query = $this->db->get('kategori');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "K".$kodemax;
        return $kodejadi;
   	}
}