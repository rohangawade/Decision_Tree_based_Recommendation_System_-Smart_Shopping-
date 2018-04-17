<?php
include("../DbConnect.php");
$action=$_REQUEST['action'];

switch($action)
{
	case 'login':
		$name=$_REQUEST['admin_name'];
		$password=$_REQUEST['password'];
	//	$sql="select * from admin where admin_name='$name' and password='$password'";
			$sql="select * from admin where admin_name='$name'";
	
		$res=select_unique($sql);
		if($res!=='false')
		{
			@session_start();
			$_SESSION['admin_status']='logged_in';
			$_SESSION['admin_name']=$name;
			header("location:additems.php");
		}
		else
		{
			die("<h3>User and password don't match.</h3><p>Please enter valid information</p>");
		}
	break;
	
	case 'logout':
		if(@$_SESSION['admin_status']=='logged_in')
		{
			unset($_SESSION['admin_status']);
			unset($_SESSION['admin_name']);
		}
		header("location:index.php");
	break;
	case 'editordelete':
	{
		$brand1=$_REQUEST['brand1'];
		$ssql = "SELECT COUNT(*) FROM items where brand='brand1' ";
		$result = select($sql);
		$r = mysql_fetch_row($result);
		$numrows = $r[0];
	}
	case 'additems':
	{
		$name=$_REQUEST['name'];
		$category=$_REQUEST['category'];
		$brand=$_REQUEST['brand'];
		$color=$_REQUEST['color'];
		$gender=$_REQUEST['gender'];
		$price=$_REQUEST['price'];
		$quantity=$_REQUEST['quantity'];
		$imagepath="images/".$gender."/".$category."/";
	$skincolor='5978420';
			include('itemstrydecisiontree.php');
		
		
		if($_FILES["image"]["error"]>0)
		{
		die( "Error: ".$_FILES["image"]["error"]."< br />" );
		}
		else
		{

		$image_name=$_FILES["image"]["name"];
		$image_type=$_FILES["image"]["type"];
		$image_size=($_FILES["image"]["size"] / 1024 );
		$temp_path=$_FILES["image"]["tmp_name"];

		}

		if(file_exists($imagepath.$_FILES["image"]["name"]))
		{
		die( $_FILES["image"]["name"] ."already exist. ");
		}
		else
		{
		//rename the file
		$_FILES["image"]["name"]=$brand.'_'.$category.'_'.$_FILES["image"]["name"];
		$_FILES["image"]["name"]=str_replace(" ","_",$_FILES["image"]["name"]);
		$res=move_uploaded_file($_FILES["image"]["tmp_name"], "../".$imagepath.$_FILES["image"]["name"]) ;
		$path=$imagepath.$_FILES["image"]["name"];
		}

		if($res=true)
		{

		$con=DbConnect() or die("cannot connect".error());

		$sql="INSERT INTO items(name,category,color,gender,price,quantity,brand,path) VALUES('$name','$category','$color','$gender','$price','$quantity','$brand','$path')";
		mysql_query($sql,$con) or die("cannot perform query"."<br />".mysql_error());
		}
		mysql_close($con);
		session_start();
		$_SESSION['message']="<h1>".$suitability."</h1>";
		header("location:message.php");
		//header("location:successfullyadditem.php");

			

	}
	break;
	
	
	default:
	die("Wrong choice entered.");
	break;

}

?>