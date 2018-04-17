	<div id="smartshop_header">
    	<div id="site_title"><h1><a href="index.php">SmartShoppers</a></h1>
		
		</div>
        <div id="head">
		        <div id="smartshop_menu" class="ddsmoothmenu">
				<ul >
				<li><a href="index.php" class="selected">Home</a></li>
				<li><a href="contact.php" >Contact us</a></li>
			<?php
include('DbConnect.php');
if(@$_SESSION['user_status']!='logged_in')
{
?>

<li><a >Login</a>
			  <ul>
		      	 <form action='user_action.php?action=login' method='post'>
                    <li><a><input type='text'  name='username'  value ='Username' id='keyword' size='17' onfocus='clearText(this)'  class='txt_field' /></a></li>
                    
					<li><a><input type='Password'  name='Password' value='password'  size='17' id='keyword' onfocus='clearText(this)'  class='txt_field' /></a></li>
                    <li><a><input type='submit' value='Login' name='keyword' id='keyword' title='keyword'  /></a></li>
                   
			    </form>
			  </ul>
			</li> 			<li><a href="registration.php">Sign up</a></li> <?php ;
}
else
{?>
<li> <a> <?php
	//session_start();
	$username=$_SESSION['user_name'];
	echo "Welcome $username";
?> </a> 
<ul>
		      	 <li><a href='regedit.php' >Edit Profile</a></li>
                    
					<li><a href='user_action.php?action=logout'>Logout</a></li>
                                 
			    
			  </ul>
			</li><?php ;
}


?>

					<li><a href="about.php">About Us</a></li>
</ul> 
<div class="mismatch">
<?php
if(@$_SESSION['match']=='wrong')
echo " <h4>Incorrect detail <h4> "; ?>
</div>
</div>

 </div>       <div id="header_right">
             <div class="cleaner"></div>
                   <!-- <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>-->
            </div>
          <!-- END -->
    </div> <!-- END of header -->
<?php
	unset($_SESSION['match']);?>