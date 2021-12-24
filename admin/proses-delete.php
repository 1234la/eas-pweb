<?php

require '../config.php';

if( isset($_GET['nis']) ){

    // ambil id dari query string
    $nis = $_GET['nis'];

    // buat query hapus
    $sql = "DELETE FROM siswa WHERE nis='$nis'";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: manajemen-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>