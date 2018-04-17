
<!DOCTYPE HTML>
<?php
session_start();
$username= $_SESSION['user_name'];
//include("DbConnect.php");
include("connection.php");
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

<link href="css/smartshop_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<script type="text/javascript" src="js/select_state.js"></script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smartshop_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
</head>

<body id="subpage">

<div id="smartshop_wrapper">
<?php
include('header/Header.php');
?>    

<div class="register" id="smartshop_menu">
   <marquee> <h1>Register To Be SMART</h1></marquee></div>

    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
    	
    <?php
		//include('sidebar/sidebar.php');
	?>	
	<div id="sidebar">
	
<a href="regedit.php"><img src ="images/menud1.gif" width="220px" height="90px"/></a>
<a href="#"><img src ="images/menul2.gif" width="220px" height="90px"/></a>
	</div>
        <div id="content">
       		
<fieldset>			
		<?php
			include('upload_crop.php');
		?>
</fieldset>
               
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
	</div>

</body>
</html>