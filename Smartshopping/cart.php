
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
//error_reporting(0);
//include('Dbconnect.php');
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
		$_SESSION['message']="<h2>You do not have any Product/Item in your shopping cart</h2>";
		header("location:message.php");
	}

}
?>
     <!-- end of smartshop_menu -->
    
    <div id="smartshop_middle">
    	<img src="images/smartshop_image_011.gif" alt="Image 01" />
    	<h1>Introducing Smart Shopping</h1>
        <p><a href="" target="_parent">Smart Shopping</a> We help in making your Shopping experience Better!!</p>
        
    </div> <!-- END of middle -->
    
   
        <?php 
		include('slider/slider.php');
		//include('sidebar/sidebar.php');
		?>
	<div id="sidebar">
	<p class="title"> Cart Functions..</p>
							<ul>
								<li><a href="index.php">Add more items</a></li>
						
							</ul>
	</div>
	   <div id="content" >
		<table id="main_table" class="main_table" width='100%'>
			<tr>
				
				<td valign="top" width="100%">
        
     
						
									<h3>Welcome <?php echo $user_name; ?></h3>
							
							
								<?php
									$sql="select * from shopping_cart where user_id='$user_id'";
									$result=select($sql);
									
									if(mysql_num_rows($result)>0)
									{	$i=1;$total_price=0;
										echo "<table class='cart_table' >";
										echo"<tr><th>Sr. No.</th><th>Item</th><th>Item Name</th><th>Quantity</th><th> Price</th><th>Total price</th><th>Last updated</th><th>Action</th></tr>";
										echo "<form action='add_to_cart.php?action=update' method='post'>";
										while($row=mysql_fetch_assoc($result))
										{	
											$item_id=$row['itemid'];
											$row2=select_unique("select * from items where itemid='$item_id'");
											$item_name=$row2['brand'];
											echo"<tr>";
											echo"<td>".$i."</td>";
											echo "<td><img src='".$row2['path']."' width='100px' height='100px'/></td>";
											echo"<td>".$item_name."</td>";
											echo"<td><input size='5' type='number' name='q[$item_id]' value='".$row['quantity']."'/></td>";
											echo"<td>Rs. ".$row['price']."</td>";
											echo"<td>Rs. ".$row['total_price']."</td>";
											$total_price+=$row['total_price'];
											echo"<td>".$row['last_update']."</td>";
											echo"<td><a href='add_to_cart.php?action=remove&item_id=$item_id' >Remove </a></td>";
											echo"</tr>";
											$i++;
										}
									
										echo"<tr>
										<td colspan='3' ><input type='submit' class='submit_btn' value='Update cart' /></td>
										<td colspan='4'> <b>Total amount: </b>Rs. $total_price</td>
										</tr>"; 
										echo "<tr><td style='padding:10px 0px 10px 0px' colspan='7'><a class='add_to_cart_button' href='checkout.php'>Checkout</a>";
											echo "</form>";
											echo "</table>";
									}
								?>
							
					
				</td>
			</tr>
		</table>
		</div>
	<div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
    <!-- END of footer -->   
   
</div>

</body>
</html>