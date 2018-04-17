
<?php
include('Dbconnect.php');
if(@$_SESSION['user_status']!=='logged_in')
{
$_SESSION['message']="<h2>You are not logged in</h2><p>Please log in to use this facility</p>";
header("location:message.php");
}
else
{	
	$user_id=$_SESSION['user_id'];
	$user_name=$_SESSION['user_name'];
	$sql="select * from shopping_cart where user_id='$user_id'";
	$result=select($sql);
	if($result=='false')
	{
		$_SESSION['message']="<h2>You do not have any books in your shopping cart</h2>";
		header("location:message.php");
	}

}
?>
<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Shopping</title>
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

</script>

<link rel="stylesheet" type="text/css" href="css/styles.css" />
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 5,
						elemsSlide: 2,
						duration: 200,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 171,
						showControls:1});
		},
		
	});

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

</head>

<body id="home">

<div id="smartshop_wrapper">
<?php 
include('header/Header.php');
include('menu/menu.php');

 ?>    
     <!-- end of smartshop_menu -->
    
    <div id="smartshop_middle">
    	<img src="images/smartshop_image_011.gif" alt="Image 01" />
    	<h1>Introducing Smart Shopping</h1>
        <p><a href="" target="_parent">Smart Shopping</a> We help in making your Shopping experience Better!!</p>
        
    </div> <!-- END of middle -->
    
   
        <?php
		include('slider/slider.php');
		include('sidebar/sidebar.php');
		?>
		<p class="title"> Cart Functions..</p>
							<ul>
								<li><a href="index.php">Add more books</a></li>
						
							</ul>
         <!-- END of sidebar -->
        
        <div id="content" name="a">
			
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
    <!-- END of footer -->   
   
</div>

</body>
</html>