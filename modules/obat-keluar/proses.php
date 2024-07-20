<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
    exit(); // tambahkan exit setelah redirect untuk menghentikan eksekusi script
}

// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
if ($_GET['act'] == 'insert') {
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $tanggal_keluar = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_keluar']));
        $exp = explode('-', $tanggal_keluar);
        $tanggal_keluar = $exp[2] . "-" . $exp[1] . "-" . $exp[0];
        $kode_obat = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
        $jumlah_keluar = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_keluar']));
        $total_stok = isset($_POST['total_stok']) ? mysqli_real_escape_string($mysqli, trim($_POST['total_stok'])) : 0; // tambahkan pengecekan untuk total_stok
        $created_user = $_SESSION['id_user'];

        // generate kode transaksi unik
        $kode_transaksi = generateKodeTransaksi(); // buat fungsi generateKodeTransaksi() sesuai dengan aturan yang Anda tentukan

        // perintah query untuk memeriksa apakah kode transaksi sudah ada
        $query_check = mysqli_query($mysqli, "SELECT kode_transaksi FROM is_obat_keluar WHERE kode_transaksi = '$kode_transaksi'");
        if (mysqli_num_rows($query_check) > 0) {
            die('Kode transaksi sudah ada.'); // jika kode transaksi sudah ada, hentikan eksekusi
        }

        // perintah query untuk menyimpan data ke tabel obat keluar
        $query = mysqli_query($mysqli, "INSERT INTO is_obat_keluar(kode_transaksi, tanggal_keluar, kode_obat, jumlah_keluar, created_user) 
                                        VALUES('$kode_transaksi','$tanggal_keluar','$kode_obat','$jumlah_keluar','$created_user')")
                                        or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        // cek query
        if ($query) {
            // perintah query untuk mengurangi stok obat di tabel is_obat
            $query_update = mysqli_query($mysqli, "UPDATE is_obat SET stok = stok - '$jumlah_keluar' WHERE kode_obat = '$kode_obat'")
                            or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            // cek query update
            if ($query_update) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=obat_keluar&alert=1");
                exit(); // tambahkan exit setelah redirect untuk menghentikan eksekusi script
            }
        }
    }
}

// Fungsi untuk generate kode transaksi unik (contoh)
function generateKodeTransaksi() {
    $prefix = 'TK-' . date('Y') . '-'; // misal TK-2024-
    $random_number = mt_rand(1000000, 9999999); // angka acak antara 1000000 dan 9999999
    return $prefix . $random_number;
}
?>