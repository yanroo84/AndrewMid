<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
</head>
<body>
<p>註冊新帳號 </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>ID</td>
    <td>密碼</td>
    <td>暱稱</td>
    <td>帳號類型</td>
  </tr>
  <tr><form method="post" action="03.insertuser.php"><!--POST!!!傳到03.insertuser-->
    <td><label>
      <input name="id" type="text" id="id" />
    </label></td>
    <td><label>
      <input name="pwd" type="pwd" id="pwd" />
    </label></td>
    <td><label>
      <input name="nick" type="nick" id="nick" />
    </label></td>
    <!--下拉式選單-->
    <td><select name="idtype" id="idtype">
      <option value="0">徵才大老闆</option>
      <option value="1">找工作</option>
    </select></td>
    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
  </tr>
</table>
</body>
</html>
