<?php
include('DbConnect.php');
if(@$_SESSION['user_status']!='logged_in')
{
	$_SESSION['login']='wrong';
	//die("<h2>Please login to use this facility</h2>");
	header('location:registration.php');
}
include('CartFunctions.php');
$action=@$_GET['action'];
$item_id=@$_GET['item_id'];


	switch($action)
	{
		
		case 'add':
		$res=add_to_Cart($item_id);
		if($res=='true')
		{
			header('location:cart.php');
		}
		else
		{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot add data to shopping cart.</p>';
			header('location:message.php');
			die;
		}
		break;
		
		case 'remove':
		$res=remove_from_cart($item_id);
			if($res!=='false')
			{
				header('location:cart.php');
			}
			else
			{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot remove data from shopping cart.</p>';
			header('location:message.php');
			die;
			}
		break;
		
		case 'update':
		$res=update_cart();
			if($res=='true')
			{
			header('location:cart.php');
			}
			else
			{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot update shopping cart.</p>';
			header('location:message.php');
			die;
			}
		break;
		
		case 'checkout':
			$res=checkout();
		break;
		
		case 'empty':
			
		break;
	
		default:
			$_SESSION['message']="<h2>Wrong choice</h2><p>Please choose options made available on web page</p>";
			header('location:message.php');
		break;


	}




?>