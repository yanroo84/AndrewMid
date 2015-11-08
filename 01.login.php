<?php
session_start();
$host = 'localhost';
$user = 'aaaaa';
$pass = '00000';
$db = 'middb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

//儲存ID，綽號，帳號類型(0:雇主，1:承接人)
$_SESSION['uID'] = "";
$_SESSION['nick'] = "";
$_SESSION['idtype'] = "";
if(isset($_POST['id']) && isset($_POST['pwd'])){//先隱藏錯誤訊息
    $userName = $_POST['id'];
    $passWord = $_POST['pwd'];
		$sql = "SELECT * FROM user WHERE id='" . $userName . "' AND password= '" . $passWord . "'";
		if ($result = mysqli_query($conn,$sql)) {
			if ($row=mysqli_fetch_array($result)) {
				//寫入session
                $_SESSION['uID'] = $row['id'];
				$_SESSION['nick'] = $row['nickname'];
                $_SESSION['idtype'] = $row['idtype'];
                //判斷帳號類型，並導至對應頁面
                if($row['idtype'] == 0)
                    header("Location: 02.list1.php");
                if($row['idtype'] == 1)
                    header("Location: 02.list2.php");
				exit(0);
			} else {
				echo "Invalid Username or Password - Please try again <br />";
			}
		}
} else {
    $userName = "";
    $passWord = "";
}

?>
<h1>工作外包網-登入</h1><hr />
<form method="post" action="01.login.php">
User Name: <input type="text" name="id"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit">
</form>