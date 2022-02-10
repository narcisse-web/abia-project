<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head><title>Canteen Mgt System</title>
<link rel="stylesheet"  type="text/css" href="scripts.css">
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
height:30px;
text-align:center;
font-size:24px;
border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
background-color:green;
color:white;
}

</style>

</head>
<body>

<div id="main">

<div id="hd">

</div>

<div id="bd">
<form action=" " method="POST" onsubmit="return valid()">
<br>
<table border="0" align="center" width="50%" class="tbl_log">
<tr>
<td align="center">Sign in below<hr color="green"></td>

</tr> <tr>
<td align="center"><i>Username</i></td></tr><tr>
<td align="center"><input type="text" name="user" placeholder="Username"/></td></tr><tr>
<td align="center"><i>Password</i></td></tr><tr>
<td align="center"><input type="password" name="user" placeholder="Username"/></td></tr>
<tr>
<td align="center"><input type="submit" name="lgn" value="Login"/></td></tr>
<tr>
<td align="center"><div id="error"></div></td></tr>
</table>
      
</div>

<div id="ft">

</div>
</div>
</body>
</html>