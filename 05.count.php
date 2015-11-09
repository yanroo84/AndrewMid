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

<p>my guest book !! </p> 
<hr />
<table width="200" border="1">
  <tr>
    <td>評價</td>
        <td>數量</td>
  </tr>
<?php
$sql = "select count(*) as c, rate from work where status=0 group by whotake;";
$results=mysqli_query($conn,$sql);

while (	$rs=mysqli_fetch_array($results)) {

    if($rs['rate']==1)
        $rs['rate']="差評";
    else if($rs['rate']==0)
        $rs['rate']="好評";

	echo "<tr><td>" , $rs['rate'] ,
    "</td><td>" , $rs['c'] ,"</td></td></tr>";
}
?>
</table>
<p><a href="02.list1.php">回列表</a> </p>
</body>
</html>
