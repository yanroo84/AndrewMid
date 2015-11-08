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
<!--回報工作完成-->
<p>work done</p>
<hr />
<?php
$id=(int)$_GET['id'];

if ($id>0) {
    //更新工作狀態為已完成(2)
	$sql = "update work set status=2 where id=$id;";
	mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	echo "work done.";
} else {
	echo "empty id, cannot cancel.";
}
header("Location: 03.worklist.php");
?>
</body>
</html>
