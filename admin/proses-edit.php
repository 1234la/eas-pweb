<?php

require '../config.php';

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $role = $_POST['role'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // buat query update
    if($role === 'siswa'){
        $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', nik='$nik', tanggal_lahir='$tanggal_lahir' WHERE nis = '$nis'";
    }
    
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman manajemen-siswa.php
        header('Location: ../admin/manajemen-siswa.php?status=sukses&role=siswa&operation=update&nis='. $nis);
    } else {
        // kalau gagal tampilkan pesan
        header('Location: ../admin/manajemen-siswa.php?status=gagal&role=siswa&operation=update&nis='. $nis);
    }
} else {
    die("Akses dilarang...");
}

?>