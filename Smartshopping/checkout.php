
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

if($_SESSION['user_status']!='logged_in')
{
	$_SESSION['login']='wrong';
	header('location:registration.php');
} 
else{
$user_id=@$_SESSION['user_id'];
$sql="select * from shopping_cart where user_id='$user_id'";
$result=select($sql);
if($result=='false')
{
	@$_SESSION['message']="<h2>You do not have any itemss in your shopping cart</h2>";
	header("location:message.php");

}
}
include('menu/menu.php');
?>     <!-- end of smartshop_menu -->
    
    <div id="smartshop_middle">
    	<img src="images/smartshop_image_011.gif" alt="Image 01" />
    	<h1>Introducing Smart Shopping</h1>
        <p><a href="" target="_parent">Smart Shopping</a> We help in making your Shopping experience Better!!</p>
        
    </div> <!-- END of middle -->
    
   
        <?php
		include('slider/slider.php');
		include('sidebar/sidebar.php');
		?>
         <!-- END of sidebar -->
        
        <div id="content" >
	
	
	
	
						<div class='cart'>
								<?php
									$sql="select * from shopping_cart where user_id='$user_id'";
									$result=select($sql);
									if($result!=='false')
									{	$i=1;$total_price=0;
										echo "<table class='cart_table'>";
										echo"<tr  ><td align='center' valign='middle' colspan='4'><h3 class='title'>Your Bill</h3></td ><td colspan='2'><a href='cart.php'>[Edit Shopping Cart]</a></td></tr>";
										echo"<tr><th>Sr. No.</th><th>Item</th><th>Item Name</th><th>Quantity</th><th> Price</th><th>Total price</th></tr>";
										
										while($row=mysql_fetch_assoc($result))
										{	
											$item_id=$row['itemid'];
											$row2=select_unique("select * from items where itemid='$item_id'");
											$item_name=$row2['brand'];
											$item_path=$row2['path'];
											echo"<tr>";
											echo"<td>".$i."</td>";
											echo "<td><img src='".$item_path."' width='100px' height='100px'></td>";
											echo"<td>".$item_name."</td>";
											echo"<td>".$row['quantity']."</td>";
											echo"<td>Rs. ".$row['price']."</td>";
											echo"<td>Rs. ".$row['total_price']."</td>";
											$total_price+=$row['total_price'];
											
											echo"</tr>";
											$i++;
										}
									
										echo"<tr>		
										<td colspan='6' align='right'> <b>Total amount: </b>Rs. $total_price</td>
										</tr>"; 
										
										
											
											echo "</table>";
									}
								?>
								<?php
			
	//	session_start();
		//include('DbFunctions.php');
	//	$username=$_SESSION['user_name'];
		$sql="select * from user where user_id='$user_id'";
	$result=select($sql);

	if($row = mysql_fetch_assoc($result))
	{	

	$fname=$row['first_name'];
	$lname=$row['last_name'];
	$contact=$row['contact_no'];
	$addr=$row['address'];
	$country=$row['country'];
	$zip=$row['zip'];	
	$sql="select con_name from country where con_id='$country'";
	$result1=select($sql);
	$row1 = mysql_fetch_assoc($result1);
	$country=$row1['con_name'];
	$state=$row['state'];
	$city=$row['city'];
	$sql="select cit_name from city where cit_id='$city' and sta_id='$state'";
	$result1=select($sql);
	$row1 = mysql_fetch_assoc($result1);
	$city=$row1['cit_name'];

	$sql="select sta_name from state where sta_id='$state'";
	$result1=select($sql);
	$row1 = mysql_fetch_assoc($result1);
	$state=$row1['sta_name'];
	
	}
	
	?>
								<table id="checkout_table" class="checkout_table"  width='100%'>
			<tr>	
				<td valign='top'>
					<h3 class='title'>Please Fill the shipping information</h3>
					<p>Note:</p><p>Items will be delivered to destination with your reference.</p>
					<p>Payment on delivery</p>
					
						<form action='add_to_cart.php?action=checkout' method='post'>
						<table id='regedit' border='1'>	
						<tr><th>First name:<td><input type='text' name='shipping_fname' value="<?php echo $fname;?>"/></tr>
						<tr><th>Last name:<td><input type='text' name='shipping_lname' value="<?php echo $lname;?>"/> </tr>
						<tr><th>Address:<td><textarea  cols='40' rows='3' name='shipping_address' ><?php echo $addr ;?></textarea> </tr>
						<tr><th>Contact no:<td><input type='text' value="<?php echo $contact; ?>" name='shipping_contact' /> </tr>
						<tr><th>State:<td><input type='text' value="<?php echo $state;?>" name='shipping_state'/> </tr>
						<tr><th>City:<td><input type='text' value="<?php echo $city;?>" name='shipping_city'/> </tr>
						<tr><th>Zip:<td><input type='text' value="<?php echo $zip;?>" name='shipping_zip'/> </tr>
						<tr align='center'><td colspan='2'><input type='submit' class="submit_btn" name='shipping_form_submit' value='Checkout'/></tr>
						</table>
						</form>
					
				</td>
				</tr></table>
								
						</div>	
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

							