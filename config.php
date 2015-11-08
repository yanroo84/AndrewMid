<?php
session_start();

$host = 'localhost';
$user = 'aaaaa';
$pass = '00000';
$db = 'middb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

//未登入，導向login.php
	if ( ! isset($_SESSION["uID"])) 
		header("Location: 01.login.php");
	if ( $_SESSION["uID"] == "" ) 
		header("Location: 01.login.php");
//已登入，Hello~~
    else
        echo $_SESSION["nick"]," , Hello~~";

?>