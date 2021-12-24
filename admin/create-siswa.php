<?php
require '../config.php';
session_start();
if(!$_SESSION['login'] && $_SESSION['role'] !== 'admin'){
    header('Location: ../admin/login-admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMA Harapan Bangsa</title>
    <link rel="shortcut icon" href="../assets/logo-big.png" type="image/x-icon">

    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- bootstarp 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- loader -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loader.css">
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar shadow d-flex justify-content-between pt-3" style="background-color: #0275d8;">
            <div class="container align-items-center">
                <a href="manajemen-siswa.php" style="color:white; text-decoration:none">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali ke halaman admin
                </a>
                <div class="content d-flex align-items-center">
                    <img src="../assets/logo-big.png" alt="" width="60px" height="60px">
                    <h4 class="me-2">SMA Harapan Bangsa | </h4>
                    <h5 style="color:white;">Input Siswa</h5>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses') {
                        echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                        echo "Input data siswa dengan NIS ".$_GET['nis']." berhasil !";
                        echo "</div>";
                    } else {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "<b>Input data Siswa gagal</b>";
                            if($_GET['pesan']){
                                $pesan = $_GET['pesan'];
                                echo " : $pesan";
                            }
                        echo "</div>";
                    }
                ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="container shadow my-5 py-5 px-5 border rounded-3" style="width:50rem">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
                <h2 class="fs-1" style="color:white;font-weight: bold;">
                    Input Siswa <span style="font-size: 1.2rem; font-weight: lighter"> SMA Harapan Bangsa</span>
                </h2> 
        </div>

        <!-- Note :
            - pada form atribut "action" menunjukan data akan dikirim kan kemana
            - atribut method ada 2 : GET(data dikirm melalui URL), POST(data dikirm melalui form/server)
        -->
        <form action="proses-create.php" method="POST">
        <div class="mb-3">
                <!-- 
                    Note :
                    - for pasangannya id untuk label input
                    - pada input atribut "name" adalah nama atribut yang sama dengan atribut db yang akan di insert
                 -->
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis" placeholder="Nomer Induk Siswa" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input required class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L" checked>
                        <label class="form-check-label" for="laki-laki" >
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomer Induk Kependudukan" required>    
            </div>
            <div class="mb-5">
                <label for="tanggal_lahir" class="pb-2">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <input type="hidden" id="role" name="role" value="siswa">
            <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Submit</button>
        </form>
    </div>  
    <!-- loader -->
    <!-- <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->
</body>
</html>

<script type="text/javascript">
    //data table
    $(function() {
        $('#datepicker').datepicker();
    });
    //loader
    $(window).on("load",function(){
     $(".loader-wrapper").fadeOut("fast");
    });
</script>
