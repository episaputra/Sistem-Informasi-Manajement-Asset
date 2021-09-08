
                <div class="row">
                    <ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Data Aset</li>
	</ol>
                    
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Data Pelaporan Aset
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
<?php echo $this->session->flashdata('msg');?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                              <!--   <th></th> -->
                                                <th>No</th>
                                                <th style="width: 5%;">Waktu</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kondisi</th>  
                                                <th>Solusi</th>                                              
                                                <th>Persetujuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record as $r) { ?>
                                            <tr class="gradeU">
                                               
                                               <td><?php echo $no?></td>
                                               <td><?php echo date('d-m-Y h:i:s',strtotime($r->tanggalPerubahanKondisiRiwayat)); ?></td>
                                                <td><?php echo $r->kodeAset ?></td>
                                                 <td><?php echo $r->namaAset ?></td>
                                                 <td><?php echo $r->kondisiAsetRiwayat ?></td>
                                                 <td><?php echo $r->solusiAsetRiwayat ?></td>

                                                  <td class="center">
<?php
if($r->persetujuanAsetRiwayat == NULL){
?>

                                                    <a title="Setujui Aset" class="btn btn-primary" href="<?php echo site_url('LaporAsetController/terima/'.$r->idRiwayat);?>">Terima</span></a>

                                                    
                                                    <a title="Tolak Aset" class="btn btn-danger" href="<?php echo site_url('LaporAsetController/tolak/'.$r->idRiwayat);?>">Tolak</span></a>
<?php
}elseif ($r->persetujuanAsetRiwayat=='Diterima') {
?>

                                                    <a title="Setujui Aset" class="btn btn-primary">Diterima</span></a>
<?php
}elseif ($r->persetujuanAsetRiwayat=='Ditolak') {
?>
                                                    <a title="Tolak Aset" class="btn btn-danger" >Ditolak</span></a>
<?php
}
?>
                                                 </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->



                <!-- Button trigger modal -->

