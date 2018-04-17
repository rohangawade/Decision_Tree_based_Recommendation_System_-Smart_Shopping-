<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FAQs</title>
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
    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
		<?php
		include('sidebar/sidebar.php');
		?>
        <div id="content" class="faq">
        	<h2>FAQs</h2>
            <h3>How will I  know you received my order?</h3>
            <p>You'll  receive an email confirming that your order has been received. If you do not  receive an email confirmation, please check to see if the email address on your  order was entered correctly.</p>
            
            <h3>When will my order be shipped?</h3>
            <p>Please read our shipping policy. Click <a href="#">here</a></p>
            
            <h3>What payment methods do you accept?</h3>
            <p>PayPal and Cash On Delivery(COD)</p>
            
            <h3>Can I return or exchange my purchase if I don't like it?</h3>
            <p>Please read our exchange policy. Click <a href="#">here</a></p>
            
            <h3>How do I know if online ordering is secure?</h3>
            <p>We use Secure Sockets Layer (SSL) to encrypt your  credit card number, name and address so only Glory Silver is able to decode  your information. SSL is the industry standard method for computers to  communicate securely without risk of data interception, manipulation or  recipient impersonation. To be sure your connection is secure; when you are in  the Shopping Cart, look at the lower corner of your browser window. If you see  an unbroken key or closed lock, the SSL is active and your information is  secure. Since most of the customers are still uncomfortable with providing your  credit card online, we use PayPal and COD services so they don't need to  give out credit card information.</p>
           
            <h3>What is your privacy policy?</h3>
            <p>We respects your privacy and wants to ensure that  you understand what information we need to complete your order, and what  information you can choose to share with us and with our marketing partners.  For complete information on our privacy policy, please visit our <a href="#">Privacy Policy</a>  page.</p>
            
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    <?php
	include('footer/footer.php');
	?>
	</div>
</div>

</body>
</html>