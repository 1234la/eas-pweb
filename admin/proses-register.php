<?php
require '../config.php';

// cek apakah tombol regis sudah diklik atau blum?
if(isset($_POST['register'])){

    // ambil data dari formulir registrasi
    $role = $_POST['role'];
    $id_admin = $_POST['id_admin'];
    $nip = $_POST['nip'];
    $nis = $_POST['nis'];
    $nis_anak = $_POST['nis_anak'];
    $nama = $_POST['nama'];
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //cek id admin : 1 admin banyak akun
    if ($role === 'admin') {
        $cekID_Admin = mysqli_query($db, "SELECT id_admin FROM user_admin WHERE id_admin = '$id_admin'");
        $result_cekIDAdmin = mysqli_fetch_assoc($cekID_Admin);
        if($result_cekIDAdmin){
            header('Location: ../admin/register.php?status=gagal&pesan=ID Admin '. $result_cekIDAdmin['id_admin'] .' sudah digunakan!');
        }
        else{
            //buat query jika role admin
            $sql = "INSERT INTO user_admin (id_admin, nama, password) VALUES ('$id_admin', '$nama', '$password')";
        }
    }

    //cek akun guru : 1 guru 1 akun
    else if ($role === 'guru') {
        $cek_NIP = mysqli_query($db, "SELECT nip FROM user_guru WHERE nip = '$nip'");
        $result_cekNIP = mysqli_fetch_assoc($cek_NIP);
        if($result_cekNIP){
            header('Location: ../admin/register.php?status=gagal&pesan=Akun guru dengan NIP '. $result_cekNIP['nip'] .' telah terdaftar!');
        }
        else{
            //buat query jika role guru
            $sql = "INSERT INTO user_guru (nip, nama, password) VALUES ('$nip', '$nama', '$password')";
        }
    }
        

    //cek akun siswa : 1 siswa 1 akun
    else if ($role === 'siswa') {
        $cek_NIS = mysqli_query($db, "SELECT nis FROM user_siswa WHERE nis = '$nis'");
        $result_cekNIS = mysqli_fetch_assoc($cek_NIS);
        if($result_cekNIS){
            header('Location: ../admin/register.php?status=gagal&pesan=Akun siswa dengan NIS '. $result_cekNIS['nis'] .' telah terdaftar!');
        }
        else{
            //buat query jika role siswa
            $sql = "INSERT INTO user_siswa (nis, nama, password) VALUES ('$nis', '$nama', '$password')";
        }
    }

    //cek akun wali siswa : 1 wali siswa 1 akun
    else if ($role === 'wali') {
        $cek_NISAnak = mysqli_query($db, "SELECT nis_anak FROM user_wali WHERE nis_anak = '$nis_anak'");
        $result_cekNISAnak = mysqli_fetch_assoc($cek_NISAnak);
        if($result_cekNISAnak){
            header('Location: ../admin/register.php?status=gagal&pesan=Akun wali siswa dengan NIS anak '. $result_cekNIS['nis_anak'] .' telah terdaftar!');
        }
        else{
            //buat query jika role siswa
            $sql = "INSERT INTO user_wali (nis_anak, nama, password) VALUES ('$nis_anak', '$nama', '$password')";
        }
    }

        $query = mysqli_query($db, $sql);
        // apakah query insert berhasil?
        if($query){
            // kalau berhasil alihkan ke halaman register dengan status=sukses
            if($role === 'admin'){
                header('Location: ../admin/register.php?status=sukses&role=admin&id_admin='. $id_admin);
            }else if($role === 'guru'){
                header('Location: ../admin/register.php?status=sukses&role=guru&nip='. $nip);
            }elseif($role === 'siswa'){
                header('Location: ../admin/register.php?status=sukses&role=siswa&nis='. $nis);
            }elseif($role === 'wali'){
                header('Location: ../admin/register.php?status=sukses&role=wali&nis_anak='. $nis_anak);
            }
            
        }else{
            echo mysqli_error($db);
        }
    }

?>