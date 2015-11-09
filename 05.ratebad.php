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
<!--評價差-->
<p>rate work</p>
<hr />
<?php
$id=(int)$_GET['id'];
$sql = "select rate from work where id=$id;";
$results=mysqli_query($conn,$sql);
while (	$rs=mysqli_fetch_array($results)) {
    if($rs['rate'] == NULL){    
        if ($id>0) {
            //更新評價為差(1)
            $sql = "update work set rate=1 where id=$id;";
            mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
            echo "ratebad.";
            header("refresh:1;url=03.waitcheck.php");
        } else {
            echo "empty id, cannot cancel.";
            header("refresh:1;url=03.waitcheck.php");
        }
    } else {
        echo "你評價過了>///<";
        header("refresh:1;url=03.waitcheck.php");
    }
}
header("Location: 03.waitcheck.php");
?>
</body>
</html>
