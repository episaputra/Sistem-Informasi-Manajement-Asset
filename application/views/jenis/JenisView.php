
                <div class="row">
                    <ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Data Jenis Aset</li>
	</ol>
                    
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Data Jenis Aset
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Jenis Aset
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Aset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="JenisController/tambah" method="POST">

            <div class="form-group">
            <label>Jenis Aset </label>
            <input type="text" name="namaJenisAset" class="form-control" required="">
            </div>

            
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
<?php echo $this->session->flashdata('msg');?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                              <!--   <th></th> -->
                                                <th>No</th>
                                                <th>Jenis Aset</th>
                                                <th>Aksi</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                               
                                             <td><?php echo $no?></td>
                                              <td><?php echo $r->namaJenisAset ?></td>
                                                <td class="center">
                                                    
                                                    
                                                    <a title="Edit"  class="btn btn-primary" href="<?php echo site_url('JenisController/ubah/'.$r->idJenisAset);?>">Ubah</span></a>                                
                                                    
                                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('JenisController/hapus/'.$r->idJenisAset);?>"
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

