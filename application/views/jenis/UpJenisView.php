<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Ubah Data Jenis Aset
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('JenisController/ubah'); ?>
                                

                                 <div class="form-group" hidden>
                                    <label>ID Jenis Aset</label>
                                    <input type="text" name="idJenisAset" class="form-control" required value="<?php echo $record['idJenisAset']?>"  readonly>
                                    
                                </div>

                                <div class="form-group">
                                    <label>Jenis Aset</label>
                                    <input type="text" name="namaJenisAset" class="form-control" required value="<?php echo $record['namaJenisAset']?>" >
                                    
                                </div>
               
                               
                <?php echo anchor('JenisController','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
