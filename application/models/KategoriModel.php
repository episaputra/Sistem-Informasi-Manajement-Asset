<?php 

class KategoriModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampilData(){
        return $this->db->get('kategoriAset');
    }
  
    function tambah($data){
        $this->db->insert('kategoriAset',$data);
    }

    function ambilData($idKategoriAset){
        $param  =   array('idKategoriAset'=>$idKategoriAset);
        return $this->db->get_where('kategoriAset',$param);
    }

     function cekKategoriAset($namaKategoriAset){
        return $this->db->query("SELECT * FROM kategoriAset WHERE namaKategoriAset ='".$namaKategoriAset."'");
    }

    function ubah($data,$idKategoriAset)
    {

        $this->db->where('idKategoriAset',$idKategoriAset);
        $this->db->update('kategoriAset',$data);
    }
    function hapus($idKategoriAset)
    {
        $this->db->where('idKategoriAset',$idKategoriAset);
        $this->db->delete('kategoriAset');
    }

}
 ?>/