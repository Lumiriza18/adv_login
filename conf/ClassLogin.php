<?php
//conn/ClassLogin.php

Class Login{
    var $db;
    public function_construct(){
        global $db;
        #menghubungkan variable database $db ke class Login
        $this ->db=$db;
    }
}
public function cek_login(){
    //method yang akan memvalidasi apakah sedang dalam keadaan log in atau tidak
    return false;
}
public function salah_login_action($username){
    //method yang akan dipanggil apabila user memasukkan username/password yang salah
    return false;
}
public function cek_salah_login($limit=5){
    return true;
}
public function true_login($username,$expired){
    //method yang akan dipanggil apabila user memasukkan username dan passwordyang benar
    return true;
}
public function logout(){
    //method yang akan dipanggilapabila user lagout dari sistem 
    return true;
}
public function login_redir(){
    //method yang akan selalu dipanggil di seluruh halaman npn index dan non login,
    //untuk mengecek apabila user tidak memiliki akses langsung diredirect ke halaman login
    if (!$this -> cek_login())
        header("location:index.php");
}

