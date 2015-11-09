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
<!--編輯工作-->
<p>Edit work !! </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>price</td>
    <td>deadline</td>
  </tr>
<?php
$id=(int)$_GET['id'];
if ($id <=0) {
	echo "empty ID";
	exit(0);
} 
$sql = "select * from work where id=$id;";
$results=mysqli_query($conn,$sql);
if ($rs=mysqli_fetch_array($results)) {
?>
<table>
  <tr><form method="post" action="04.update.php">
    <td><label>
      <input type="hidden" name="id" value="<?php echo $rs['id']; ?>" >

    </label></td>
    <td><label>
      <input name="title" type="text" id="title" value=<?php echo $rs['title']; ?>>
    </label></td>
    <td><label>
      <input name="msg" type="text" id="msg" value=<?php echo $rs['msg']; ?>>
    </label></td>
    <td><label>
      <input name="price" type="int" id="price" value=<?php echo $rs['price']; ?>>
    </label></td>
    <td><label>
      <input name="date" type="text" id="date" value=<?php echo $rs['date']; ?>>
    </label></td>
    <td><label>
	  <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
  </tr>
</table>

<?php
} else echo "cannot find the message to edit.";
?>

</body>
</html>
