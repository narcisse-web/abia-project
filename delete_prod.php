<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("canteen",$conn);
$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
mysql_query("DELETE FROM products WHERE pid='" . $_POST["users"][$i] . "'");
//mysql_query("DELETE FROM tbl_register WHERE id='" . $_POST["users"][$i] . "'");
}
header("Location:prods.php");
?>