<?php
class LaporAsetController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('AsetModel');
        $this->load->model('LaporAsetModel');
        $this->load->model('KondisiModel');
        $this->load->model('AsetModel');
    }

    function index(){

        $data['record'] = $this->LaporAsetModel->tampilData()->result();
        $this->template->load('template','laporaset/LaporAsetView',$data);

    }


    function terima(){

                $idRiwayat    = $this->uri->segment(3);

                $data = array('persetujuanAsetRiwayat'=>'Diterima');
        
                $this->LaporAsetModel->ubah($data,$idRiwayat);

        
                $data2 = $this->LaporAsetModel->ambilData($idRiwayat)->result(); 

                $data3 = array('kondisiAset'=>$data2[0]->kondisiAsetRiwayat);

                $idAset = $data2[0]->idAsetRiwayat;
                $this->AsetModel->ubah($data3,$idAset);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Perubahan Aset Diterima ! 
                </div>");


                redirect('LaporAsetController');

    }

    function tolak(){


            $idRiwayat    = $this->uri->segment(3);

            $data = array('persetujuanAsetRiwayat'=>'Ditolak');
        
                $this->LaporAsetModel->ubah($data,$idRiwayat);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Perubahan Aset Ditolak ! 
                </div>");


                redirect('LaporAsetController');

    }

    function tambah(){

        if(isset($_POST['submit'])){

            $idAsetRiwayat    = $this->input->post('idAsetRiwayat');
            $kondisiAsetRiwayat      = $this->input->post('kondisiAsetRiwayat');   
            $solusiAsetRiwayat      = $this->input->post('solusiAsetRiwayat');
            $tanggalPerubahanKondisiRiwayat      = date('y-m-d h:i:s');
            $catatanAsetRiwayat      = $this->input->post('catatanAsetRiwayat');   
            $persetujuanAsetRiwayat     = '';

            $data = array('idAsetRiwayat'=>$idAsetRiwayat, 'kondisiAsetRiwayat'=>$kondisiAsetRiwayat,'solusiAsetRiwayat'=>$solusiAsetRiwayat,'tanggalPerubahanKondisiRiwayat'=>$tanggalPerubahanKondisiRiwayat, 'catatanAsetRiwayat'=>$catatanAsetRiwayat, 'persetujuanAsetRiwayat'=>$persetujuanAsetRiwayat);
        
                $this->LaporAsetModel->tambah($data);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Aset Dilaporkan ! 
                </div>");


                redirect('AsetController');

        }

    }


    function laporkan(){
    
            $data['idAset']=  $this->uri->segment(3);
            $data['recordKondisi'] = $this->KondisiModel->tampilData()->result();
            $data['record']=  $this->AsetModel->ambilData($this->uri->segment(3))->row_array();
            $this->template->load('template','laporaset/UpLaporAsetView',$data);
 
    }

}

?>
