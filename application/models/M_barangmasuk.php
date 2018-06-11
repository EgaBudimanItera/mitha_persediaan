<?php


class M_barangmasuk extends CI_Model {
	
	function simpan_barangmasuk($data){
        $this->db->insert('barangmasuk', $data);
        return true;
    }

    function hapus_barangmasuk($param_id, $id){
        $this->db->delete('barangmasuk', array($param_id => $id)); 
        return true;
    }

    function ambil_barangmasuk($param_id, $id){
       return $this->db->get_where('barangmasuk', array($param_id => $id));
    }

    function list_barangmasuk(){
        $query = $this->db->query("SELECT dbmkBrmkId, brmkTanggal, spliNama, sum(dbmkHarga*dbmkJumlah) as total FROM vw_barangmasuk GROUP BY dbmkBrmkId ORDER BY dbmkBrmkId DESC");
         return $query;  
    }

    function id_barangmasuk(){
    	//BMmmYY  000001
    	$this->db->select('Right(brmkId,6) as kode',false);
    	
    	$this->db->order_by('brmkId','asc');
    	$this->db->limit(1);
    	$query = $this->db->get('barangmasuk');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
        $kodejadi  = "BM".date('my')."-".$kodemax;
        return $kodejadi;
   	}
}