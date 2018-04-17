<?php
function add_to_cart($item_id)
{	
	$user_id=@$_SESSION['user_id'];
	$row=select_unique("select * from shopping_cart where itemid='$item_id' and user_id='$user_id'");

	if($row!=='false')
	{		
		$_SESSION['message']="<h3>You already have this item in your cart.</h3><p>Please try out with different one.</p>";
		header("location:message.php");
		die;
	}
	else
	{
		$sql="select * from items where itemid='$item_id'";
		$row=select_unique($sql);
		$price=$row['price'];
		$sql="INSERT INTO shopping_cart(itemid,user_id,price,total_price,last_update) values($item_id,$user_id,$price,$price,now())";
		$res=insert_or_update($sql);
		return $res;
	}
}
function remove_from_cart($item_id)
{	$user_id=@$_SESSION['user_id'];
	$sql="select * from items where itemid=$item_id";
	$row=select_unique($sql);
	if($row!=='false')
	{
		$remove_sql="delete from shopping_cart where itemid='$item_id' and user_id='$user_id'";
		$row2=insert_or_update($remove_sql);
		return $row2;
	}
	else
	{
		return 'false';
	}
}

function update_cart()
{	$user_id=@$_SESSION['user_id'];
	$update_array=$_REQUEST['q'];
	foreach($update_array as $item_id=>$quantity)
	{	
		$check_available_quantity="select quantity from items where itemid='$item_id'";
		$row=select_unique($check_available_quantity);
		if($row!=='false')
		{
			if($row['quantity']<$quantity)
			{
				die("<h3>Sorry, We do not have sufficient quantity available.</h3><p>Please try out with different items.</p>");
			}
		}
		else
		{
		}
		$sql="update shopping_cart set quantity='$quantity' where (itemid='$item_id' and user_id='$user_id')";
		$res=insert_or_update($sql);
		if($res!=true)
		{
			return 'false';
		}
		else
		{
		$sql="update shopping_cart set total_price=quantity*price where(itemid='$item_id' and user_id='$user_id')";
			$res=insert_or_update($sql);
			if($res!=true)
			{
				return 'false';
			}
		}
	}
	return 'true';
	
}
function write_cart_status()
{	
	if(@$_SESSION['user_status']=='logged_in')
		{$user_id=@$_SESSION['user_id'];
		$sql="select * from shopping_cart where user_id='$user_id'";
		$res=select($sql);

		if($res!=='false')
		{	$count=0;
			while($row=mysql_fetch_assoc($res))
			{
			$count+=$row['quantity'];
			}
			echo "<p style='font-family:verdana;font-size:13px;text-align:center'><b>You have ".$count." items in your shopping cart.</b></p>";
			echo"<a href='cart.php' style='font-family:verdana;font-size:13px;text-align:center;color:firebrick'><b>See your shopping cart</b></a>";
		}
		else
		{
		echo "<p style='font-family:verdana;font-size:13px;text-align:center'><b>Your shopping cart is empty.</b></p>";
		}
	}		
}

function checkout()
{
$user_id=@$_SESSION['user_id'];
//check whether any field is left blank;
foreach($_REQUEST as $key=>$value)
{
	if($value=="")
	{
	die("<h2>You cannot leave any field empty</h2><p>You might have missed out some fields in the form.<br />Please fill the form correctly and try again</p>");
	}
}
	//control comes here means all fields are obviously filled.
	//get data
	
	$shipping_fname=mysql_real_escape_string($_REQUEST['shipping_fname']);
	$shipping_lname=mysql_real_escape_string($_REQUEST['shipping_lname']);
	$shipping_address=mysql_real_escape_string($_REQUEST['shipping_address']);
	$shipping_contact=mysql_real_escape_string($_REQUEST['shipping_contact']);
	$shipping_state=mysql_real_escape_string($_REQUEST['shipping_state']);
	$shipping_city=mysql_real_escape_string($_REQUEST['shipping_city']);
	$shipping_zip=mysql_real_escape_string($_REQUEST['shipping_zip']);
	
	//insert user shipping details into database
	$sql="insert into shipping_user_info (user_id,shipping_fname,shipping_lname,shipping_address,shipping_contact,shipping_state,shipping_city,shipping_zip)
	VALUES('$user_id','$shipping_fname','$shipping_lname','$shipping_address','$shipping_contact','$shipping_state','$shipping_city','$shipping_zip')";
	$res=insert_or_update($sql);
	if($res==true)
	{	// Get the shipping_id of the record just inserted
	
		$sql2="select shipping_id from shipping_user_info where user_id='$user_id' and shipping_fname='$shipping_fname'";
		$row=select_unique($sql2);
		$shipping_id=$row['shipping_id'];
		
		//Move books from shopping cart into shipping table.
		$sql3="select * from shopping_cart where user_id='$user_id'";
		$res=select($sql3);
		if($res!=='false')
		{
			while($row2=mysql_fetch_assoc($res))
			{	$cart_id=$row['cart_id'];
				$book_id=$row['itemid'];
				$quantity=$row['quantity'];
				$total_price=$row['total_price'];
				
				//insert record of this book into shipping_book_info and then remove from shopping_cart
				$sql4="insert into shipping_items_info (itemid,quantity,total_price,shipping_id) VALUES ('$book_id','$quantity','$total_price','$shipping_id')";
				$res4=insert_or_update($sql4);
				if($res4!=='false')
				{
					//remove those books from shopping cart
					$sql="delete from shopping_cart where user_id='$user_id'";
					$res=insert_or_update($sql);
					if($res==true)
					{	
						//information have successfully stored into database.
						//display thank you message.
						$_SESSION['message']="<h2>Thank you for shopping at our e-commerce portal.</h2><h3>Visit again</h3>
						<p>You will recieve your books within 2days. If you didn't Go to Hell.</p>";
					}
					else
					{
						$_SESSION['message']="Cannot delete items from shopping cart";
					}
				
				}
				else
				{
				$_SESSION['message']="<h2>Error during inserting items shipping information.</h2>";
				}
			}
		}
	}
	else
	{
	$_SESSION['message']="<h2>Error during inserting user shipping information.</h2>";
	}
	
	header('location:message.php');
	


}


?>