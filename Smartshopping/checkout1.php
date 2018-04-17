<!DOCTYPE HTML>
<html>
<head>
<title>SmartShoppers - Checkout</title>
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
        <div id="content">
       		<h2>Checkout</h2>
            <h5><strong>BILLING DETAILS</strong></h5>
            <div class="col col_13 checkout">
				Enter your full name as it is on the credit card:                				<input type="text"  style="width:300px;"  />
                Address:
                <input type="text"  style="width:300px;"  />
                City:
                <input type="text"  style="width:300px;"  />
                Country:
                <input type="text"  style="width:300px;"  />
            </div>
            
            <div class="col col_13 checkout">
            	E-MAIL
				<input type="text"  style="width:300px;"  />
                PHONE<br />
				<span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>
                <input type="text"  style="width:300px;"  />
            </div>
            
            <div class="cleaner h50"></div>
            <h3>Shopping Cart</h3>
            <h4>TOTAL: <strong>Rs.</strong></h4>
			<p><input type="checkbox" />I have accepted the <a href="#">Terms of Use</a>.</p>
            <table style="border:1px solid #CCCCCC;" width="100%">
                <tr>
                    <td height="80px"> <img src="images/paypal.gif" alt="paypal" /></td>
                    <td width="400px;" style="padding: 0px 20px;">Recommended if you have a PayPal account. Fastest delivery time.
                    </td>
                    <td><a href="#" class="more">PAYPAL</a></td>
                </tr>
                <tr>
                    <td  height="80px"><img src="images/cashondel.jpg" alt="paypal" width="120px" height="60px"ss/>
                    </td>
                    <td  width="400px;" style="padding: 0px 20px;">Cash On Delivery (COD) is a method of making payment where our customers can buy products online and then get the flexibility of making the payments at the time of actual delivery. With the introduction of the option, customers can make payment of their purchase to the delivery person at the time of delivery.
                    </td>
                    <td><a href="#" class="more">Cash On Delivery</a></td>
                </tr>
            </table>
               
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
	</div>

</body>
</html>