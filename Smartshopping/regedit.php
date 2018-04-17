
<!DOCTYPE HTML>
<?php
include("connection.php");
session_start();
$username=$_SESSION['user_name'];
//error_reporting(0);
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
	?>	
	<div id="sidebar">
<a href="#"><img src ="images/menul1.gif" width="220px" height="90px"/></a>
<a href="registration2.php"><img src ="images/menud2.gif" width="220px" height="90px"/></a>
<?php
$upload_dir = "upload_pic"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$large_image_name = $username."resized_pic.jpg"; 
$large_image_location = $upload_path.$large_image_name;

?><img id="pad" src="<?php echo $large_image_location;?>" width="200" height="220" alt="Profile Picture" />

	</div>
        <div id="content">
		<?php
		//session_start();
		//include('DbFunctions.php');
		
		$sql="select * from user where username='$username'";
	$result=select($sql);

	if($row = mysql_fetch_assoc($result))
	{	

	$fname=$row['first_name'];
	$lname=$row['last_name'];
	$sex=$row['gender'];
	$cno=$row['contact_no'];
	$addr=$row['address'];
	$country=$row['country'];
								$sql="select con_id from country where con_id='$country'";
	$row1=select($sql);

	if($row1!=='false')
	{} else
	{
	$sql="select con_id from country where con_name='$country'";
	$result1=select($sql);
	if($row1 = mysql_fetch_assoc($result1))
	{
	$country=$row1['con_id'];
	}
	}
	$zip=$row['zip'];
	$state=$row['state'];
	$sql="select * from state where sta_id='$state'";
	$row1=select_unique($sql);

	if($row1!=='false')
	{} else
	{
	$sql="select sta_id from state where sta_name='$state'";
	$result1=select($sql);
	if($row1 = mysql_fetch_assoc($result1))
	{
	$state=$row1['sta_id'];
	}
	}
	$city=$row['city'];
							$sql="select cit_id from city where cit_id='$city' and sta_id='$state'";
	$row1=select_unique($sql);

	if($row1!=='false')
	{} else
	{
	$sql="select cit_id from city where cit_name='$city' and sta_id='$state'";
	$result1=select($sql);
	if($row1 = mysql_fetch_assoc($result1))
	{
	$city=$row1['cit_id'];
	}
	}
	$date=$row['date_of_birth'];
	}
	$list = explode('-', $date);

	$day=$list[2];
	$month=$list[1];
	$year=$list[0];
	$sql="select con_name from country where con_id='$country'";
	$result=select($sql);
	if($row = mysql_fetch_assoc($result))
	{
	$count=$row['con_name'];
	}
	$sql="select sta_name from state where sta_id='$state'";
	$result=select($sql);
	if($row = mysql_fetch_assoc($result))
	{
	$sta=$row['sta_name'];
	}
	$sql="select cit_name from city where cit_id='$city' and sta_id='$state'";
	$result=select($sql);
	if($row = mysql_fetch_assoc($result))
	{
	$cit=$row['cit_name'];
	}
		?>
       		<fieldset>
			<legend ><h3>Personalia</h3></legend>
		
		<form method="post"  action="user_action.php?action=update" name="user_register">	
		<table id="regtable" >
	  
		<tr><td>First Name<td><input type="text" size="26" required name="firstname" value= "<?php echo $fname; ?>" /> </tr >
		<tr><td>Last Name<td><input type="text" size="26" required name="lastname" value="<?php echo $lname; ?>"/></tr >
		
		<tr><td>Date of birth<td><input  type="number" required value="<?php echo $day; ?>" size="5" name="day"/>
								<input type="number" size="5" required value="<?php echo $month; ?>" name="month"/>
								<input type="number" size="5" required value="<?php echo $year; ?>" name="year"/> <br />
							<!--<input  type="text" placeholder="dd-mm-yyyy" size="10" name="birthdate"/>-->
		
		
		<tr><td>Contact no <td><input type="text" size="26" required name="contact" value="<?php echo $cno; ?>"/> </tr >
		<tr><td>Address: </td><td><input required type="textarea" size="50"; name="address" value="<?php echo $addr; ?>"></td></tr>

				<tr><td>Country you live : </td><td><select required name="country" onchange=show_state(this.value,1) ><option selected ><?php echo"$count" ; ?></option>
				<?php $obj->dropdown("country","con_id","con_name","1 order by con_name"); ?>
				</select></td></tr>
				<tr><td>State / Province :  </td><td>
				<select id='selstate' name="state" onchange=show_city(this.value,2)><option selected="selected"><?php echo"$sta" ; ?></option>
				</select>
				</td></tr>
				<tr><td>City : </td><td><select id='selcity' name="city"><option selected="selected" ><?php echo"$cit" ; ?></option>
				</select></td></tr>
		
				<tr><td>Zip<td><input type="text" size="26" required name="zip" value="<?php echo $zip; ?>"/> </tr >
			<tr><td>
		<td><input type="submit" class="submit_btn" value="UPDATE" name="submit" />
			</table>
			</form>
		</fieldset>

	  


  </form>             
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    <?php
	include('footer/footer.php');
	?>
	</div>

