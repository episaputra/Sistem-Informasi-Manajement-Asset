<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
<?php
if (isset($record['idAset'])) {

?>
            Ubah Data Aset
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
        echo form_open('AsetController/ubah'); 
?>
            <div class="form-group" hidden>
            <label>ID Aset </label>
            <input type="text" name="idAset" value="<?= $record['idAset'] ?>" readonly class="form-control" required>
            </div>
<?php  
}else{
        echo form_open('AsetController/tambah');    
}
 ?>
                                

            <div class="form-group">
            <label>Kode Aset </label>
            <input type="text" name="kodeAset" value="<?php if(isset($record['idAset'])){  echo $record['kodeAset']; } ?>" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Nama Aset </label>
            <input type="text" value="<?php if(isset($record['idAset'])){ echo $record['namaAset'];} ?>" name="namaAset" class="form-control" required>
            </div>   
            <div class="form-group">
            <label>Jenis Aset </label>
            <select class="form-control" name="jenisAset" required>
<?php
if (isset($record['jenisAset'])) {
?>
                        <option value="<?= $record['jenisAset'] ?>"><?= $record['jenisAset'] ?></option>
<?php
}
?>
                       <option> --Jenis Aset--</option>
<?php
foreach ($recordJenis as $j) {
?>
                        <option value="<?= $j->namaJenisAset ?>"><?= $j->namaJenisAset ?></option>
<?php
}
?>
            </select>
            </div>
            <div class="form-group">
            <label>Kategori Aset </label>
            <select class="form-control" name="kategoriAset" required>
<?php
if (isset($record['kategoriAset'])) {
?>
                        <option value="<?= $record['kategoriAset'] ?>"><?= $record['kategoriAset'] ?></option>
<?php
}
?>

                       <option> --Kategori Aset--</option>
<?php
foreach ($recordKategori as $k) {
?>
                        <option value="<?= $k->namaKategoriAset ?>"><?= $k->namaKategoriAset ?></option>
<?php
}
?>
            </select>
            </div>            
     
            <div class="form-group">
            <label>Nilai Aset </label>
            <input type="number" name="nilaiAset" class="form-control" required value="<?php if(isset($record['idAset'])){ echo $record['nilaiAset'];} ?>">
            </div>   
            <div class="form-group">
            <label>Lokasi Aset </label>
            <input type="text" name="lokasiAset" class="form-control" required value="<?php if(isset($record['idAset'])){ echo $record['lokasiAset'];} ?>">
            </div>
            <div class="form-group">
            <label>Tanggal Terima Aset </label>
            <input type="date" name="tanggalTerimaAset" class="form-control" required value="<?php if(isset($record['idAset'])){ echo $record['tanggalTerimaAset'];} ?>">
            </div>         

            <div class="form-group">
            <label>Kondisi Aset (Pertama Kali) </label>
            <select class="form-control" name="kondisiAset" required>
<?php
if (isset($record['kondisiAset'])) {
?>
                        <option value="<?= $record['kondisiAset'] ?>"><?= $record['kondisiAset'] ?></option>
<?php
}
?>
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
            <label>Deskripsi Tambahan </label>
            <textarea name="deskripsiTambahanAset" class="form-control"><?php if(isset($record['idAset'])){ echo $record['deskripsiTambahanAset'];} ?></textarea>

            </div>  

          
                <?php echo anchor('AsetController','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
<?php
if (isset($record['idAset'])) {
?>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>
<?php
}else{
?>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
<?php
}
?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
