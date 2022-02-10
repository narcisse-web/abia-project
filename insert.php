<?php
session_start();
$conn = mysql_connect("localhost","root","");
mysql_select_db("canteen",$conn);
?>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">

</style>
<?php
//
$u=$_SESSION['logged_in'];
$e=mysql_fetch_array(mysql_query("SELECT * FROM users where userName='$u'"));
$usr=$e['userId'];
//

/////////////////////////New Product Registration/////////////////////
///////////////////////////////////////////////////////////////////////////


if(isset($_POST["prd"])) 
{
if( $_POST["pnm"]!=""  && $_POST["up"]!=""&& $_POST["ucst"]!="") 
{

$pnm=$_POST["pnm"];
$up=$_POST["up"];
$ucst=$_POST["ucst"];
$ben=$ucst-$up;

$d=mysql_query("insert into products(pid,pname,up,uc,benefit) values('','$pnm','$up','$ucst','$ben')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("newprod.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");
echo Mysql_error();
include("newprod.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("newprod.php");
}
}


/////////////////////////New Subscriber Registration/////////////////////
     ///////////////////////////////////////////////////////////////////////////


if(isset($_POST["sub"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""  && $_POST["clss"]!=""&& $_POST["depo"]!="") 
{
$fnm=$_POST["fnm"];
$lnm=$_POST["lnm"];
$clss=$_POST["clss"];
$depo=$_POST["depo"];
$used=$_POST["used"];
$bal=$depo-$used;
$dt=date("Y-m-d");
$tm=date("H:i:s");
$com=mysql_query("SELECT fname,lname,class FROM subscribers where fname='$fnm' and lname='$lnm' and class='$clss'");
$chk=Mysql_num_rows($com);
if($chk==0)
	{

$d=mysql_query("insert into subscribers(no,fname,lname,class,acc,used,balance,date,timu) values('','$fnm','$lnm','$clss','$depo','$used','$bal','$dt','$tm')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("subreg.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");
echo Mysql_error();
include("subreg.php");
}}
else
		{
$_SESSION['error']='Sorry , This Customer Exists on list!!  ';
include("subreg.php");
}}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("subreg.php");
}
}

///////////////////////// Subscriber Registration/////////////////////
     ///////////////////////////////////////////////////////////////////////////


if(isset($_POST["subp"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""  && $_POST["clss"]!="") 
{
$fnm=$_POST["fnm"];
$lnm=$_POST["lnm"];
$clss=$_POST["clss"];
$depo=$_POST["depo"];
$used=$_POST["used"];
$tm=date("H:i:s");
$dt=date("Y-m-d");

$com=mysql_query("SELECT fname,lname,class,balance FROM subscribers where fname='$fnm' and lname='$lnm' and class='$clss' order by no desc");
$chk=Mysql_num_rows($com);
 $f=mysql_fetch_array($com);
$depos=$f['balance'];
if($chk!=0)
	{

$bal=$depos-$used+$depo;
$d=mysql_query("insert into subscribers(no,fname,lname,class,acc,used,balance,date,timu) values('','$fnm','$lnm','$clss','$depo','$used','$bal','$dt','$tm')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("subup.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");
echo Mysql_error();
include("subup.php");
}}
else
		{
$_SESSION['error']='Sorry , This Customer do not Exists on list!!  ';
include("subup.php");
}}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("subup.php");
}
}
/////////////////////////New Debt Registration/////////////////////
     ///////////////////////////////////////////////////////////////////////////


if(isset($_POST["deb"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""  && $_POST["class"]!=""&& $_POST["amt"]!="") 
{
$fnm=$_POST["fnm"];
$lnm=$_POST["lnm"];
$clss=$_POST["class"];
$amt=$_POST["amt"];

$dt=date("Y-m-d");

$com=mysql_query("SELECT dfname,dlname,class FROM debts where dfname='$fnm' and dlname='$lnm' and class='$clss'");
$chk=Mysql_num_rows($com);
if($chk==0)
	{

$d=mysql_query("insert into debts(did,dfname,dlname,class,amt,pay,dbt,dati) values('','$fnm','$lnm','$clss','$amt','','$amt','$dt')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("debreg.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");
echo Mysql_error();
include("debreg.php");
}}
else
		{
$_SESSION['error']='Sorry , This Customer Exists on list!!  ';
include("debreg.php");
}}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("debreg.php");
}
}

///////////////////////// Debt Registration/////////////////////
     ///////////////////////////////////////////////////////////////////////////


if(isset($_POST["debp"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""  && $_POST["clss"]!="") 
{
$fnm=$_POST["fnm"];
$lnm=$_POST["lnm"];
$clss=$_POST["clss"];
$py=$_POST["py"];
$dbt=$_POST["dbt"];

$dt=date("Y-m-d");

$com=mysql_query("SELECT dfname,dlname,class,amt FROM debts where dfname='$fnm' and dlname='$lnm' and class='$clss' order by did desc");
$chk=Mysql_num_rows($com);
 $f=mysql_fetch_array($com);
$amt=$f['amt'];
if($chk!=0)
	{
//	if($dbt>0)
$famt=$amt+$dbt-$py;
//	else
//$famt=$amt-$py;
$d=mysql_query("insert into debts(did,dfname,dlname,class,amt,pay,dbt,dati) values('','$fnm','$lnm','$clss','$famt','$py','$dbt','$dt')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("debregup.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");
echo Mysql_error();
include("debregup.php");
}}
else
		{
$_SESSION['error']='Sorry , This Customer do not Exists on list!!  ';
include("debregup.php");
}}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("debregup.php");
}
}
/////////////////////////////////////Buy Fix ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["bf"])) 
{
if($_POST["pname"]!="" && $_POST["qty"]!="") 
{
$pname=$_POST["pname"];
$qty=$_POST["qty"];
$today=date('y-m-d');

$res = mysql_fetch_array(mysql_query("SELECT * FROM products where pname='$pname'"));
$up=$res['up'];
$totp=$up*$qty;


$d=mysql_query("insert into boughts(rno,pname,qty,uprc,tprc,dati) values('','$pname','$qty','$up','$totp','$today')");
//
if($d)
{
$_SESSION['success']="Successfully Recorded!";
//header("Location:newuser.php");
include("buyfx.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:buyfx.php");
echo Mysql_error();
include("buyfx.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:buyfx.php");
include("buyfx.php");
}
}
/////////////////////////////////////Buy Var ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["bv"])) 
{
if($_POST["pnm"]!="" && $_POST["qty"]!=""&& $_POST["up"]!="") 
{
$pname=$_POST["pnm"];
$up=$_POST["up"];
$qty=$_POST["qty"];
$today=date('Y-m-d');
$totp=$up*$qty;


$d=mysql_query("insert into boughts(rno,pname,qty,uprc,tprc,dati) values('','$pname','$qty','$up','$totp','$today')");
//
if($d)
{
$_SESSION['success']="Successfully Recorded!";
//header("Location:newuser.php");
include("buyvr.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:buyfx.php");
echo Mysql_error();
include("buyvr.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:buyfx.php");
include("buyvr.php");
}
}

/////////////////////////////////////Sell Var ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["sv"])) 
{
if($_POST["pnm"]!="" && $_POST["qty"]!=""&& $_POST["up"]!="") 
{
$pname=$_POST["pnm"];
$up=$_POST["up"];
$qty=$_POST["qty"];
$today=date('Y-m-d');
$tsp=$up*$qty;
$res = mysql_fetch_array(mysql_query("SELECT max(rno) as mx from boughts where pname='$pname'"));
$mx=$res['mx'];
$res = mysql_fetch_array(mysql_query("SELECT * FROM boughts where pname='$pname' and rno='$mx' "));
$upb=$res['uprc'];
$tbp=$upb*$qty;
$tbnf=$tsp-$tbp;
$d=mysql_query("insert into sold(rid,pname,qty,usp,tsp,tbp,tbnf,dati) values('','$pname','$qty','$up','$tsp','$tbp','$tbnf','$today')");
//
if($d)
{
$_SESSION['success']="Successfully Recorded!";
//header("Location:newuser.php");
include("sellvr.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:buyfx.php");
echo Mysql_error();
include("sellvr.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:buyfx.php");
include("sellvr.php");
}
}
/////////////////////////////////////Sell Fix ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["sf"])) 
{
if($_POST["pname"]!="" && $_POST["qty"]!="") 
{
$pname=$_POST["pname"];
$qty=$_POST["qty"];
$today=date('Y-m-d');
$res = mysql_fetch_array(mysql_query("SELECT up,uc from products where pname='$pname'"));
$up=$res['up'];
$uc=$res['uc'];
$tsp=$uc*$qty;
$tbp=$up*$qty;
$tbnf=$tsp-$tbp;

$d=mysql_query("insert into sold(rid,pname,qty,usp,tsp,tbp,tbnf,dati) values('','$pname','$qty','$uc','$tsp','$tbp','$tbnf','$today')");
//
if($d)
{
$_SESSION['success']="Successfully Recorded!";
//header("Location:newuser.php");
include("sellfx.php");
}
else
{
$_SESSION['error']='An Error Occured';
//header("Location:buyfx.php");
echo Mysql_error();
include("sellfx.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:buyfx.php");
include("sellfx.php");
}
}



//////////////////// USER ACCOUNT CREATION///////////////////
                      //////////////////////////////////////////////                                 

if(isset($_POST["uza"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""&& $_POST["uznm"]!=""&& $_POST["pwd"]!="") 
{
$fname=$_POST["fnm"];
$lname=$_POST["lnm"];
$user=$_POST["uznm"];
$pass=$_POST["pwd"];

$uz=mysql_query("insert into users(fname,lname,username,password) values('$fname','$lname','$user','$pass')");

if($uz)
{
$_SESSION['success']="Account created successfully!!";
//header("Location:newuser.php");
include("userreg.php");
}
else
{
$_SESSION['error']='An Error Occured !!! ';
//header("Location:sold.php");
echo Mysql_error();
include("userreg.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:sold.php");
include("userreg.php");
}
}
?>