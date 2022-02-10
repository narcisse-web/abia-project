<?php
session_start();

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head><title>Canteen Mgt System</title>
<link rel="stylesheet"  type="text/css" href="scripts3.css">
<style type="text/css">
.tbl_log
{
font-size:28px;
color:green;
font-weight:bold;
background-color:white;
border-radius:8px;
}
input[type="text"],[type="password"]
{
width:260px;
height:20px;
text-align:center;
font-size:16px;

border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
color:black;
}
select

{
	width:260px;
	height:25px;
text-align:center;
font-size:16px;

border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"],[type="reset"]
{
width:70px;
height:25px;
text-align:center;
font-size:18px;
font-weight:bold;
border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
background-image:url(images/btn.png);
color:white;
}
input[type="send"]
{
width:380px;
height:50px;
text-align:center;
font-size:24px;
font-weight:bold;
border-radius:4px;
border:1px solid red;
font-family:"Trebuchet MS";
background-image:url(images/btn1.png);
color:red;
}
a
{
text-decoration:none;
}
a:hover {
    color: hotpink;
}
a:visited {
    color: hotblue;
}
.tblhd
{
font-size:18px;
}
.tbl
{
border-radius:4px;}
</style>
<script>
function validateForm() {
    var x = document.forms["myForm"]["user"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;

		 var b = document.forms["myForm"]["pass"].value;
    if (b == null || b == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
</head>
<body>

<div id="main">

<div id="hd">

</div>

<div id="bd">

<center>

		<nav id="main_nav"> 
			<ul> 
				<li> 
					<a href="index.php">&nbsp;&nbsp;Logout</a> 
					
				</li> 
				<li> 
							<a href="">Subscribers</a> 
							<ul> 
								<li><a href="subreg.php">New</a></li> 
								 
								<li><a href="subup.php">Operations</a></li> 
							 
							</ul> 
						</li> 
					<li > 
							<a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Debts</a> 
							<ul> 
								<li><a href="debreg.php">New</a></li> 
								
								<li><a href="debregup.php">Debt Servicing</a></li> 
							 
							</ul> 
						</li> 

						<li> 
							<a href="">Products</a> 
							<ul> 
								<li><a href="newprod.php">New Product</a></li> 
								<li><a href="prods.php">Products List</a></li> 
							
							</ul> 
						</li> 
				<li> 
					<a href="">Purchases</a> 
					<ul> 
						<li> 
							<a href="">Buy</a> 
							<ul> 
								<li><a href="buyfx.php">Fixed Cost Prods</a></li> 
								<li><a href="buyvr.php">Variable Cost  ..</a></li> 
							</ul> 
						</li> 
						
						<li> 
							<a href="">Sell</a> 
							<ul> 
								<li><a href="sellfx.php">Fixed Cost Prods</a></li> 
								<li><a href="sellvr.php">Variable Cost Pds</a></li> 
								</ul> 
						</li> 
                     <li> 
							<a href="botf.php">Bought</a></li> 
                      <li> 
							<a href="buyf.php">Sold</a></li>
					</ul> 
				</li> 
				<li> 
					<a href="">Report</a> 
					<ul> 
						<li><a href="accf.php">Account</a></li> 
						<li> 
							<a href="">Debts</a> 
							<ul> 
								<li><a href="debcuf.php">One Customer</a></li> 
								<li><a href="debcaf.php">All Customers</a></li> 
								</ul> 
						</li> <li> 
							<a href="">Subscriptions</a> 
							<ul> 
								<li><a href="subcuf.php">One Customer</a></li> 
								<li><a href="subcaf.php">All Customers</a></li> 
								</ul> 
						</li> 
					</ul> 
				</li> 
				<font color="white" size="+1"> <?php echo date("d-m-Y");?> </font>
</ul> </nav> 
	
</center>
<center><br><br><br><br>
<font size="+2">Fixed Price Bought Product  <br><br></font>
<form action="insert.php" method="post">
<table border="0"  width="82%" height="35%" align="center" bgcolor="white" class="tbl">
<tr class="tblhd"><td></td><td align="center">Product Name</td><td align="center">Quantity</td><td></td><tr>
<tr><td><input type="reset" name="sub" Value="Clear"></td><td>
<select name="pname">
    <option>-Select Product-</option>
    <?php

//  Connect to the database and setup the array
$host="Localhost";
$username="root";
$password="";

$con=Mysql_connect("localhost","root","")
or
die("Not connected" .Mysql_error());

mysql_select_db("canteen",$con) or die("can not select db". mysql_error());

$result=mysql_query("select distinct pname from products");
while($n=mysql_fetch_array($result))
{
?>
<option value="<?php echo $n['pname']; ?>"><?php echo $n['pname']; ?></option>
<?php
}

mysql_close($con) ;
?>
    
    </select>




</td><td><input type="text" name="qty" ></td><td><input type="submit" name="bf" Value="Regist"></td><tr>

 
 
 <tr><td align="center"><a href="success.php"> <font color="blue" size="+1" >Back</a></font></td>
<td align="left">
     </font>
   <font color="red" size="+2"><?PHP
    if(isset($_SESSION['success']))
{
echo"".$_SESSION['success'];
}
 if(isset($_SESSION['error']))
{
echo "".$_SESSION['error'];
}
?></font></td></tr>
 <table>
 </form>
</div>
<br><br><br><br>
<div id="ft">

</div>
</div>
</body>
</html>
<?php
unset($_SESSION['error'],$_SESSION['logged_in'],$_SESSION['success'])
?>