<?php

function select($sql)
{	
	$con=DbConnect();
	$result=mysql_query($sql,$con) or die('Error on select query '.mysql_error());
	if(mysql_num_rows($result)>0)
	{
		return $result;
	}
	else
	{
	return 'false';
	}


}

function select_unique($sql)
{	
	$con=DbConnect();
	$result=mysql_query($sql,$con) or die('Error on select query '.mysql_error());
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_assoc($result);
		return $row;
	}
	else
	{
	return 'false';
	}
}

function insert_or_update($sql)
{
	$con=DbConnect();
	$result=mysql_query($sql,$con) or die('Error on insert_or_update query '.mysql_error());
	return $result;
}


?>