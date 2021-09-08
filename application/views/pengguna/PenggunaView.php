
                <div class="row">
                    <ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Data Pengguna</li>
	</ol>
                    
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Data Pengguna
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Pengguna
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="PenggunaController/tambah" method="POST">

            <div class="form-group">
            <label>Username </label>
            <input type="text" name="username" class="form-control" required="">
            </div>

            <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control" required="">
            </div>

            
            <div class="form-group">
                    <label>Level Akses</label>
                    <select class="form-control" name="level" required>
                       <option> --Level Akses--</option>
                       <option value="Pimpinan">Pimpinan</option>
                       <option value="Kasubag">Kasubag</option>
                       
                    </select>
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
<!-- End Modal-->


<!-- Modal -->
<div class="modal fade" id="ModalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="PenggunaController/ubah" method="POST">

            <div class="form-group">
            <label>Username </label>
            <input type="text" name="username" value="<?= $record[0]->username ?>" class="form-control" required="">
            </div>

            <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" value="<?= $record[0]->password ?>" class="form-control" required="">
            </div>

            
            <div class="form-group">
                    <label>Level Akses</label>
                    <select class="form-control" name="level" required>
                      
<?php
if ($record[0]->level != NULL) {
?>
                         <option value="<?= $record[0]->level ?>"><?= $record[0]->level ?></option>
<?php
}
?>
                       <option> --Level Akses--</option>
                       <option value="Pimpinan">Pimpinan</option>
                       <option value="Kasubag">Kasubag</option>
                       
                    </select>
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
<!-- End Modal-->




                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
<?php echo $this->session->flashdata('msg');?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                              <!--   <th></th> -->
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Level Akses</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record as $r) { ?>
                                            <tr class="gradeU">
                                               
                                             <td><?php echo $no?></td>
                                              <td><?php echo $r->username ?></td>
                                               <td><?php echo $r->level?></td>
                                                <td class="center">
                                                    
                               <a title="Edit"  class="btn btn-primary" href="<?php echo site_url('PenggunaController/ubah/'.$r->id_user);?>">Ubah</span></a>                                
                                                    
                                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('PenggunaController/hapus/'.$r->id_user);?>"
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

