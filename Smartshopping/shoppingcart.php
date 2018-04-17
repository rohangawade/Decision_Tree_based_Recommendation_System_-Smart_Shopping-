<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
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

<script language="javascript" type="text/javascript">
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
		
        	<table width="700px" cellspacing="0" cellpadding="5">
                   	  <tr bgcolor="#CCCCCC">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Description </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                            
                      </tr>
                    	<tr>
                        	<td><img src="images/product/01.jpg" alt="image 01" /></td> 
                        	<td>Lee Cooper</td> 
                            <td align="center"><input type="text" value="1" style="width: 20px; text-align: right" /> </td>
                            <td align="right">Rs 799 </td> 
                            <td align="right">Rs 799 </td>
                            <td align="center"> <a href="#"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
						</tr>
                        <tr>
                        	<td><img src="images/product/02.jpg" alt="image 02" /> </td>
                            <td>Spykar</td> 
                       	  	<td align="center"><input type="text" value="1" style="width: 20px; text-align: right" />  </td>
                            <td align="right">Rs 999  </td>
                            <td align="right">Rs 999 </td>
                            <td align="center"> <a href="#"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a>  </td>
						</tr>
                        <tr>
                        	<td colspan="3" align="right"  height="40px">Have you modified your basket? Please click here to <a href="shoppingcart	"><strong>Update</strong></a>&nbsp;&nbsp;</td>
                            <td align="right" style="background:#ccc; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ccc; font-weight:bold"></td>
                            <td style="background:#ccc; font-weight:bold"> </td>
						</tr>
					</table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                        <div class="checkout"><a href="checkout.php" class="more">Proceed to Checkout</a></div>
                        <div class="cleaner h20"></div>
                        <div class="continueshopping"><a href="javascript:history.back()" class="more">Continue Shopping</a></div>
                    	
                    </div>
            
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
	
   
</div>

</body>
</html>