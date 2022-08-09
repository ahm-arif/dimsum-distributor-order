<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

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
            $nama         = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $harga        = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $kategori     = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));
            $deskripsi    = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
            $jumlah_stock = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_stock']));

            // perintah query untuk menyimpan data ke tabel barang
            $query = mysqli_query($mysqli, "INSERT INTO barang(nama,harga,kategori,deskripsi,jumlah_stock)
                                            VALUES('$nama','$harga','$kategori','$deskripsi','$jumlah_stock')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=barang&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id         = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $nama         = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
                $harga        = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
                $kategori     = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));
                $deskripsi    = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
                $jumlah_stock = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_stock']));


                // perintah query untuk mengubah data pada tabel barang
                $query = mysqli_query($mysqli, "UPDATE barang SET 
                                                                     nama        = '$nama',
                                                                     harga        = $harga,
                                                                     kategori     = '$kategori',
                                                                     deskripsi    = '$deskripsi',
                                                                     jumlah_stock = $jumlah_stock 
                                                                     WHERE id = '$id'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=barang&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel barang
            $query = mysqli_query($mysqli, "DELETE FROM barang WHERE id='$id'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=barang&alert=3");
            }
        }
    }       
}       
?>