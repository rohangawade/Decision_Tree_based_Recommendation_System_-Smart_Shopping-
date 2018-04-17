<!DOCTYPE HTML>
<html >
<head>
<title>Contact</title>
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
//include('sidebar/sidebar.php');
?>
  <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
    
		<div id="content">
        	<h2>Contact Information</h2>
			
            <div class="col col_13">
            <p></p>
            <div id="contact_form" >
               <form method="post" name="contact" action="#">
                    
                    <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                    <div class="cleaner h10"></div>
						
                    <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>
                        
  -                  <label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />
                    <div class="cleaner h10"></div>
        
                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner h10"></div>
 					
					<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
					<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
					
                </form>
            </div>
		</div>
        <div class="col col_13">
        	<h5>Location One</h5>
            <strong>Phone:</strong> 010-225-1800<br />
            <strong>Email:</strong> <a href="mailto:info@smartshoppers.com">info@smartshoppers.com</a> <br />
            <div class="cleaner divider"></div>
			
			<div class="cleaner h30"></div>
			
            <h5>Location Two</h5>
            <strong>Phone:</strong> 010-226-1200<br />
            <strong>Email:</strong> <a href="mailto:info@smartshoppers.com">info@smartshoppers.com</a> <br />           
        </div>
        
        <div class="cleaner h30"></div>
        
        <!--<iframe width="660" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=new+york+central+park&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=60.158465,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Central+Park,+New+York&amp;t=m&amp;ll=40.769606,-73.973372&amp;spn=0.014284,0.033023&amp;z=14&amp;output=embed"></iframe>
            -->
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