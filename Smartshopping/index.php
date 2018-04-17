

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
         <!-- END of sidebar -->
        
        <div id="content" name="a">
		<?php
// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM items";
$result = select($sql);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 9;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;
?>
						
					
					
					<?php
// get the info from the db 
$sql = "SELECT itemid, name, category, brand, color, price, path FROM items LIMIT $offset, $rowsperpage";
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
						}/*
				echo"</div>";		*/
						?>
												
					
					<?php
					if(($numrows % $rowsperpage)!=0)
					{
					echo " <div id='pageno' >";
					}
					else
					{
					echo " <div id='pageno' class='col col_14 product_gallery '>";
					}
   // echo $list['id'] . " : " . $list['number'] . "<br />";
 // end while

/******  build the pagination links ******/
// range of num links to show

$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1' ><img class='fontt' src='images/old_go_first.ico' width='30px' height='20px'/></a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' ><img class='fontt' src='images/old_go_prev.ico' width='30px' height='20px'/></a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a  href='{$_SERVER['PHP_SELF']}?currentpage=$x' >$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage' ><img class='fontt' src='images/old_go_next.ico' width='30px' height='20px'/></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages' ><img class='fontt' src='images/old_go_last.ico' width='30px' height='20px'/></a> ";
} // end if
/****** end build pagination links ******/
?>
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