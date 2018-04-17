<?php
 session_start();
//get the q parameter from URL
$q=$_GET["q"];
$key=@$_SESSION['key'];
$a=strcmp($q,$key) ;
if($a!='false')
	{
	$hint="InCorrect";
	echo $hint;
	}
	else
	{
	$hint="Correct";
	echo "<span style='color:green;'><b>OK</b></span>";
	
	}
?>