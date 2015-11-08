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
<!--接工作-->
<p>Get work</p>
<hr />
<?php
$id=(int)$_GET['id'];

if ($id>0) {
    //更改案子狀態為1(已接案)，並記錄誰接了工作
	$sql = "update work set status=1,whotake='" . $_SESSION['uID'] . "' where id=$id;";
	mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	echo "work taked.";
} else {
	echo "empty id, cannot cancel.";
}
//雇主承接人都可以接案，因此判斷idtype，並導回其list頁面
if($_SESSION['idtype'] == 0)
    header("Location: 02.list1.php");
if($_SESSION['idtype'] == 1)
    header("Location: 02.list2.php");
?>
</body>
</html>
