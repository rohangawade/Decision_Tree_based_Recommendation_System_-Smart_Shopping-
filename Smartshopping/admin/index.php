<?php
session_start();
if(@$_SESSION['admin_status']=='logged_in')
{
	header("location:additems.php");
}
?>
<html>
<head>
	<title>Admin pannel</title>
	<link rel="stylesheet" type="text/css" href="admin.css"/>

	</head>
<body >
	<div class="container" >
		<div class="login">
			<table align='center'>
			<tr>
			<td colspan='2'><h2 class="header-title">Admin Login</h2></td></tr>
			<form action="admin_action.php?action=login" method="post">
			<tr><td>Admin name:</td><td><input size=30 type="text" name="admin_name"/></td></tr>  
			<tr><td>Password:</td><td><input size=30 type="password" name="password"/></td></tr> 
			<tr><td align='center'><input type="submit" value="Log In"/></td><td align='center'>
			<a href='../'> Sign up
			</a></td></tr>
			<tr></tr>
		    <tr></tr>
			<tr></tr>
			<tr>		<td colspan='2' align='center'>Go to: <a href="../"><b>Main site</b></a></td></tr>
			</form></table>
			<br />
		</div>
	</div>







</body>
</html>