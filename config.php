<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sma_harapan_bangsa";

$db = mysqli_connect($host, $username, $password, $database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>