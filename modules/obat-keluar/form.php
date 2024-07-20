<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-edit icon-title"></i> Input Data Obat Keluar
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=obat_keluar"> Obat Keluar </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- Form start -->
        <form role="form" class="form-horizontal" action="modules/obat-keluar/proses.php?act=insert" method="POST" name="formObatKeluar">
          <div class="box-body">
            <?php  
            // Fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi, 7) as kode FROM is_obat_keluar
                                              ORDER BY kode_transaksi DESC LIMIT 1")
                                              or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

            $count = mysqli_num_rows($query_id);

            if ($count <> 0) {
              // Mengambil data kode transaksi
              $data_id = mysqli_fetch_assoc($query_id);
              $kode    = $data_id['kode'] + 1;
            } else {
              $kode = 1;
            }

            // Buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
            $kode_transaksi = "TK-$tahun-$buat_id";
            ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Transaksi</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_keluar" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <label class="col-sm-2 control-label">Obat</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="kode_obat" data-placeholder="-- Pilih Obat --" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                                        or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                  while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                    echo "<option value=\"$data_obat[kode_obat]\"> $data_obat[kode_obat] | $data_obat[nama_obat] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Keluar</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="jumlah_keluar" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                <a href="?module=obat_keluar" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->