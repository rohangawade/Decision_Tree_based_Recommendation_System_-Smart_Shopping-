<?php

@session_start();
$message=$_SESSION['message'];
if(!isset($_SESSION['message']))
{
$_SESSION['message']="<h2>You are not authorized to see this page.</h2>";
}
?>
<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Shopping</title>
</head>

<body id="home">

<div id="smartshop_wrapper">
 
     <!-- end of smartshop_menu -->
    
    <div id="smartshop_middle">
    	
    </div> <!-- END of middle -->
    
   
          <!-- END of sidebar -->
        
        <div id="content" name="a">
			
			<?php echo $message; ?><br />
			
			<a href='index.php'>Go to E-commerce portal</a>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> 
    <!-- END of footer -->   
   
</div>

</body>
</html>