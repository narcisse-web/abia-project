<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("canteen",$conn);
$result = mysql_query("SELECT * FROM products order by pid desc");
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head><title>Canteen Mgt System</title>
<script language="javascript" src="jscr.js" type="text/javascript"></script>
<link rel="stylesheet"  type="text/css" href="scripts4.css">
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
width:280px;
height:30px;
text-align:center;
font-size:24px;

border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"]
{
width:280px;
height:50px;
text-align:center;
font-size:24px;
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
input[type="button"]
{
font-size:18px;
width:100px;
border:solid green 1px;
border-radius:0px;
text-align:center;
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
<form name="frmUser" method="post" action="">


<table border="0" cellpadding="10" cellspacing="0" width="90%" class="tblListForm">
<tr class="listheader">
<td colspan="5" class="h"><center>List Of Products</center></td>
</tr>
<tr class="listheader h">
<td></td>
<td>Name</td>
<td>Unit Buying Price</td>
<td>Unit Selling price</td>
<td>Unit Benefit</td>
</tr>

<?php
$i=0;
while($row = mysql_fetch_array($result)) 
{
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?> h">
<td class="h"><input type="checkbox" name="users[]" value="<?php echo $row["pid"]; ?>" ></td>
<td class="h"><?php echo "&nbsp;&nbsp;".$row["pname"]; ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["up"]."&nbsp;&nbsp;&nbsp;Rwf";  ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["uc"]."&nbsp;&nbsp;&nbsp;Rwf";  ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $row["benefit"]."&nbsp;&nbsp;&nbsp;Rwf";  ?></td>
</tr>
<?php
$i++;
}
?>

<tr class="listheader">
<td colspan="5"><input type="button" name="update" value="Edit" onClick="setUpdateProd();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteProd();" /></td>
</tr>
</table>
</form></center>
</div>

<div id="ft">

</div>
</div>
</body>
</html>