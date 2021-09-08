<?php
class PenggunaController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('PenggunaModel');

    }

    function index(){
        
        $data['record'] = $this->PenggunaModel->tampilData()->result();
        $this->template->load('template','pengguna/PenggunaView',$data);
    }

    function tambah()
    {
        if(isset($_POST['submit'])){

        	$username  	 = $this->input->post('username');
            $password    = $this->input->post('password');
            $level    = $this->input->post('level');
   
            $cekUsername = $this->PenggunaModel->cekUsername($username)->result();

            if (count($cekUsername) >= 1) {

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Username Telah Digunakan ! 
                </div>");
                 redirect('PenggunaController');
               // echo "username Telah digunakan";

            }else{
                $data = array('username'=>$username, 'password'=>$password,'level'=>$level );
        
                $this->PenggunaModel->tambah($data);
                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Pengguna Baru Ditambahkan ! 
                </div>");
                redirect('PenggunaController');
            }

        }
    
    }
   


    function ubah()
    {
       if(isset($_POST['submit'])){

            // var_dump($_POST);
            // exit();
            $id_user = $this->input->post('id_user');
            $username     = $this->input->post('username');
            $password    = $this->input->post('password');
            $level    = $this->input->post('level');
   
                $data = array('username'=>$username, 'password'=>$password,'level'=>$level );
                $this->PenggunaModel->ubah($data,$id_user);
                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Pengguna Diubah ! 
                </div>");
                redirect('PenggunaController');
            
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->PenggunaModel->ambilData($id)->row_array();
            $this->template->load('template','pengguna/UpPenggunaView',$data);
        }   
    }

 function hapus()
    {
        $id=  $this->uri->segment(3);
        $this->PenggunaModel->hapus($id);

        echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Pengguna Dihapus ! 
                </div>");
        redirect('PenggunaController');
    }




}
  ?>
