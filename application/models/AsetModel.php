<?php 

class AsetModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampilData(){
        return $this->db->get('aset');
    }
  
    function tambah($data){
        $this->db->insert('aset',$data);
    }

    function ambilData($idAset){
        $param  =   array('idAset'=>$idAset);
        return $this->db->get_where('aset',$param);
    }

     function cekKode($kodeAset){
        return $this->db->query("SELECT * FROM aset WHERE kodeAset ='".$kodeAset."'");
    }

    function ubah($data,$idAset)
    {

        $this->db->where('idAset',$idAset);
        $this->db->update('aset',$data);
    }
    function hapus($idAset)
    {
        $this->db->where('idAset',$idAset);
        $this->db->delete('aset');
    }

}
 ?>