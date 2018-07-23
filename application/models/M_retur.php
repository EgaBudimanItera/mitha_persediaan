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

    function list_retur(){
        $this->db->from('retur');
        $this->db->join('barangmasuk', 'barangmasuk.brmkId = retur.retuBrmkId');
        $this->db->join('supplier', 'barangmasuk.brmkSuplId = supplier.spliId');
        return $this->db->get();
    }

    function list_barang_masuk(){
        $this->db->from('barangmasuk');
        $this->db->join('supplier', 'barangmasuk.brmkSuplId = supplier.spliId');
        return $this->db->get();
    }

    function list_barangmasuk_to_retur(){
        $query = $this->db->query("SELECT dbmkBrmkId, brmkTanggal, spliNama, sum(dbmkHarga*dbmkJumlah) as total FROM vw_barangmasuk GROUP BY dbmkBrmkId ORDER BY dbmkBrmkId DESC");
         return $query;  
    }

    function list_barang(){
        return $this->db->get('barang');
    }

    function list_barang_with_suplier(){
        
    }

    function id_retur(){
    	//BMmmYY  000001
    	$this->db->select('Right(retuId,6) as kode',false);
    	
    	$this->db->order_by('retuId','DESC');
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

    function ambil_detail_barang($param_id, $id){
        return $this->db->get_where('barang', array($param_id=>$id));
    }
}