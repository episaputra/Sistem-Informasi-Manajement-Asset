<?php
class LaporanController extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('LaporAsetModel');
        $this->load->library('pdf');
    }

    function index(){

        $this->template->load('template','laporan/laporan');
    }   

    function laporan(){

    	$tanggal1=$this->input->post('tanggal1');
    	$tanggal2=$this->input->post('tanggal2');

    	$data = $this->LaporAsetModel->laporan($tanggal1,$tanggal2)->result();

        $pdf = new pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Laporan Aset');
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('SIM ASET');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetFont('times','',10);
        $pdf->AddPage('P');


        ob_start();  
?>
	<table>
		<tr>
			<td style="text-align: center;">
				<h2>Laporan Aset </h2>
			</td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<h3>Periode : <?= $tanggal1 ?> s/d <?= $tanggal1 ?></h3>
			</td>
		</tr>
	</table>

    <table border="1" >
    <tr>
    	<td style="text-align: center; width: 6%;">No</td>
    	<td style="text-align: center;">Tanggal</td>
    	<td style="text-align: center;">Kode Aset</td>
    	<td style="text-align: center;">Nama Aset</td>
    	<td style="text-align: center;">Kondisi Aset</td>
    	<td style="text-align: center;">Catatan</td>

    </tr>
<?php
$no=1;
foreach ($data as $v) {
?>
	<tr>
		<td> <?= $no ?> </td>
    	<td> <?= date('d-m-Y h:i:s',strtotime($v->tanggalPerubahanKondisiRiwayat)) ?></td>
    	<td> <?= $v->kodeAset ?></td>
    	<td> <?= $v->namaAset ?></td>
    	<td> <?= $v->kondisiAsetRiwayat ?></td>
    	<td> <?= $v->catatanAsetRiwayat ?></td>	
    </tr>
<?php
$no++;
}
?>
    </table>
 
<?php
        $pdf->writeHTML(ob_get_contents());
        ob_clean();
        $pdf->Output('Laporan Aset'.$tanggal1.' - '.$tanggal2.'  .pdf', 'I');

    }

}
  ?>
