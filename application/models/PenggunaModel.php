<?php 

class PenggunaModel extends CI_Model {
    function __construct(){
      parent::__construct();
        $this->load->database();
    }


	 function masuk($username,$password)
    {
        $cek=  array('username'=>$username,'password'=>($password));
        return $this->db->get_where('pengguna',$cek);
        
    } 

    function ambiLevelAkses($username){

        return $this->db->query("SELECT level FROM pengguna WHERE username = '".$username."'");
    }


	function tampilData(){
        return $this->db->get('pengguna');
    }
  
    function tambah($data){
        $this->db->insert('pengguna',$data);
    }

    function cekUsername($username){
        return $this->db->query("SELECT * FROM pengguna WHERE username ='".$username."'");
    }

    function ambilData($id)
    {
        $param  =   array('id_user'=>$id);
        return $this->db->get_where('pengguna',$param);
    }

    function ubah($data,$id)
    {

        $this->db->where('id_user',$id);
        $this->db->update('pengguna',$data);
    }
    function hapus($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('pengguna');
    }

}
 ?>