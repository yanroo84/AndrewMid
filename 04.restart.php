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
<!--重開被取消工作-->
<p>Restart work</p>
<hr />
<?php
$id=(int)$_GET['id'];

if ($id>0) {
	$sql = "update work set status=0 where id=$id;";//更新案子狀態為可接案(0)
	mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	echo "work restarted.";
} else {
	echo "empty id, cannot delete.";
}
header("Refresh:1;url=02.list1.php");
?>
</body>
</html>
