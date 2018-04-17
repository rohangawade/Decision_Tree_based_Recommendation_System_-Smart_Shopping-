
<?
session_start();
	if($_SESSION['admin_status']!=='logged_in')
	{
		header("location:index.php");
	}
	$adminname=$_SESSION['admin_name'];
	?>
	
<html>
<head>
<title>Admin's Panel</title>
<link rel="stylesheet" type="text/css" href="admin.css"/>
<head>


<body>
<div class="container">

	
	<div id="admin_nav">
	<a href="#">Add/Delete Items</a>
	<a href="#">See requested items</a>
	<a href="#">See orders delivered</a>
	<a href="#">Update</a>
	</div><br /><br />
	<div class="header">
	<?php
			?>
		<h2>Welcome <?php echo $adminname; ?></h2>
		<a href="admin_action.php?action=logout" class="button">Logout</a>
		<br />
		<br />
	</div>

	<div class="content">	<table>
		<tr><th align='center' colspan='2'><h2>Upload new Items</h2></th></tr>
		<form action="admin_action.php?action=additems" method="post" enctype="multipart/form-data">
		<tr>	<td>NAME:</td><td><input size=40 type="text" name="name"/>  <br />
		<tr>	<td>GENDER:</td><td> <select name='gender'><option value='M'>male</option><option value='F'>female</option></td></tr>
		<tr>	<td>CATEGORY:</td><td>	<select name="category"><option >Select Category
																<option value="Tshirts">Tshirts</option>
																<option value="Shirts">Shirts</option>
																<option value="Jeans">Jeans</option>
																<option value="Kids">Kids</option></td></tr>
		<tr>	<td>BRAND:</td><td>	<input size=40 type="text" name="brand"/></td></tr>
		<tr>	<td>COLOR:</td><td>	<input size=40 type="text" name="color"/></td></tr>
		<tr>	<td>PRICE:</td><td>	<input type="text" size=40 name="price"/></td></tr>
		<tr>	<td>QUANTITY:</td><td>	<input type="number" size=40 name="quantity"/></td></tr>
		<tr>	<td>UPLOAD:</td><td>	<input type="file" size=40 name="image"/> <lable for="image"></lable></td></tr>
		<tr>	<td colspan='2' align='center'>	<input type="submit" value="Add Record"/></td></tr>
		
		</form></table>
	</div>
</div>
</body>
</html>
