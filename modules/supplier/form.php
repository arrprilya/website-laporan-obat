<?php  
// Fungsi untuk pengecekan tampilan form
// Jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- Tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Supplier
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=data_supplier"> Data Supplier </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- Form start -->
          <form role="form" class="form-horizontal" action="modules/supplier/proses.php?act=insert" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Supplier</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_supplier" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kota</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kota" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_telepon" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=data_supplier" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// Jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // Query untuk menampilkan data dari tabel supplier
      $query = mysqli_query($mysqli, "SELECT id_supplier, nama_supplier, alamat, kota, no_telepon FROM is_supplier WHERE id_supplier='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Supplier : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- Tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Supplier
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=data_supplier"> Data Supplier </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- Form start -->
          <form role="form" class="form-horizontal" action="modules/supplier/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Supplier</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_supplier" value="<?php echo $data['id_supplier']; ?>" hidden>
                  <input type="text" class="form-control" name="nama_supplier" value="<?php echo $data['nama_supplier']; ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kota</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kota" value="<?php echo $data['kota']; ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_telepon" value="<?php echo $data['no_telepon']; ?>" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=data_supplier" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>