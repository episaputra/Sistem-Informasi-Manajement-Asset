<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
<?php
if (isset($record['idAset'])) {

?>
            Laporkan
<?php
}else{
?>
        Tambah Data Aset
<?php
}
?>


        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
<?php 
if (isset($record['idAset'])) {
        echo form_open('LaporAsetController/tambah'); 
?>

<?php  
}else{
        echo form_open('LaporAsetController/tambah');    
}
 ?>
            <div class="form-group" >
            <label>ID Aset </label>
            <input type="text" name="idAsetRiwayat" value="<?= $record['idAset'] ?>" readonly class="form-control" required>
            </div>                                

            <div class="form-group">
            <label>Kode Aset </label>
            <input type="text" readonly name="kodeAsetRiwayat" value="<?php  echo $record['kodeAset'];?>" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Nama Aset </label>
            <input type="text" readonly value="<?php echo $record['namaAset']; ?>" name="namaAsetRiwayat" class="form-control" required>
            </div>   

            <div class="form-group">
            <label>Kondisi Aset </label>
            <select class="form-control" name="kondisiAsetRiwayat" required>

                    <option value="<?= $record['kondisiAset'] ?>"><?= $record['kondisiAset'] ?></option>
                    <option> --Kondisi Aset--</option>
<?php
foreach ($recordKondisi as $ks) {
?>
                        <option value="<?= $ks->namaKondisiAset ?>"><?= $ks->namaKondisiAset ?></option>
<?php
}
?>
            </select>
            </div>       

            <div class="form-group">
            <label>Solusi </label>
            <select class="form-control" name="solusiAsetRiwayat" required>
                    <option> --Pilih Solusi--</option>

                    <option value="Perbaiki">Perbaiki</option>
                    <option value="Ganti">Ganti</option>
                    <option value="Tetap Gunakan"> Tetap Gunakan</option>

            </select>
            </div>

            <div class="form-group">
            <label>Catatan </label>
            <textarea name="catatanAsetRiwayat" class="form-control"></textarea>

            </div>  
<?php
if ($this->session->userdata('level')=='Pimpinan') {
?>
            <div class="form-group">
            <label>Persetujuan Kondisi Aset </label>
            <select class="form-control" name="persetujuanAsetRiwayat" required>
                    <option> --Pilih Persetujuan--</option>

                    <option value="Ditolak">Ditolak</option>
                    <option value="Diterima">Diterima</option>
            </select>
            </div>                 
<?php
}
?>

                <?php echo anchor('AsetController','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                | <button type="submit" name="submit" class="btn btn-primary btn-sm">Laporkan</button>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
