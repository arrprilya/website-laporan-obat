<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Data Obat -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <div class="inner">
          <?php  
          // Query untuk menghitung jumlah data obat
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_obat) as jumlah FROM is_obat")
                                      or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Obat</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php  
        // Tampilkan tombol tambah data jika bukan Manajer
        if ($_SESSION['hak_akses']!='Manajer') { ?>
          <a href="?module=form_obat&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <!-- Data Supplier -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#dd4b39;color:#fff" class="small-box">
        <div class="inner">
          <?php  
          // Query untuk menghitung jumlah data supplier
          $query = mysqli_query($mysqli, "SELECT COUNT(id_supplier) as jumlah FROM is_supplier")
                                      or die('Ada kesalahan pada query tampil Data Supplier: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Supplier</p>
        </div>
        <div class="icon">
          <i class="fa fa-truck"></i>
        </div>
        <?php  
        // Tampilkan tombol tambah data jika bukan Manajer
        if ($_SESSION['hak_akses']!='Manajer') { ?>
          <a href="?module=form_supplier&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <!-- Data Obat Masuk -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#00a65a;color:#fff" class="small-box">
        <div class="inner">
          <?php   
          // Query untuk menghitung jumlah data obat masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_obat_masuk")
                                      or die('Ada kesalahan pada query tampil Data obat Masuk: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Obat Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-in"></i>
        </div>
        <?php  
        // Tampilkan tombol tambah data jika bukan Manajer
        if ($_SESSION['hak_akses']!='Manajer') { ?>
          <a href="?module=form_obat_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <!-- Data Obat Keluar -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#f56954;color:#fff" class="small-box">
        <div class="inner">
          <?php  
          // Query untuk menghitung jumlah data obat keluar
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_obat_keluar")
                                      or die('Ada kesalahan pada query tampil Data obat Keluar: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Obat Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-out"></i>
        </div>
        <?php  
        // Tampilkan tombol tambah data jika bukan Manajer
        if ($_SESSION['hak_akses']!='Manajer') { ?>
          <a href="?module=form_obat_keluar&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <!-- Laporan Stok Obat -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#f39c12;color:#fff" class="small-box">
        <div class="inner">
          <?php  
          // Query untuk menghitung jumlah data laporan stok obat
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_obat) as jumlah FROM is_obat")
                                      or die('Ada kesalahan pada query tampil Laporan Stok Obat: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Stok Obat</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=lap_stok" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->

    <!-- Laporan Obat Masuk -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#605ca8;color:#fff" class="small-box">
        <div class="inner">
          <?php   
          // Query untuk menghitung jumlah data laporan obat masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_obat_masuk")
                                      or die('Ada kesalahan pada query tampil Laporan obat Masuk: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Stok Obat Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-clipboard"></i>
        </div>
        <a href="?module=lap_obat_masuk" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->

    <!-- Laporan Obat Keluar -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color:#dd4b39;color:#fff" class="small-box">
        <div class="inner">
          <?php   
          // Query untuk menghitung jumlah data laporan obat keluar
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_obat_keluar")
                                      or die('Ada kesalahan pada query tampil Laporan obat Keluar: '.mysqli_error($mysqli));
          // Mengambil data hasil query
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Obat Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-clipboard"></i>
        </div>
        <a href="?module=lap_obat_keluar" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
</section><!-- /.content -->
