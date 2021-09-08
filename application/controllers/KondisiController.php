<?php
class KondisiController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('KondisiModel');

    }

    function index(){
        
        $data['record'] = $this->KondisiModel->tampilData();
        $this->template->load('template','kondisi/KondisiView',$data);
    }

    function tambah()
    {
        if(isset($_POST['submit'])){

        	$namaKondisiAset  	 = $this->input->post('namaKondisiAset');
   
            $cekKondisiAset = $this->KondisiModel->cekKondisiAset($namaKondisiAset)->result();

            if (count($cekKondisiAset) >= 1) {

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Data Kondisi Aset ".$namaKondisiAset." Telah Ada! 
                </div>");
                 redirect('KondisiController');
               // echo "username Telah digunakan";

            }else{
                $data = array('namaKondisiAset'=>$namaKondisiAset);
        
                $this->KondisiModel->tambah($data);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Kondisi Aset Baru Ditambahkan ! 
                </div>");

                redirect('KondisiController');
            }

        }
    
    }
   


    function ubah()
    {
       if(isset($_POST['submit'])){


            $idKondisiAset = $this->input->post('idKondisiAset');
            $namaKondisiAset     = $this->input->post('namaKondisiAset');
   
                $data = array('namaKondisiAset'=>$namaKondisiAset);

                $this->KondisiModel->ubah($data,$idKondisiAset);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Jenis Aset Diubah ! 
                </div>");
                redirect('KondisiController');
            
        }
        else{

            $idKondisiAset=  $this->uri->segment(3);
            $data['record']=  $this->KondisiModel->ambilData($idKondisiAset)->row_array();
            
            $this->template->load('template','kondisi/UpKondisiView',$data);

        }   
    }

 function hapus()
    {
        $idKondisiAset=  $this->uri->segment(3);
        $this->KondisiModel->hapus($idKondisiAset);

        echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Kondisi Aset Dihapus ! 
                </div>");
        redirect('KondisiController');
    }

}
  ?>
