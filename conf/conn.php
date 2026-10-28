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

require_once("conf/library.php");
require_once(" conf/ClassLogin.php");
$login =new Login();
