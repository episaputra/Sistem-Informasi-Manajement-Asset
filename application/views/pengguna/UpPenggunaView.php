<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Ubah Data Pengguna
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('PenggunaController/ubah'); ?>
                                

                                 <div class="form-group" hidden>
                                    <label>ID User</label>
                                    <input type="text" name="id_user" class="form-control" required value="<?php echo $record['id_user']?>"  readonly>
                                    
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" readonly class="form-control" required value="<?php echo $record['username']?>" >
                                    
                                </div>
               
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required value="<?php echo $record['password']?>">
                                </div>
                                            <div class="form-group">
                    <label>Level Akses</label>
                    <select class="form-control" name="level" required>
<?php
if ($record['level']!= NULL) {
?>
                    <option value="<?= $record['level'] ?>"><?= $record['level'] ?></option>
<?php
}
?>
                       <option> --Level Akses--</option>
                       <option value="Pimpinan">Pimpinan</option>
                       <option value="Kasubag">Kasubag</option>
                    </select>
                </div>

                               
                <?php echo anchor('PenggunaController','Kembali',array('class'=>'btn btn-danger btn-sm'))?> | 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
