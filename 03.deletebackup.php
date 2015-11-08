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
<!--已被取消的工作-->
<p>Canceled work list !! </p> 
<hr />
<table width="500" border="1">
  <tr>
    <td>id</td>
    <td>標題</td>
    <td>工作內容</td>
    <td>酬勞</td>
    <td>工作狀態</td> 
    <td> </td>
  </tr>
<?php
$sql = "select * from work where status=3 order by id asc;";//案子的狀態，3-已取消
$results=mysqli_query($conn,$sql);

while (	$rs=mysqli_fetch_array($results)) {

    if($rs['status']==3)
        $rs['status']="已取消";

	echo "<tr><td>" , $rs['id'] ,
    "</td><td>" , $rs['title'] ,
	"</td><td>" , $rs['msg'],
	"</td><td>" , $rs['price'],
	"</td><td>" , $rs['status'],
    "</td><td>" , "<a href='04.restart.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>重開</a></br>","</td></td></tr>";
}
?>
</table>
<p><a href="02.list1.php">回清單</a> </p>
</body>
</html>