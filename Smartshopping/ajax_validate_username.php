<?php
include("DbConnect.php");
$username=@$_REQUEST['username'];
  if($username == '') 
  {
	echo "Please enter a username";
	die;
  }


  if(strlen($username) < 3) {
    echo "username length must be greater than 3";
	die;
  }

$sql="select username from user WHERE username='$username'";
$res=select($sql);
if($res!='false')
{
	echo "username already exist. please choose another.";
	die;	
}
else
	{
	echo "<span style='color:green;'><b>OK</b></span>";
	}
?>