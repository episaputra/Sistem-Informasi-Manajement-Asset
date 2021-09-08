<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Ubah Data Kategori
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('KategoriController/ubah'); ?>
                                

                                 <div class="form-group" hidden>
                                    <label>ID Kategori</label>
                                    <input type="text" name="idKategoriAset" class="form-control" required value="<?php echo $record['idKategoriAset']?>"  readonly>
                                    
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="namaKategoriAset"  class="form-control" required value="<?php echo $record['namaKategoriAset']?>" >
                                    
                                </div>
               
                               
                <?php echo anchor('KategoriController','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
               <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
