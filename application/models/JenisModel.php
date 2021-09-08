<?php 

class JenisModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampilData(){
        return $this->db->get('jenisAset');
    }
  
    function tambah($data){
        $this->db->insert('jenisAset',$data);
    }

    function ambilData($idJenisAset){
        $param  =   array('idJenisAset'=>$idJenisAset);
        return $this->db->get_where('jenisAset',$param);
    }

     function cekJenisAset($namaJenisAset){
        return $this->db->query("SELECT * FROM jenisAset WHERE namaJenisAset ='".$namaJenisAset."'");
    }

    function ubah($data,$idJenisAset)
    {

        $this->db->where('idJenisAset',$idJenisAset);
        $this->db->update('jenisAset',$data);
    }
    function hapus($idJenisAset)
    {
        $this->db->where('idJenisAset',$idJenisAset);
        $this->db->delete('jenisAset');
    }

}
 ?>