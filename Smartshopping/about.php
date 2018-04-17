<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AboutUs</title>
<link href="css/smartshop_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smartshop_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>

<body id="subpage">

<div id="smartshop_wrapper">

    
<?php 
include('header/Header.php');
include('menu/menu.php');

 ?>    
     <!-- end of smartshop_menu -->
    
    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
   
        <?php
		include('sidebar/sidebar.php');
		?>
         <!-- END of sidebar -->
                
        <div id="content">
        	
            <h2>Company Overview</h2>
        <p><b>Shopping that helps you make the right and smart choice.</b><p>We offer Shopping that is stylish, trendy and reliable – the Shopping that is light on your pockets, the Shopping that is simpler, easier, faster and always Online.AT SmartShoppers, we understand you better</p>
        <ul class="tmo_list">
        	<li>We know you need the best!</li>
            <li>Our Services at your Doorsteps</li>
            <li>The 24 x7 Online Fashion & Lifestyle Store for everyone</li>
		</ul>
        <div class="cleaner h20"></div>
       <!-- <h3>Shopping is a sport, be SMART and have fun!!</h3>-->
		<p></p>
        <div class="cleaner"></div>
        <blockquote>   <h3>Shopping is a sport, be SMART and have fun!!</h3> </blockquote>
            
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
  
    
<?php
include('footer/footer.php');
?>
</div>

</body>
</html>