﻿<?php
    require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<!--完成工作清單-->
<p>待驗收與評價 list !! </p> 
<hr />
<table width="600" border="1">
  <tr>
    <td>id</td>
    <td>標題</td>
    <td>工作內容</td>
    <td>酬勞</td>
    <td>完成期限</td>
    <td>工作狀態</td> 
    <td>徵才人</td>
    <td> </td>
    <td>好 </td>
    <td>壞 </td>
  </tr>

<?php
$sql = "select * from work where whostart='" . $_SESSION['nick'] . "' and (status=2 or status=4) order by price desc;";
$results=mysqli_query($conn,$sql);

while (	$rs=mysqli_fetch_array($results)) {

    if($rs['status']==2)
        $rs['status']="已完成";
    else if($rs['status']==4)
        $rs['status']="已完成且驗收";

    echo "<tr><td>" , $rs['id'] ,
    "</td><td>" , $rs['title'] ,
    "</td><td>" , $rs['msg'],
    "</td><td>" , $rs['price'],
    "</td><td>" , $rs['date'],
    "</td><td>" , $rs['status'],
    "</td><td>" , $rs['whostart'],
    "</td><td>" , "<a href='04.workcheck.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>驗收完成</a></br>",
    //好->0，壞->1
    "</td><td>" , "<a href='05.rategood.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>好</a></br>",
    "</td><td>" , "<a href='05.ratebad.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>壞</a></br>","</td></td></tr>";
}
?>
</table>
<p><a href="03.donelist.php">完成清單</a> </p>
<p><a href="03.worklist.php">手上的工作</a> </p>
<p><a href="02.list1.php">回清單</a> </p>
</body>
</html>