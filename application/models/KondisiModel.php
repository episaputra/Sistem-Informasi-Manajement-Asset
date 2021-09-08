<?php 

class KondisiModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampilData(){
        return $this->db->get('kondisiAset');
    }
  
    function tambah($data){
        $this->db->insert('kondisiAset',$data);
    }

    function ambilData($idKondisiAset){
        $param  =   array('idKondisiAset'=>$idKondisiAset);
        return $this->db->get_where('kondisiAset',$param);
    }

     function cekKondisiAset($namaKondisiAset){
        return $this->db->query("SELECT * FROM kondisiAset WHERE namaKondisiAset ='".$namaKondisiAset."'");
    }

    function ubah($data,$idKondisiAset)
    {

        $this->db->where('idKondisiAset',$idKondisiAset);
        $this->db->update('kondisiAset',$data);
    }
    function hapus($idKondisiAset)
    {
        $this->db->where('idKondisiAset',$idKondisiAset);
        $this->db->delete('kondisiAset');
    }

}
 ?>/