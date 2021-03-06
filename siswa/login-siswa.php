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

    <title>SMA Harapan Bangsa</title>
    <link rel="shortcut icon" href="./assets/logo-big.png" type="image/x-icon">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar shadow d-flex justify-content-between pt-3" style="background-color: #0275d8;">
            <div class="container align-items-center">
                <a href="index.php" style="color:white; text-decoration:none">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali ke menu utama
                </a>
                <div class="content d-flex align-items-center">
                    <img src="./assets/logo-big.png" alt="" width="60px" height="60px">
                    <h4 class="me-2">SMA Harapan Bangsa | </h4>
                    <h5 style="color:white;"> Login Akun </h5>
                </div>
            </div>
        </nav>
    </header>
    <div class="container shadow my-5 py-5 px-5 border rounded-3" style="width:50rem">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
                <h2 class="fs-1" style="color:white;font-weight: bold;">
                    Login Akun <span style="font-size: 1.2rem; font-weight: lighter">Siswa</span>
                </h2> 
        </div>

        <!-- Note :
            - pada form atribut "action" menunjukan data akan dikirim kan kemana
            - atribut method ada 2 : GET(data dikirm melalui URL), POST(data dikirm melalui form/server)
        -->
        <form action="proses-login.php" method="POST" name="formRegistrasi">
            <div class="mb-3">
                <label class="form-label" for="role">
                    Role Akun
                </label>
                    <select onchange="isRole()" name="role" id="role" class="form-select">
                        <option value="0" selected>Pilih role</option>
                        <option value="admin">Admin</option>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                        <option value="wali">Wali Siswa</option>
                    </select>
            </div>
            <div class="mb-3" id="role-admin" style="display: none;">
                <!-- 
                    Note :
                    - for pasangannya id untuk label input
                    - pada input atribut "name" adalah nama atribut yang sama dengan atribut db yang akan di insert
                 -->
                <label for="id_admin" class="form-label">ID Admin</label>
                <input type="text" name="id_admin" class="form-control" id="id_admin" placeholder="ID Admin" required>
            </div>
            <div class="mb-3" id="role-guru" style="display: none;">
                <label for="nip" class="form-label">NIP Guru</label>
                <input type="text" name="nip" class="form-control" id="nip" placeholder="" required>
            </div>
            <div class="mb-3" id="role-siswa" style="display: none;">
                <label for="nis" class="form-label">No Induk Siswa</label>
                <input type="text" name="nis" class="form-control" id="nis" placeholder=" " required>
            </div>
            <div class="mb-3" id="role-wali" style="display: none;">
                <label for="nis_anak" class="form-label">No Induk Anak</label>
                <input type="text" name="nis_anak" class="form-control" id="nis_anak" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Submit</button>
        </form>
    </div>  
</body>
</html>
<script>
    function isRole() {
        if (document.forms["formRegistrasi"]["role"].value == "0") {
            document.getElementById('role-admin').style.display = 'none';
            document.getElementById('role-guru').style.display = 'none';
            document.getElementById('role-siswa').style.display = 'none';
            document.getElementById('role-wali').style.display = 'none';
        }
        else if (document.forms["formRegistrasi"]["role"].value == "admin") {
            document.getElementById('role-admin').style.display = 'block';
            document.getElementById('role-guru').style.display = 'none';
            document.getElementById('role-siswa').style.display = 'none';
            document.getElementById('role-wali').style.display = 'none';
        }
        else if (document.forms["formRegistrasi"]["role"].value == "guru") {
            document.getElementById('role-admin').style.display = 'none';
            document.getElementById('role-guru').style.display = 'block';
            document.getElementById('role-siswa').style.display = 'none';
            document.getElementById('role-wali').style.display = 'none';
        }
        else if (document.forms["formRegistrasi"]["role"].value == "siswa") {
            document.getElementById('role-admin').style.display = 'none';
            document.getElementById('role-guru').style.display = 'none';
            document.getElementById('role-siswa').style.display = 'block';
            document.getElementById('role-wali').style.display = 'none';
        }
        else if (document.forms["formRegistrasi"]["role"].value == "wali") {
            document.getElementById('role-admin').style.display = 'none';
            document.getElementById('role-guru').style.display = 'none';
            document.getElementById('role-siswa').style.display = 'none';
            document.getElementById('role-wali').style.display = 'block';
        }
}
</script>