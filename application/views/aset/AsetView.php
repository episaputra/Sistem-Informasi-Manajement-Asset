
                <div class="row">
                    <ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Data Aset</li>
	</ol>
                    
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Data Aset
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                 <a  class="btn btn-primary" href="<?php echo site_url('AsetController/tambah');?>">Tambah Aset</a>


                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
<?php echo $this->session->flashdata('msg');?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                              <!--   <th></th> -->
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Nilai</th>
                                                <th>Kondisi</th>                                                
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                               
                                               <td><?php echo $no?></td>
                                                <td><?php echo $r->kodeAset ?></td>
                                                 <td><?php echo $r->namaAset ?></td>
                                                 <td><?php echo $r->nilaiAset ?></td>
                                                 <td><?php echo $r->kondisiAset ?></td>

                                                  <td class="center">
                                                    
                                                    <a title="Ubah Data" class="btn btn-primary" href="<?php echo site_url('AsetController/ubah/'.$r->idAset);?>">Ubah</span></a>

                                                    <a title="Cetak Voucher" class="btn btn-primary" href="<?php echo site_url('AsetController/voucherPdf/'.$r->idAset);?>">Voucher</span></a>
                                                    
                                                    <a title="Laporkan Aset" class="btn btn-primary" href="<?php echo site_url('LaporAsetController/laporkan/'.$r->idAset);?>">Laporkan</span></a>

                                                    <a title="Hapus Aset" class="btn btn-danger" href="<?php echo site_url('AsetController/hapus/'.$r->idAset);?>"
                                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
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

