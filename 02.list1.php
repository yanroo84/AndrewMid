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

<p>My Job list !! </p> 
<hr />
<table width="1000" border="1">
  <tr>
    <td>id</td>
    <td>標題</td>
    <td>工作內容</td>
    <td>酬勞</td>
    <td>完成期限</td>
    <td>工作狀態</td> 
    <td>徵才人</td>
    <td>承接人</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td>評價 </td>
  </tr>
<?php
//雇主的list頁面
$sql = "select * from work order by id asc;";//照id排序
$results=mysqli_query($conn,$sql);
$whotake="";//儲存是否有人接了該工作
$ra='';

while (	$rs=mysqli_fetch_array($results)) {
    //有人承接工作的話，在承接人那格印出名字
    if($rs['whotake'] != NULL){
        $sql1 = "select nickname from user where id='" . $rs['whotake'] . "';";
        $results1=mysqli_query($conn,$sql1);
        while (	$rs1=mysqli_fetch_array($results1)) {  
            $whotake=$rs1['nickname'];
        }
    } else {
        $whotake="";
    }
    //案子的狀態，0-可接案,1-已接案,2-已完成,3-已取消,4-驗收過
    if($rs['status']==0)
        $rs['status']="可接案";
    else if($rs['status']==1)
        $rs['status']="已接案";
    else if($rs['status']==2)
        $rs['status']="已完成";
    else if($rs['status']==3)
        $rs['status']="已取消";
    else if($rs['status']==4)
        $rs['status']="已完成且驗收";

    //案子的評價，0-好,1-壞
    if($rs['rate'] != NULL){
        if($rs['rate']==0)
            $ra="好";
        if($rs['rate']==1)
            $ra="壞";
    } else {
        $ra="";
    }

	echo "<tr><td>" , $rs['id'] ,
    "</td><td>" , $rs['title'] ,
	"</td><td>" , $rs['msg'],
	"</td><td>" , $rs['price'],
	"</td><td>" , $rs['date'],
	"</td><td>" , $rs['status'],
	"</td><td>" , $rs['whostart'],
	"</td><td>" , $whotake,
	"</td><td>" , "<a href='04.editform.php?id=",$rs['id'] ,"'>編輯</a>",
    "</td><td>" , "<a href='03.cancel.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>取消</a></br>",
    "</td><td>" , "<a href='03.getwork.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>接案子</a></br>",
	"</td><td>" , $ra,
    "</td></td></tr>";
}
?>
</table>
<p><a href="03.addform.php">新增</a> </p>
<p><a href="03.worklist.php">手上的工作</a> </p>
<p><a href="03.deletebackup.php">工作重開</a> </p>
<p><a href="logout.php">登出</a> </p>
</body>
</html>
