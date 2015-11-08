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

<p>Get work</p>
<hr />
<?php
$id=(int)$_GET['id'];

if ($id>0) {
	$sql = "update work set status=1,whotake='" . $_SESSION['uID'] . "' where id=$id;";
	mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	echo "work taked.";
} else {
	echo "empty id, cannot cancel.";
}
if($_SESSION['idtype'] == 0)
    header("Location: 02.list1.php");
if($_SESSION['idtype'] == 1)
    header("Location: 02.list2.php");
?>
</body>
</html>
