<?php
    require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<!--新增工作-->
<p>start new work</p>
<hr />
<p>
<?php
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$who=mysqli_real_escape_string($conn,$_SESSION['nick']);
$date=mysqli_real_escape_string($conn,$_POST['date']);

if ($title) {
	$sql = "insert into work (title, msg, price, whostart,date) values ('$title', '$msg','$price','$who','$date');";
	mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	echo "work added.";
header("Refresh:1;url=02.list1.php");
} else {
	echo "empty title, cannot insert.";
header("Refresh:3;url=02.list1.php");
}

?>
</p>
</body>
</html>
