<?php
session_start();
//清除session
session_destroy();
?>
<h1>掰~~掰~~~~</h1><hr />
<?php
header("Refresh:1;url=02.list1.php");
?>