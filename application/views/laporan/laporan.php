<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Laporan
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('LaporanController/laporan'); ?>
                              
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date"  name="tanggal1" class="form-control" required >
                    </div>
                     <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggal2" class="form-control" required >
                    </div>
                               
               
                <?php echo anchor('Laporan','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
                 <button type="submit" name="submit" class="btn btn-primary btn-sm">Unduh</button>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
