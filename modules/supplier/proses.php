<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $nama_supplier  = mysqli_real_escape_string($mysqli, trim($_POST['nama_supplier']));
            $alamat         = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $kota           = mysqli_real_escape_string($mysqli, trim($_POST['kota']));
            $no_telepon     = mysqli_real_escape_string($mysqli, trim($_POST['no_telepon']));
            
            // Sesuaikan dengan cara Anda mendapatkan nilai $created_user dan $updated_user
            $created_user   = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
            $updated_user   = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

            // perintah query untuk menyimpan data ke tabel supplier
            $query = mysqli_query($mysqli, "INSERT INTO is_supplier(nama_supplier, alamat, kota, no_telepon, created_user, updated_user) 
                                            VALUES('$nama_supplier','$alamat','$kota','$no_telepon','$created_user','$updated_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));


            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=supplier&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_supplier'])) {
                // ambil data hasil submit dari form
                $id_supplier    = mysqli_real_escape_string($mysqli, trim($_POST['id_supplier']));
                $nama_supplier  = mysqli_real_escape_string($mysqli, trim($_POST['nama_supplier']));
                $alamat         = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
                $kota           = mysqli_real_escape_string($mysqli, trim($_POST['kota']));
                $no_telepon     = mysqli_real_escape_string($mysqli, trim($_POST['no_telepon']));
                
                // Sesuaikan dengan cara Anda mendapatkan nilai $updated_user
                $updated_user   = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

                // perintah query untuk mengubah data pada tabel supplier
                $query = mysqli_query($mysqli, "UPDATE is_supplier SET  nama_supplier = '$nama_supplier',
                                                                    alamat = '$alamat',
                                                                    kota = '$kota',
                                                                    no_telepon = '$no_telepon',
                                                                    updated_user = '$updated_user'
                                                              WHERE id_supplier = '$id_supplier'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=supplier&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_supplier = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel supplier
            $query = mysqli_query($mysqli, "DELETE FROM is_supplier WHERE id_supplier='$id_supplier'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=supplier&alert=3");
            }
        }
    }       
}       
?>
