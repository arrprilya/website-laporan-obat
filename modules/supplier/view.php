<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Supplier

    <a class="btn btn-primary btn-social pull-right" href="?module=form_supplier&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      } 
      // jika alert = 1
      // tampilkan pesan Sukses "Data supplier baru berhasil disimpan"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Data supplier baru berhasil disimpan.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Data supplier berhasil diubah"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Data supplier berhasil diubah.
              </div>";
      }
      // jika alert = 3
      // tampilkan pesan Sukses "Data supplier berhasil dihapus"
      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Data supplier berhasil dihapus.
              </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- Tampilan tabel supplier -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- Tampilan header tabel -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Nama Supplier</th>
                <th class="center">Alamat</th>
                <th class="center">Kota</th>
                <th class="center">No. Telepon</th>
                <th></th>
              </tr>
            </thead>
            <!-- Tampilan body tabel -->
            <tbody>
              <?php  
              $no = 1;
              // Query untuk menampilkan data dari tabel supplier
              $query = mysqli_query($mysqli, "SELECT id_supplier, nama_supplier, alamat, kota, no_telepon FROM is_supplier ORDER BY id_supplier DESC")
                          or die('Ada kesalahan pada query tampil Data Supplier: ' . mysqli_error($mysqli));

              // Tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td class='center'>$no</td>
                        <td>$data[nama_supplier]</td>
                        <td>$data[alamat]</td>
                        <td>$data[kota]</td>
                        <td>$data[no_telepon]</td>
                        <td class='center'>
                          <div>
                            <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_supplier&form=edit&id=$data[id_supplier]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-toggle='tooltip' data-placement='top' title='Hapus' class='btn btn-danger btn-sm' href='modules/supplier/proses.php?act=delete&id=$data[id_supplier]' onclick=\"return confirm('Anda yakin ingin menghapus supplier $data[nama_supplier]?');\">
                              <i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                            </a>
                          </div>
                        </td>
                      </tr>";
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->