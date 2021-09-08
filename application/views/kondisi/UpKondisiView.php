<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Ubah Kondisi Aset
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('KondisiController/ubah'); ?>
                                

                                 <div class="form-group" hidden>
                                    <label>ID Kondisi</label>
                                    <input type="text" name="idKondisiAset" class="form-control" required value="<?php echo $record['idKondisiAset']?>"  readonly>
                                    
                                </div>

                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" name="namaKondisiAset"  class="form-control" required value="<?php echo $record['namaKondisiAset']?>" >
                                    
                                </div>
               
                <?php echo anchor('KondisiController','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>               
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
