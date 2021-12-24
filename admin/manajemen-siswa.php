<?php
    require '../config.php';
    session_start();
    if(!$_SESSION['login'] && $_SESSION['role'] !== 'admin'){
        header('Location: ../admin/login-admin.php');
    }

    $sql="SELECT * FROM siswa";
    $siswas = mysqli_query($db,$sql);
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
    
    <!-- CDN Data Table css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <!-- CDN Data Table JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- import css -->
    <link rel="stylesheet" href="./assets/navbar.css">
    <!-- import js -->
    <script src="./assets/navbar.js"></script>

    <!-- loader -->
    <link rel="stylesheet" href="../css/loader.css">

</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="hello align-content-center">
                <span style="font-size: 18px;">Hello, <?= $_SESSION['nama']?> !</span>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">Admin Sekolah</span> 
                </a>
                <div class="nav_list"> 
                    <!-- <a href="#" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>  -->
                    <!-- <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Messages</span> 
                    </a>  -->
                    <!-- <a href="#" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Bookmark</span> 
                    </a>  -->
                    <!-- <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a>  -->
                    <a href="./manajemen-siswa.php" class="nav_link active"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Data Siswa</span> 
                    </a> 
                    <a href="./manajemen-guru.php" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Data Guru</span> 
                    </a> 
                    <a href="./manajemen-wali.php" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Data Wali</span> 
                    </a> 
                    <a href="./register.php" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Buat Akun User</span> 
                    </a>
                </div>
            </div> 
            <a href="../proses-logout.php" class="nav_link" onclick="return confirm('Apakah Anda yakin ingin keluar dari situs ini?')"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">SignOut</span> 
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 pt-5">
        <!-- <h4>Main Components</h4> -->
            <div class="container py-3 px-3">
                    <?php if(isset($_GET['status'])): ?>
                    <p>
                    <?php
                        if($_GET['status'] == 'sukses' && $_GET['role'] == 'siswa') {
                            if ($_GET['operation'] == 'update') {
                                echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                                echo "<b>Update</b> data siswa dengan NIS ".$_GET['nis']." <b>berhasil</b> !";
                                echo "</div>";
                            }
                            elseif($_GET['operation'] == 'delete'){
                                echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                                echo "<b>Hapus</b> data siswa dengan NIS ".$_GET['nis']." <b>berhasil</b> !";
                                echo "</div>";
                            }
                        }elseif($_GET['status'] == 'gagal' && $_GET['role'] == 'siswa'){
                            if ($_GET['operation'] == 'update') {
                                echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                                echo "<b>Update</b> data siswa dengan NIS ".$_GET['nis']." <b>gagal</b> !";
                                echo "</div>";
                            }
                            elseif($_GET['operation'] == 'delete'){
                                echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                                echo "<b>Hapus</b> data siswa dengan NIS ".$_GET['nis']." <b>gagal</b> !";
                                echo "</div>";
                            }
                        }
                    ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="container shadow my-3 py-3 px-3 border rounded-3" style="background-color: white;">
                <div class="mx-3 my-3" style="background-color: white;">
                    <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
                        <h2 class="fs-1" style="color:white;font-weight: bold;">
                            Data Siswa <span style="font-size: 1.2rem; font-weight: lighter">SMA Harapan Bangsa</span>
                        </h2> 
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="create-siswa.php" style="margin-right: 15px;">
                            <button class="btn btn-success">[+] Tambah Baru</button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="list" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter=1;?>
                                <?php foreach( $siswas as $siswa) :?>
                                    <tr>
                                        <th scope="row"><?= $counter++ ?></th>
                                        <td><?= $siswa["nis"]?></td>
                                        <td><?= $siswa["nama"]?></td>
                                        <td><?= $siswa["jenis_kelamin"]?></td>
                                        <td><?= $siswa["alamat"]?></td>
                                        <td><?= $siswa["nik"]?></td>
                                        <td><?= $siswa["tanggal_lahir"]?></td>
                                        <td>
                                            <a href="edit-siswa.php?nis=<?= $siswa["nis"]?>">
                                                <button type="button" name="submit" class="btn btn-warning">Edit</button>
                                            </a>
                                            
                                            <a href="proses-delete.php?nis=<?= $siswa["nis"]?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--Container Main end-->
    <!-- loader -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copy', className: 'btn-primary' },
                { extend: 'csv', className: 'btn-primary' },
                { extend: 'excel', className: 'btn-primary' },
                { extend: 'pdf', className: 'btn-primary' },
                { extend: 'print', className: 'btn-primary' },
            ]
        });
    } );

    //loader
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("fast");
    });
</script>