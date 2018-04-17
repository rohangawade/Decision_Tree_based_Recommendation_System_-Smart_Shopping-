
<!DOCTYPE HTML>
<?php
include("connection.php");
?>
<?php
session_start();
if(@$_SESSION['user_status']=='logged_in')
{
header('location:index.php');
die;
}


?>
<html>
<head>
<title>SmartShoppers - Registration</title>
<style>
div #captcha
{
color:red;
float:right;
align center;
}
</style>

<link href="css/smartshop_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<script type="text/javascript" src="js/select_state.js"></script>
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

function init()
		{
			if (window.XMLHttpRequest)
			{	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				return xmlhttp;
			}
			else
			{	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				return xmlhttp;
			}
		}
		
function showHint(str)
{
xmlhttp=init();
if (str.length==0)
  { 
  document.getElementById("captcha").innerHTML="";
  return;
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("captcha").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","validatecaptcha.php?q="+str,true);
xmlhttp.send();
}

		function check_pass()
		{	
			xmlhttp=init();
			pass=document.getElementById('password').value;
			xmlhttp.onreadystatechange=function()
			{	
				if(xmlhttp.readyState==4)
				{	
					document.getElementById('pass_check').innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","ajax_validate_pass.php?pass="+pass,true);
			xmlhttp.send();
		}
	
		function check_username()
		{	
			xmlhttp=init();
			username=document.getElementById('username').value;
			xmlhttp.onreadystatechange=function()
			{	
				if(xmlhttp.readyState==4)
				{	
					document.getElementById('user_check').innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","ajax_validate_username.php?username="+username,true);
			xmlhttp.send();
		}
	
</script>

</head>

<body id="subpage">

<div id="smartshop_wrapper">
<?php
include('header/Header.php');
?>    

<div class="register" id="smartshop_menu">
   <marquee> <h1>Register To Be SMART</h1></marquee></div>

    <div class="cleaner h20"></div>
    <div id="smartshop_main_top"></div>
    <div id="smartshop_main">
    	
    <?php
		//include('sidebar/sidebar.php');
	
	if(@$_SESSION['login']=='wrong') {
	echo"<h2>Please login to use this facility !!!</h2>";
	}?>
	<div id="sidebar">
<fieldset>
	<legend >
	<h3> LOGIN</h3></legend>
		      	 <form action='user_action.php?action=login' method='post'>
                   <table>
				   <tr><th>UserName
				   <tr><td><input type='text'  name='username'  value ='Username' id='keyword' size='17' onfocus='clearText(this)'  class='txt_field' />
				   <tr> <th> Password
                    <tr><td><input type='Password'  name='Password' value='password'  size='17' id='keyword' onfocus='clearText(this)'  class='txt_field' />
                    <tr><td><a><input type='submit' value='Login' name='keyword' id='keyword' title='keyword'  /></a>
                   </table>
			    </form>
			  </ul>
</fieldset>
	</div>
        <div id="content">
       		<fieldset>
			<legend ><h3>Personalia</h3></legend>
		
		<form method="post"  action="user_action.php?action=register" name="user_register">	
		<table id="regtable" >
	  
		<tr><td>First Name<td><input type="text" size="26" name="firstname" placeholder="FirstName" required /> </tr >
		<tr><td>Last Name<td><input type="text" size="26" name="lastname" placeholder="LastName" required /></tr >
		<tr><td>Email<td><input type="email" size="26" name="email" required /> </tr >
				
		<tr><td>Date of birth<td><input  type="number" placeholder="Day" size="5" name="day" required />
								<input type="number" size="5" placeholder="Month" name="month" required />
								<input type="number" size="5" placeholder="Year" name="year" required /> <br />
							<!--<input  type="text" placeholder="dd-mm-yyyy" size="10" name="birthdate"/>-->
		
		<tr><td>Gender<td><select name="gender"><option>Select Gender</option>
		<option value="male">Male</option><option value="female">Female</option></select></tr >
		<tr><td>Contact no <td><input type="text" size="26" name="contact" required /> </tr >
		<tr><td>Address: </td><td><input type="textarea" size="50"; name="address" placeholder="Address" required ></td></tr>

				<tr><td>Country you live : </td><td><select name="country" onchange=show_state(this.value,1)><option>Select Country</option>
				<?php $obj->dropdown("country","con_id","con_name","1 order by con_name"); ?>
				</select></td></tr>
				<tr><td>State / Province :  </td><td>
				<select id='selstate' name="state" onchange=show_city(this.value,2)><option>Select State</option>
				</select>
				</td></tr>
				<tr><td>City : </td><td><select id='selcity' name="city"><option>Select City</option>
				</select></td></tr>
		
				<tr><td>Zip<td><input type="text" size="26" name="zip" required /> </tr >
			</table>
		</fieldset>
<fieldset>			
		<legend><h5>&nbsp;&nbsp;Please enter your username and desired password to sign up.</h5>	</legend>
	    <table>
		<tr><td><label for="username">Username:</label>
		<td><input type="text" id="username" size="26" name="username" onblur="check_username()" required /><span id="user_check" style="color:red;margin-left:20px;"></span></tr >
		<tr><td><label for="password">Password:</label>
		<td><input type="password" size="26" name="password" required id="password" onblur="check_pass()"/> <span id="pass_check" style="color:red;margin-left:20px;"></span>
							
		<tr><td><label for="password2">ReType Password :</label>
		<td><input type="password" id="password2" size="26" required name="password2" /></tr >
		<tr><td rowspan="2">Please enter the string<br />shown in the image in the<br /> text box.</td><td><img src="php_captcha.php">
		<tr><td><input name="number" size="26" type="text" id="number" required onblur="showHint(this.value)" > <div id="captcha"></div>
		<tr><td><input type="reset" class="submit_btn" name="reset" id="reset" value="Reset" />
		<td><input type="submit" class="submit_btn" value="Sign Up" name="submit" />
		
</table>
</form>
</fieldset>
               
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	unset($_SESSION['login']);
	?>
	</div>

</body>
</html>