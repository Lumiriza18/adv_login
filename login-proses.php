<?php
// login-proses.php
include "conf/conn.php";

// Cek apakah batas kesalahan login sudah tercapai
if (!$login->cek_salah_login()) {
    create_alert(
        "error",
        "Mohon maaf, Anda tidak dapat login lagi karena kesalahan login terlalu banyak. Hubungi Administrator.",
        "index.php"
    );
}

// Proses hanya jika tombol login ditekan
if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Step 1: Cek apakah username terdaftar
    $cek = $db->query(
        "SELECT * FROM tb_admin WHERE user = " . $db->quote($username)
    );

    if ($cek->rowCount() > 0) {
        // Ambil password yang tersimpan di database
        $row = $cek->fetch();
        $password_db = $row['pass'];

        // Cocokkan password dengan hash di database
        if (password_verify($password, $password_db)) {
            $expired = 0;

            // Cek apakah Remember Me dicentang
            if (isset($_POST['remember'])) {
                if ($_POST['remember'] == 1) {
                    $expired = '+1 year';
                }
            }

            // Proses login berhasil dan pencatatan token
            $login->true_login($username, $expired);

            create_alert("success", "Log In Berhasil", "index.php");
        } else {
            // Password salah
            $login->salah_login_action($username);

            create_alert(
                "error",
                "Username atau password tersebut salah",
                "index.php"
            );
        }
    } else {
        // Username tidak terdaftar
        $login->salah_login_action($username);

        create_alert(
            "error",
            "Username atau password tersebut tidak terdaftar",
            "index.php"
        );
    }
}
?>
