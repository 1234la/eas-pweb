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
    <title>SMA Harapan Bangsa</title>
    <link rel="shortcut icon" href="./assets/logo-big.png" type="image/x-icon">
    <!-- loader -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loader.css">
</head>

<body style="background-color:#0275d8">
    <main >
        <div class="container py-5">

            <div class="p-3 mb-4 bg-light rounded-3 d-flex align-items-center shadow">
                <img src="./assets/logo-big.png" alt="" height="350px" width="350px">
                <div class="container-fluid py-5">
                    <h3 class="display-5">Aplikasi Sekolah</h3>
                    <h1 class="display-2 fw-bold">SMA Harapan Bangsa</h1>
                </div>
            </div>
            <div class="row align-items-md-stretch">
                <div class="col-md-3">
                    <div class=" d-flex flex-column align-items-center text-center h-100 p-4 bg-light border rounded-3 shadow">
                        <img src="./assets/admin.png" alt="" height="120px" width="120px" style="margin-bottom:15px;">
                        <h2>Admin</h2>
                        <p>Klik disini untuk melakukan mengakses halaman admin</p>
                        <a href="./admin/login-admin.php" class="btn btn-outline-primary" type="button">Login Admin</a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class=" d-flex flex-column align-items-center text-center h-100 p-4 bg-light border rounded-3 shadow">
                        <img src="./assets/Frame 1 (2).png" alt="" height="120px" width="120px" style="margin-bottom:15px;">
                        <h2>Guru</h2>
                        <p>Klik disini untuk melakukan mengakses halaman guru</p>
                        <a href="login-guru.php" class="btn btn-outline-primary" type="button">Login Guru</a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class=" d-flex flex-column align-items-center text-center h-100 p-4 bg-light border rounded-3 shadow">
                        <img src="./assets/Frame 1 (3).png" alt="" height="120px" width="120px" style="margin-bottom:15px;">
                        <h2>Siswa</h2>
                        <p>Klik disini untuk melakukan mengakses halaman siswa</p>
                        <a href="login-siswa.php" class="btn btn-outline-primary" type="button">Login Siswa</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" d-flex flex-column align-items-center text-center h-100 p-4 bg-light border rounded-3 shadow">
                        <img src="./assets/Frame 1 (4).png" alt="" height="120px" width="120px" style="margin-bottom:15px;">
                        <h2>Wali Siswa</h2>
                        <p>Klik disini untuk melakukan mengakses halaman admin</p>
                        <a href="login-wali.php" class="btn btn-outline-primary" type="button">Login Wali Siswa</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
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