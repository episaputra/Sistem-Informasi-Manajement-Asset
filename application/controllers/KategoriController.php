<?php
class KategoriController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('KategoriModel');

    }

    function index(){
        
        $data['record'] = $this->KategoriModel->tampilData();
        $this->template->load('template','kategori/KategoriView',$data);
    }

    function tambah()
    {
        if(isset($_POST['submit'])){

        	$namaKategoriAset  	 = $this->input->post('namaKategoriAset');
   
            $cekKategoriAset = $this->KategoriModel->cekKategoriAset($namaKategoriAset)->result();

            if (count($cekKategoriAset) >= 1) {

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Data Kategori Aset ".$namaKategoriAset." Telah Ada! 
                </div>");
                 redirect('KategoriController');
               // echo "username Telah digunakan";

            }else{
                $data = array('namaKategoriAset'=>$namaKategoriAset);
        
                $this->KategoriModel->tambah($data);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data kategori Aset Baru Ditambahkan ! 
                </div>");

                redirect('KategoriController');
            }

        }
    
    }
   


    function ubah()
    {
       if(isset($_POST['submit'])){


            $idKategoriAset = $this->input->post('idKategoriAset');
            $namaKategoriAset     = $this->input->post('namaKategoriAset');
   
                $data = array('namaKategoriAset'=>$namaKategoriAset);

                $this->KategoriModel->ubah($data,$idKategoriAset);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Diubah ! 
                </div>");
                redirect('KategoriController');
            
        }
        else{

            $idKategoriAset=  $this->uri->segment(3);
            $data['record']=  $this->KategoriModel->ambilData($idKategoriAset)->row_array();
            
            $this->template->load('template','kategori/UpKategoriView',$data);

        }   
    }

 function hapus()
    {
        $idKategoriAset=  $this->uri->segment(3);
        $this->KategoriModel->hapus($idKategoriAset);

        echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Dihapus ! 
                </div>");
        redirect('KategoriController');
    }

}
  ?>
