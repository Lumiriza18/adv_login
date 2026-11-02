<?php
//conf/conn.php

session_start();
$user ="root";
$pass ="";
$db="adv_login";
$host="localhost";

$db=new
PDO('mysql:host=localhost;dbname='.$db.';charset=utf8',
    $user,
    $pass);

require_once("library.php");
require_once("ClassLogin.php");
$login =new Login();
