<?php
    require 'config.php';
    // start session
    session_start();
    // var_dump($_SESSION);
    if (isset($_POST['login'])) {
        $role = $_POST['role'];
        $id_admin = $_POST['id_admin'];
        $nip = $_POST['nip'];
        $nis = $_POST['nis'];
        $nis_anak = $_POST['nis_anak'];
        $password = $_POST['password'];

        //get akun role admin
        if($role === 'admin'){
            $query = mysqli_query($db, "SELECT * FROM user_admin WHERE id_admin = '$id_admin'");
        }

        //get akun role guru
        elseif($role === 'guru'){
            $query = mysqli_query($db, "SELECT * FROM user_guru WHERE nip = '$nip'");
        }
        
        //get akun role siswa
        elseif($role === 'siswa'){
            $query = mysqli_query($db, "SELECT * FROM user_siswa WHERE nis = '$nis'");
        }

        //get akun role wali
        elseif($role === 'wali'){
            $query = mysqli_query($db, "SELECT * FROM user_wali WHERE nis_anak = '$nis_anak'");
        }

        if (mysqli_num_rows($query) != 0) {
            //ambil hasil query
            $result = mysqli_fetch_assoc($query);

            //jika password sesuai atau benar
            if(password_verify($password, $result['password'])){
                $_SESSION['login'] = true;
                $_SESSION['role'] = $role;
                $_SESSION['nama'] = $result['nama'];
                if ($role === "admin") {
                    $_SESSION['id_admin'] = $id_admin;
                    header('Location: ../admin/manajemen-siswa.php');
                    exit;
                }
                else if ($role === "guru") {
                    $_SESSION['nip'] = $nip;
                    //header('Location: ../guru/manajemen-siswa.php');
                }
                else if ($role === "siwa") {
                    $_SESSION['nis'] = $nis;
                    //header('Location: ../siswa/manajemen-siswa.php');
                }
                else if ($role === "wali") {
                    $_SESSION['nis_anak'] = $nis_anak;
                    //header('Location: ../wali/manajemen-siswa.php');
                }
            }            
        } else {
            echo mysqli_error($db);
        }
    } else {
        echo "<script type='text/javascript'>alert('Silahkan login terlebih dahulu !');location.href = \"index.php\"</script>";
    }
?>