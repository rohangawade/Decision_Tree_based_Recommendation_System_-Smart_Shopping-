<?php
//include('DbConnect.php');
$item_id1=$_GET['item_id'];

function display($rowsperpage)
{
$offset=0;
// get the info from the db 
$sql = "SELECT itemid, name, category, brand, color, price, path FROM items  LIMIT $offset, $rowsperpage";
$result = select($sql);
$i=1;
// while there are rows to be fetched...
while ($list = mysql_fetch_assoc($result)) {
   // echo data
   $item_id=$list['itemid'];
							$image_name=$list['name'];
							$image_brand=$list['brand'];
							$image_path=$list['path'];
							$image_price=$list['price'];		
								
										if($i%3==0)
										{
									echo "<div class='col col_14 product_gallery'>
									
										<a href='productdetail.php?item_id=$item_id' >
										<img src='$image_path'  />
										</a>		
                <h3>'$image_brand'</h3>
                <p class='product_price'>'$image_price'</p> 
                 <a href='add_to_cart.php?action=add&item_id=$item_id' class='add_to_cart'>Add to Cart</a> </div>";
											}
										else
										{
										echo " <div class='col col_14 product_gallery no_margin_right'>
										
										<a href='productdetail.php?item_id=$item_id'' >
										<img src='$image_path'  />
										</a>		
                <h3>'$image_brand'</h3>
                <p class='product_price'>'$image_price'</p> 
                <a href='add_to_cart.php?action=add&item_id=$item_id' class='add_to_cart'>Add to Cart</a> </div>";
										}
									
            
						
							
							

							
							
							$i++;
						}
}						
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Details</title>
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
         <!-- END of sidebar -->
        
        <div id="content">
		
		<?php
		$sql1="select * from items where itemid='$item_id1' ";
$result1=select($sql1);
$list1 = mysql_fetch_assoc($result1);
/*if($list=='false')
{
	$_SESSION['message']='<h2>Item not found</h2>';
	header("location:message.php");
}
else
{*/

	//while ($list) 
			//	{   
						$item_category1=$list1['category'];
						$item_brand1=$list1['brand'];
						$item_path1=$list1['path'];
						$item_price1=$list1['price'];
				//}
//}
//echo '$item_category $item_path $item_brand $item_price';
        	echo" <h2>Product Details</h2>
            <div class='col col_13'>
        	<a   href='#' ><img src='$item_path1' alt='Image 10' /></a>
            </div>
            <div class='col col_13 no_margin_right'>
                <table>
                    <tr>
                        <td height='30' width='160'>Price:</td>
                        <td>'$item_price1'</td>
                    </tr>
                    <tr>
                        <td height='30'>Availability:</td>
                        <td>In Stock</td>
                    </tr>
                    <tr>
                        <td height='30'>Category:</td>
                        <td>'$item_category1'</td>
                    </tr>
                    <tr>
                        <td height='30'>Manufacturer:</td>
                        <td>'$item_brand1'</td>
                    </tr>
                    <tr><td height='30'>Quantity</td><td><input type='text' value='1' style='width: 20px; text-align: right' /></td></tr>
                </table>
                <div class='cleaner h20'></div>
                <a href='add_to_cart.php?action=add&item_id=$item_id1' class='add_to_cart'>Add to Cart</a>
			</div> ";
			?>
            <div class='cleaner h30'></div>
           
            <!--<h5><strong>Product Description</strong></h5>
            <p></p>	
            -->
            <div class="cleaner h50"></div>
            
            <h4>Other Products</h4>
			
			<?php
			$item_id1=$_GET['item_id'];
			
			display(3);
			
			?>
			
			 <a href="index.php" class="more float_r ">View all</a>
			
           
            
            <div class="cleaner"></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php')
	?>
</div>

</body>
</html>