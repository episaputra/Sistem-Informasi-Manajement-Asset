<?php
class JenisController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('JenisModel');

    }

    function index(){
        
        $data['record'] = $this->JenisModel->tampilData();
        $this->template->load('template','jenis/JenisView',$data);
    }

    function tambah()
    {
        if(isset($_POST['submit'])){

        	$namaJenisAset  	 = $this->input->post('namaJenisAset');
   
            $cekJenisAset = $this->JenisModel->cekJenisAset($namaJenisAset)->result();

            if (count($cekJenisAset) >= 1) {

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Data Jenis Aset ".$namaJenisAset." Telah Ada! 
                </div>");
                 redirect('JenisController');
               // echo "username Telah digunakan";

            }else{
                $data = array('namaJenisAset'=>$namaJenisAset);
        
                $this->JenisModel->tambah($data);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Baru Ditambahkan ! 
                </div>");

                redirect('JenisController');
            }

        }
    
    }
   


    function ubah()
    {
       if(isset($_POST['submit'])){


            $idJenisAset = $this->input->post('idJenisAset');
            $namaJenisAset     = $this->input->post('namaJenisAset');
   
                $data = array('namaJenisAset'=>$namaJenisAset);

                $this->JenisModel->ubah($data,$idJenisAset);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Diubah ! 
                </div>");
                redirect('JenisController');
            
        }
        else{

            $idJenisAset=  $this->uri->segment(3);
            $data['record']=  $this->JenisModel->ambilData($idJenisAset)->row_array();
            
            $this->template->load('template','jenis/UpJenisView',$data);

        }   
    }

 function hapus()
    {
        $idJenisAset=  $this->uri->segment(3);
        $this->JenisModel->hapus($idJenisAset);

        echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Dihapus ! 
                </div>");
        redirect('JenisController');
    }

}
  ?>
