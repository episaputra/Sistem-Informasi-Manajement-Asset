<?php 

class LaporAsetModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampilData(){

        return $this->db->query("SELECT * FROM riwayataset INNER JOIN aset ON riwayataset.idAsetRiwayat = aset.idAset ");
    }
  
    function laporan($tanggal1,$tanggal2){
        return $this->db->query("SELECT * FROM riwayataset INNER JOIN aset ON riwayataset.idAsetRiwayat = aset.idAset WHERE persetujuanAsetRiwayat ='Diterima' AND  tanggalPerubahanKondisiRiwayat BETWEEN '".$tanggal1."' AND '".$tanggal2."'");
    }

    function tambah($data){
        $this->db->insert('riwayataset',$data);
    }

    function ambilData($idRiwayat){
        $param  =   array('idRiwayat'=>$idRiwayat);
        return $this->db->get_where('riwayataset',$param);
    }
    
    function ubah($data,$idRiwayat)
    {

        $this->db->where('idRiwayat',$idRiwayat);
        $this->db->update('riwayataset',$data);
    }
    function hapus($idRiwayat)
    {
        $this->db->where('idRiwayat',$idRiwayat);
        $this->db->delete('riwayataset');
    }

}
 ?>