<?php
class AsetController extends CI_Controller{

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }
        $this->load->model('AsetModel');
        $this->load->model('JenisModel');
        $this->load->model('KategoriModel');
        $this->load->model('KondisiModel');
        $this->load->library('pdf');
    }

    function index(){
        
        $data['record'] = $this->AsetModel->tampilData();

        $this->template->load('template','aset/AsetView',$data);
    }


    function tambah()
    {
        if(isset($_POST['submit'])){

        	$kodeAset  	 = $this->input->post('kodeAset');
            $namaAset      = $this->input->post('namaAset');   
            $jenisAset      = $this->input->post('jenisAset');
            $kategoriAset      = $this->input->post('kategoriAset');
            $nilaiAset      = $this->input->post('nilaiAset');   
            $lokasiAset      = $this->input->post('lokasiAset');
            $tanggalTerimaAset      = $this->input->post('tanggalTerimaAset');
            $kondisiAset      = $this->input->post('kondisiAset');
            $deskripsiTambahanAset = $this->input->post('deskripsiTambahanAset');

            $cekKode = $this->AsetModel->cekKode($kodeAset)->result();

            if (count($cekKode) >= 1) {

                 echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Data Aset ".$kodeAset." Telah Ada! 
                </div>");
                 redirect('AsetController');
               // echo "username Telah digunakan";

            }else{
            
                $data = array('kodeAset'=>$kodeAset, 'namaAset'=>$namaAset,'jenisAset'=>$jenisAset,'kategoriAset'=>$kategoriAset, 'nilaiAset'=>$nilaiAset, 'lokasiAset'=>$lokasiAset, 'tanggalTerimaAset'=>$tanggalTerimaAset, 'kondisiAset'=>$kondisiAset,'deskripsiTambahanAset'=> $deskripsiTambahanAset);
        
                $this->AsetModel->tambah($data);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Aset Baru Ditambahkan ! 
                </div>");

                redirect('AsetController');
            }

        }else{
    
            $data['recordJenis'] = $this->JenisModel->tampilData()->result();
            $data['recordKategori'] = $this->KategoriModel->tampilData()->result();
            $data['recordKondisi'] = $this->KondisiModel->tampilData()->result();

            $this->template->load('template','aset/UpAsetView',$data);
        }
    
    }
   


    function ubah()
    {
       if(isset($_POST['submit'])){

           
            $idAset = $this->input->post('idAset');
            $kodeAset    = $this->input->post('kodeAset');
            $namaAset      = $this->input->post('namaAset');   
            $jenisAset      = $this->input->post('jenisAset');
            $kategoriAset      = $this->input->post('kategoriAset');
            $nilaiAset      = $this->input->post('nilaiAset');   
            $lokasiAset      = $this->input->post('lokasiAset');
            $tanggalTerimaAset      = $this->input->post('tanggalTerimaAset');
            $kondisiAset      = $this->input->post('kondisiAset');
            $deskripsiTambahanAset  = $this->input->post('deskripsiTambahanAset');


   
                $data = array('kodeAset'=>$kodeAset, 'namaAset'=>$namaAset,'jenisAset'=>$jenisAset,'kategoriAset'=>$kategoriAset, 'nilaiAset'=>$nilaiAset, 'lokasiAset'=>$lokasiAset, 'tanggalTerimaAset'=>$tanggalTerimaAset, 'kondisiAset'=>$kondisiAset,'deskripsiTambahanAset'=>$deskripsiTambahanAset);


                $this->AsetModel->ubah($data,$idAset);

                 echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Aset Diubah ! 
                </div>");
                redirect('AsetController');
            
        }
        else{

            $idAset=  $this->uri->segment(3);

            $data['recordJenis'] = $this->JenisModel->tampilData()->result();
            $data['recordKategori'] = $this->KategoriModel->tampilData()->result();
            $data['recordKondisi'] = $this->KondisiModel->tampilData()->result();

            $data['record']=  $this->AsetModel->ambilData($idAset)->row_array();
            $this->template->load('template','aset/UpAsetView',$data);

        }   
    }



 function hapus()
    {
        $idAset=  $this->uri->segment(3);
        $this->AsetModel->hapus($idAset);

        echo $this->session->set_flashdata("msg","<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Berhasil ! Data Aset Dihapus ! 
                </div>");
        redirect('AsetController');
    }



    function voucherPdf(){

       
        $pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Voucher Aset');
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('SIM ASET');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetFont('times','',10);
        $pdf->AddPage('P');


        $idAset=  $this->uri->segment(3);
        $data=  $this->AsetModel->ambilData($idAset)->result();

        ob_start();  
?>
    <table border="1" >
<?php
foreach ($data as $v) {
?>
    <tr><td rowspan="3" style="width: 30%;"></td><td style="width: 70%;text-align: center;"><?= $v->kodeAset ?></td></tr>
    <tr><td style="text-align: center;"><?= $v->namaAset ?></td></tr>
    <tr><td style="text-align: center;"><?= $v->lokasiAset ?></td></tr>
<?php
}
?>
    </table>
 
<?php
        $pdf->writeHTML(ob_get_contents());
        ob_clean();
        $pdf->Output('VOUCHER ASET .pdf', 'I');

    }
}

?>
