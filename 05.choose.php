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
<!--選人清單-->
<p>Choose !! </p> 
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
    <td> </td>
  </tr>
<?php
$sql = "select * from work where whostart='" . $_SESSION['nick'] . "' and status=1 order by price desc;";
$results=mysqli_query($conn,$sql);

while (	$rs=mysqli_fetch_array($results)) {

    if($rs['status']==1)
        $rs['status']="已接案";

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

	echo "<tr><td>" , $rs['id'] ,
    "</td><td>" , $rs['title'] ,
	"</td><td>" , $rs['msg'],
	"</td><td>" , $rs['price'],
	"</td><td>" , $rs['date'],
	"</td><td>" , $rs['status'],
	"</td><td>" , $rs['whostart'],
	"</td><td>" , $rs['whotake'],
	"</td><td>" , "<a href='04.abandon.php?id=",$rs['id'] ,"' onclick='return confirm(\"are you sure ?\");'>放棄</a></br>","</td></td></tr>";
}
?>
</table>
<?php
//雇主和承接人都接工作，所以判斷idtype，來決定他們要返回的清單
$url='';
if($_SESSION['idtype'] == 0)
    $url='02.list1.php';
if($_SESSION['idtype'] == 1)
    $url='02.list2.php';
?>
<p><a href="03.donelist.php">完成清單</a> </p>
<p><a href="02.list1.php">回清單</a> </p>
<!--<input type ="button" onclick="history.back()" value="回清單"></input>  javascript版回上一頁-->
</body>
</html>