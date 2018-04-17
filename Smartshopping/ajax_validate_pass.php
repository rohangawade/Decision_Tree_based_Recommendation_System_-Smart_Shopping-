<?php
include("DbConnect.php");
$password=@$_REQUEST['pass'];
  if($password == '') 
  {
	echo "Please enter a password";
	die;
  }


  if(strlen($password) < 6) {
    echo "Password length must be greater than 6";
	die;
  }

$sql="select password from user WHERE password='$password'";
$res=select($sql);
if($res!='false')
{
	echo "password already exist. please choose another.";
	die;	
}
else
	{
	echo "<span style='color:green;'><b>OK</b></span>";
	}
?>