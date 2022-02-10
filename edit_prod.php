<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("canteen",$conn);

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["pname"]);
for($i=0;$i<$usersCount;$i++) {
$pname=$_POST["pname"][$i];
$pau=$_POST["up"][$i];
$pvun=$_POST["uc"][$i];
$benf=$pvun-$pau;
$id=$_POST["pid"][$i];
$g=mysql_query("UPDATE products set pname='$pname',up='$pau',uc='$pvun',benefit='$benf' WHERE pid='$id'");
}
header("Location:prods.php");

}
?>
<html>
<head>
<title>Edit Multiple Products</title>
<link rel="stylesheet" type="text/css" href="scripts3.css" />
<style>
input[type="submit"]
{
font-size:18px;
width:170px;
border:solid green 1px;
border-radius:0px;
text-align:center;
}
input[type="text"]
{
font-size:18px;
width:270px;
height:35px;
border:solid green 1px;
border-radius:4px;
text-align:center;
}
</style>

</head>
<body style="background:none;"><br>

<center>
<form name="frmUser" method="post" action="">
<div style="width:60%;">
<table border="0" cellpadding="10" cellspacing="0" width="100%" align="center">
<?php
$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysql_query("SELECT * FROM canteen.products WHERE pid='" . $_POST["users"][$i] . "'");
$row[$i]= mysql_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="100%" align="center" class="tblSaveForm" style="background-color: #fefdfd;">
<tr>
<td colspan="2" style="background-color: #fedc4d;"><center><font size="+2">Product Info Modification</font></center></td></tr>
<tr>
<td><label>Product Name</label></td>
<td><input type="hidden" name="pid[]" class="txtField" value="<?php echo $row[$i]['pid']; ?>">
<input type="text" name="pname[]" class="txtField" value="<?php echo $row[$i]['pname']; ?>"></td>
</tr>
<tr>
<td><label>Unit buying price</label></td>
<td><input type="text" name="up[]" class="txtField" value="<?php echo $row[$i]['up']; ?>"></td>
</tr>
<tr>
<td><label>Unit selling price</label></td>
<td><input type="text" name="uc[]" class="txtField" value="<?php echo $row[$i]['uc']; ?>"></td>
</tr>
</table>
</td>
</tr>
<?php
}
?>
<tr>
<td colspan="2" style="background-color: #fedc4d;"><input type="submit" name="submit" value="Save" class="btnSubmit"></td>
</tr>
</table>
</div>
</form></center>
</body></html>