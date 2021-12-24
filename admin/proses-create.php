<?php
require "../config.php";

if (isset($_POST['submit'])) {
    
    // ambil data dari formulir
    $role = $_POST['role'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['nik'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // buat query role siswa
    if ($role === 'siswa') {
        $cek_NIS = mysqli_query($db, "SELECT nis FROM siswa WHERE nis = '$nis'");
        $result_cekNIS = mysqli_fetch_assoc($cek_NIS);
        if ($result_cekNIS) {
            header('Location: ../admin/create-siswa.php?status=gagal&pesan=Akun siswa dengan NIS '. $result_cekNIS['nis'] .' telah terdata!');
        } else {
            $sql = "INSERT INTO siswa(nis, nama, jenis_kelamin, alamat, nik, tanggal_lahir) VALUES ('$nis', '$nama', '$jenis_kelamin', '$alamat', '$nik','$tanggal_lahir')";
        }
    }
    
    $query = mysqli_query($db, $sql);
    if ($query) {
        // kalau berhasil alihkan ke halaman register dengan status=sukses
        if ($role === 'siswa') {
            header('Location: ../admin/create-siswa.php?status=sukses&role=siswa&nis='. $nis);
        }
    }else{
        echo mysqli_error($db);
    }
} 
?>