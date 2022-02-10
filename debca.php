
<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("canteen",$conn);

	$sd=$_POST['sdt'];
	$ed=$_POST['edt'];
$result = mysql_query("SELECT dfname,dlname,class,sum(dbt) as deb,sum(pay) as py FROM debts where dati between  '$sd' AND  '$ed' group by dlname");
//$st=Mysql_fetch_array($result);

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
width:53px;
height:25px;
text-align:center;
font-size:14px;
font-weight:bold;
border-radius:4px;
border:1px solid white;
font-family:"Trebuchet MS";
background-image:url(images/btn1.png);
color:black;
}
.sm
{
color:blue;
font-weight:bold;
font-size:18px;
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


<table border="0" cellpadding="10" cellspacing="0" width="95%" class="tblListForm">
<tr class="listheader">
<td colspan="7" class="h"><center><font size="+2" color="Yellow">Debts From: </font><font size="+2" ><?php echo $sd; ?></font><font size="+2"><font size="+2" color="Yellow"> to:</font><font size="+2"><?php echo $sd; ?></font></center></td>
</tr>
<tr class="listheader h">
<td></td>
<td>First Name</td>
<td>Last Name</td>
<td>Class</td>
<td>New Debt</td>
<td>Paid</td>
<td>Final Debt </td>

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
<td><input type="checkbox" name="users[]" value="<?php echo $row["no"]; ?>" ></td>
<td class="h"><?php echo "&nbsp;&nbsp;".$row["dfname"]."&nbsp;";  ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;". $row["dlname"]."&nbsp; " ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;". $row["class"]."&nbsp; " ?></td>
<td class="h"><?php echo "&nbsp;".$row["deb"]."&nbsp;Rwf";  ?></td>
<td class="h"><?php echo "&nbsp;".$row["py"]."&nbsp;Rwf";  ?></td>
<td class="h"><?php echo "&nbsp;". ($row["deb"]-$row["py"])."&nbsp;Rwf"?></td>
</tr>
<?php
$i++;
}
$result=mysql_query("select sum(dbt) as debs,sum(pay) as pyd from debts where dati BETWEEN '$sd' AND '$ed' ");

$us=mysql_fetch_array($result);
$bal=$us[debs]-$us[pyd];
?>
<tr class="sm">
<td></td><td></td><td colspan="2" align="center"> Total:    </td>

<td  >  <?php echo "&nbsp;".  $us['debs']."&nbsp;&nbsp;&nbsp;frs" ?> </td>
<td  >  <?php echo "&nbsp;".  $us['pyd']."&nbsp;&nbsp;&nbsp;Rwfr" ?>   </td>
<td  >   <?php echo "&nbsp;".  $bal."&nbsp;&nbsp;&nbsp;Rwfr" ?>  </td>

</tr>

<tr class="listheader">
<td colspan="7"> <a href="Success.php"><input type="button" name="delete" value="Back" /></a></td>

</tr>
</table>
</form></center>
</div>

<div id="ft">

</div>
</div>
</body>
</html>