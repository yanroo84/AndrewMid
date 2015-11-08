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

<p>My work list !! </p> 
<hr />
<table width="600" border="1">
  <tr>
    <td>id</td>
    <td>標題</td>
    <td>工作內容</td>
    <td>酬勞</td>
    <td>工作狀態</td> 
    <td>徵才人</td>
    <td> </td>
  </tr>
<?php
$sql = "select * from work where status=0 order by id asc;";
$results=mysqli_query($conn,$sql);

while (	$rs=mysqli_fetch_array($results)) {

    if($rs['status']==0)
        $rs['status']="可接";

	echo "<tr><td>" , $rs['id'] ,
    "</td><td>" , $rs['title'] ,
	"</td><td>" , $rs['msg'],
	"</td><td>" , $rs['price'],
	"</td><td>" , $rs['status'],
	"</td><td>" , $rs['whostart'],
    "</td><td>" , "<a href='03.getwork.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>接案子</a></br>",
    "</td></td></tr>";
}
?>
</table>
<p><a href="03.worklist.php">手上的工作</a> </p>
<p><a href="logout.php">登出</a> </p>
</body>
</html>
