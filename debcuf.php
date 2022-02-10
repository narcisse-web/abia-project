<?php
session_start();

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head><title>Canteen Mgt System</title>
<link rel="stylesheet"  type="text/css" href="scripts3.css">
<style type="text/css">
a:link
{
color:white;
}
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
width:220px;
height:25px;
text-align:center;
font-size:20px;
font-weight:bold;
border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"]
{
width:180px;
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
input[type="reset"]
{
width:180px;
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

select
{
text-align:center;
font-size:18px;
font-weight:bold;
border-radius:4px;
border:1px solid green;
width:220px;
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
.fm
{
background-color:white;
height:170px;
width:750px;
border:solid green 1px;
border-radius:4px;
}
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
<FORM METHOD="POST" ACTION="debcu.php"  class="fm">
<TABLE >
<font size="+3" color="blue">Select Customer </font><br><br>
<TR>
	<TD align="center">
	<strong>First Name</strong>
	</TD>
	<TD align="center">
	<strong>Last Name</strong>
	</TD>
	<TD align="center">
	<strong>From (Date):</strong>
	</TD></TR></font></B>
<TR>
	<TD align="center">
	<select name="fnm">
    <option>-Select first name-</option>
    <?php

//  Connect to the database and setup the array
$host="Localhost";
$username="root";
$password="";

$con=Mysql_connect("localhost","root","")
or
die("Not connected" .Mysql_error());

mysql_select_db("canteen",$con) or die("can not select db". mysql_error());

$result=mysql_query("select distinct dfname from debts");
while($n=mysql_fetch_array($result))
{
?>
<option value="<?php echo $n['dfname']; ?>"><?php echo $n['dfname']; ?></option>
<?php
}

mysql_close($con) ;
?>
    
    </select>

	</TD>
	<TD align="center">
	<select name="lnm">
    <option>-Select last name-</option>
    <?php

//  Connect to the database and setup the array
$host="Localhost";
$username="root";
$password="";

$con=Mysql_connect("localhost","root","")
or
die("Not connected" .Mysql_error());

mysql_select_db("canteen",$con) or die("can not select db". mysql_error());

$result=mysql_query("select distinct dlname from debts");
while($n=mysql_fetch_array($result))
{
?>
<option value="<?php echo $n['dlname']; ?>"><?php echo $n['dlname']; ?></option>
<?php
}

mysql_close($con) ;
?>
    
    </select>

	</TD>
	<TD align="center">
	<input name="sdt" type="text" placeholder="yyyy-mm-dd" />
	</TD>
	</TR>
	<TD align="center" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<br><input name="submit" type="submit" value="Submit" /></TD><td>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<br><input name="submit" type="reset" value="Clear" /></TD>
</TR>

</TABLE>
</FORM>



   </center>
</div>

<div id="ft">

</div>
</div>
</body>
</html>
