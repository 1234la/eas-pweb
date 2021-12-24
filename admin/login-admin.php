<?php
 require '../config.php';
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['role'] === 'admin'){
        header('Location: ../admin/manajemen-siswa.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loader.css">

    <title>SMA Harapan Bangsa</title>
    <link rel="shortcut icon" href="../assets/logo-big.png" type="image/x-icon">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar shadow d-flex justify-content-between pt-3" style="background-color: #0275d8;">
            <div class="container align-items-center">
                <a href="../index.php" style="color:white; text-decoration:none">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali ke menu utama
                </a>
                <div class="title d-flex align-items-center">
                    <img src="../assets/logo-big.png" alt="" width="60px" height="60px">
                    <h4 class="me-2">SMA Harapan Bangsa | </h4>
                    <h5 style="color:white;"> Login Admin </h5>
                </div>
            </div>
        </nav>
    </header>
    <div class="container shadow my-5 py-5 py-5 px-5 border rounded-3" style="width:40rem; background-color:white">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
                <h2 class="fs-1" style="color:white;font-weight: bold;">
                    Login Admin <span style="font-size: 1.2rem; font-weight: lighter">SMA Harapan Bangsa</span>
                </h2> 
        </div>

        <!-- Note :
            - pada form atribut "action" menunjukan data akan dikirim kan kemana
            - atribut method ada 2 : GET(data dikirm melalui URL), POST(data dikirm melalui form/server)
        -->
        <form action="../proses-login.php" method="POST">
            <div class="mb-3">
                <!-- 
                    Note :
                    - for pasangannya id untuk label input
                    - pada input atribut "name" adalah nama atribut yang sama dengan atribut db yang akan di insert
                 -->
                <label for="id_admin" class="form-label">ID Admin</label>
                <input type="text" name="id_admin" class="form-control" id="id_admin" placeholder="masukkan ID Admin" required>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="masukkan kata sandi" required>
            </div>
            <input type="hidden" id="role" name="role" value="admin">
            <button type="submit" name="login" class="btn btn-success" style="width: 100%;">Submit</button>
        </form>
    </div>  
    <!-- loader -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>
</html>
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>