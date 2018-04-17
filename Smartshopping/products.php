<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
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
</script>

</head>

<body id="subpage">

<div id="smartshop_wrapper">
<?php
include('header/Header.php');
include('menu/menu.php');
?>    
    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
    	<?php
		include('slider/slider.php');
		include('sidebar/sidebar.php');
		?>
        
        <div id="content">
        	<h2>Spykar</h2>
        	<div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/01.jpg" alt="Product 01" /></a>
                <h3>Jeans</h3>
                <p class="product_price">Rs 799</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/02.jpg" alt="Product 02" /></a>
                <h3>Jeans</h3>
                <p class="product_price">Rs 1099</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery no_margin_right">
            	<a href="productdetail.php"><img src="images/product/03.jpg" alt="Product 03" /></a>
                <h3>T-Shirts</h3>
                <p class="product_price">Rs 899</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>
            <a href="#" class="more float_r">View all</a>
			<div class="cleaner h50"></div>
            
            <h2>Lee Cooper</h2>
            <div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/04.jpg" alt="Product 04" /></a>
                <h3>T-Shirt</h3>
                <p class="product_price">Rs 1099</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/05.jpg" alt="Product 05" /></a>
                <h3>Shirt</h3>
                <p class="product_price">Rs 699</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery no_margin_right">
            	<a href="productdetail.php"><img src="images/product/06.jpg" alt="Product 06" /></a>
                <h3>Shirt</h3>
                <p class="product_price">Rs 799</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>     	
            <a href="#" class="more float_r">View all</a>
            <div class="cleaner h50"></div>
            
            <h2>Levi's</h2>
            <div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/07.jpg" alt="Product 07" /></a>
                <h3>T-Shirt</h3>
                <p class="product_price">Rs 799</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery">
            	<a href="productdetail.php"><img src="images/product/08.jpg" alt="Product 08" /></a>
                <h3>Shirt</h3>
                <p class="product_price">Rs 1199</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>        	
            <div class="col col_14 product_gallery no_margin_right">
            	<a href="productdetail.php"><img src="images/product/09.jpg" alt="Product 09" /></a>
                <h3>Nam vehicula</h3>
                <p class="product_price">Rs 699</p>
                <a href="shoppingcart.php" class="add_to_cart">Add to Cart</a>
            </div>
            <a href="#" class="more float_r">View all</a>
            <div class="cleaner"></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
</div>

</body>
</html>