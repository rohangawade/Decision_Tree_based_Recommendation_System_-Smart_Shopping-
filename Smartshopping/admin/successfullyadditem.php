
<!DOCTYPE HTML>
<?
session_start();
	if($_SESSION['admin_status']!=='logged_in')
	{
		header("location:adminindex.php");
	}
	$adminname=$_SESSION['adminname'];
	?>
<?php
include("connection.php");
?>
<?php
session_start();
if(@$_SESSION['user_status']=='logged_in')
{
header('location:index.php');
die;
}


?>
<html>
<head>
<title>SmartShoppers - Registration</title>
<style>
div #captcha
{
color:red;
float:right;
align center;
}
</style>

<link href="../css/smartshop_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ddsmoothmenu.js"></script>

<script type="text/javascript" src="../js/select_state.js"></script>
<script type="text/javascript">


	
</script>

</head>

<body id="subpage">

<div id="smartshop_wrapper">
<?php
include('header/Header.php');
?>    

<div class="register" id="smartshop_menu">
   </div>

    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
    	
    <?php
		//include('sidebar/sidebar.php');
	?>	
	<div id="sidebar">
<fieldset>
	<legend >
	<h3>Admin Menu</h3>
            <ul type="square">
				<li> MEN</li>
					<ul class="sidebar_menu">
						<li><a href="model2.php">Add Items</a></li>
						<li><a href="MT-Shirt.php">Edit or Delete items</a></li>				
					</ul>
				
			</ul>
</fieldset>
	</div>
        <div id="content">
       		<fieldset>
			<legend ><h3>Add Items</h3></legend>
		
		<h2>ITEMS ADDED SUCCESSFULLY!!</h2>
		<a href="model2.php"><h3>ADD MORE ITEMS</h3></a>
               
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
	</div>

</body>
</html>