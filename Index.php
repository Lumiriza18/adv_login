<?php
// index.php
require("conf/conn.php");

$login_status = $login->cek_login();

if ($login_status) {
    // Bawa ke halaman home
    header("location:home.php");
    exit();
} else {
    // Tampilkan form login jika belum login
    include "login.php";
}
?>
