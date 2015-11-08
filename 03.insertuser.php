<?php
session_start();
$host = 'localhost';
$user = 'aaaaa';
$pass = '00000';
$db = 'middb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<!--新增User-->
<p>Register</p>
<hr />
<p>
<?php
$id=mysqli_real_escape_string($conn,$_POST['id']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$nick=mysqli_real_escape_string($conn,$_POST['nick']);
$idtype=mysqli_real_escape_string($conn,$_POST['idtype']);

if ($id) {
    $sql = "insert into user (id, password, nickname, idtype) values ('$id', '$pwd','$nick','$idtype');";
    mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
    echo "user added.";
} else {
	echo "empty id, cannot insert.";
}
header("Refresh:3;url=01.login.php");
?>
</p>
</body>
</html>
