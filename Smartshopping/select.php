<?php
include("connection.php");

$q=$_REQUEST['q'];
$q1=$_REQUEST['q1'];

if($q1 == 1)
{
	echo "||";
	$x = 	$obj->dropdown1("state","sta_id","sta_name","con_id='$q' order by sta_name");
}

if($q1 == 2)
{
	echo "||";
	$x = 	$obj->dropdown1("city","cit_id","cit_name","sta_id='$q' order by cit_name");
}

print_r($x);
?>