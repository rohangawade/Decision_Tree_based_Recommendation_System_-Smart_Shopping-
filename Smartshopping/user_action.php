<?php
include("DbConnect.php");
session_start();
	$user_name=@$_SESSION['user_name'];
	$user_id=@$_SESSION['user_id'];
	$action=@$_REQUEST['action'];
echo $action;
echo $action;

switch($action)
{
	case 'register':
		// Take the values in variables from $_REQUEST
			$fname=mysql_real_escape_string($_REQUEST['firstname']);
			$lname=mysql_real_escape_string($_REQUEST['lastname']);
			$email=mysql_real_escape_string($_REQUEST['email']);
			$day=mysql_real_escape_string($_REQUEST['day']);
			$month=mysql_real_escape_string($_REQUEST['month']);
			$year=mysql_real_escape_string($_REQUEST['year']);
			$gender=mysql_real_escape_string($_REQUEST['gender']);
			$contact=mysql_real_escape_string($_REQUEST['contact']);
			$addr=mysql_real_escape_string($_REQUEST['address']);
			$country=mysql_real_escape_string($_REQUEST['country']);
			$state=mysql_real_escape_String($_REQUEST['state']);
			$city=mysql_real_escape_string($_REQUEST['city']);
			$zip=mysql_real_escape_string($_REQUEST['zip']);
			$username=mysql_real_escape_string($_REQUEST['username']);
			$password=mysql_real_escape_string($_REQUEST['password']);
			$password = sha1($password);
			if($email!="" && $username!="" && $password!="")
			{
				// Check Whether Email or password already Exist
				$sql="SELECT * FROM user WHERE email='$email' || username='$username' || password='$password'";
				$row=select_unique($sql);
				if($row!='false') 
				{
					//user with entered email or password found
					$_SESSION['message']="<h2 class='error'>Email or Username or Password already Exist. Plase try again</h2>";
				header("location:message.php");
				}
				else
				{	
					// validate age !! Use proper date functions
					$check_date=checkdate($month,$day,$year); //check whether date is valid
					if($check_date!=true)
					{
						$_SESSION['message']="<h2 class='error'>Invalid date please enter valid date</h2>";
						header("location:message.php");
					}
					else
					{
						$mktime=mktime(0,0,0,$month,$day,$year);  
						//creates a timestamp of given month, day and yar. It is not proper date or time yet.
						//Format for mktime() function is fixed i.e. Month, Day and Year.
						
						$date_of_birth= date('Y-m-d',$mktime);  // crate date in user defined format.
						//mysql InnoDB engine by default accepts Year-month-day format;
						$current_year=date('Y');
						$current_month=date('m');
						$current_day=date('d');
						
						//calculate age
						
						$age=$current_year-$year;//get year
						if($current_month<=$month) 
							{	//birthdate in this year is yet to come
								if($current_day<$day) //birth day not reached yet
								 $age=$age-1;
							}
						// restrict registration if he/she is not 18 years old. Just as an example 
							if($age<18)
							{
								$_SESSION['message']="<h2 class='error'>You are not 18 years old yet.</h2>";
								header("location:message.php");
							}
							else
							{
								
								$sql="INSERT INTO user (first_name,last_name,email,date_of_birth,age,gender,contact_no,address,country,state,city,zip,username,password) VALUES ('$fname','$lname','$email','$date_of_birth','$age','$gender','$contact','$addr','$country','$state','$city','$zip','$username','$password')";
								$result=insert_or_update($sql);
								if($result==true)
								{		
										//REGISTRATION SUCCESSFULL
										//Now set the session varibles so that we can access them into further pages.
										//Fetch for a user_id of user just registered.
										//In short : make the user logged in on successful registration.	
										$res2=mysql_query("select * from user where username='$username' and password='$password'") or die(mysql_error());
										$row2=mysql_fetch_assoc($res2);
										
										$_SESSION['user_status']='logged_in';
										$_SESSION['user_id']=$row2['user_id'];
										$_SESSION['user_name']=$row2['username'];
										
										header("location:registration2.php");
								}
								else
								{
									$_SESSION['message']="Some error has occured. Please try again later";
									header("location:message.php");
								}
							}
					}	
				}
			}
			else
			{
				$_SESSION['message']="<h2 class='error'>You cannot leave email or password blank. Please fill it and try again.</h2>";
				header("location:message.php");
			}
	break;
	
	case 'login':
	
	$username=mysql_real_escape_string($_REQUEST['username']);
	echo"hello";
	$password=(mysql_real_escape_string($_REQUEST['Password']));
	$pass=sha1($password);	
	$_SESSION['message']=$pass;
	$sql="select * from user where username='$username' and password='$pass'";
	$row=select_unique($sql);

	if($row!=='false')
	{	session_start();
		$_SESSION['user_status']='logged_in';
		$_SESSION['user_id']=$row['user_id'];
		$_SESSION['user_name']=$row['username'];
		$_SESSION['match']='correct';
		header("location:index.php");
	}
	else
	{
		$_SESSION['match']='wrong';
		header("location:index.php");
		
		
	}
	
	break;
	
	case 'logout':
	if($_SESSION['user_status']=='logged_in')
	{
		unset($_SESSION['user_status']);
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
	
		header("location:index.php");
	}
	break;
	
	
	case 'update':
		// Take the values in variables from $_REQUEST
			$fname=mysql_real_escape_string($_REQUEST['firstname']);
			$lname=mysql_real_escape_string($_REQUEST['lastname']);
			
			$day=mysql_real_escape_string($_REQUEST['day']);
			$month=mysql_real_escape_string($_REQUEST['month']);
			$year=mysql_real_escape_string($_REQUEST['year']);
			
			$contact=mysql_real_escape_string($_REQUEST['contact']);
			$addr=mysql_real_escape_string($_REQUEST['address']);
			$country=mysql_real_escape_string($_REQUEST['country']);
			$state=mysql_real_escape_String($_REQUEST['state']);
			$city=mysql_real_escape_string($_REQUEST['city']);
			$zip=mysql_real_escape_string($_REQUEST['zip']);
				$mktime=mktime(0,0,0,$month,$day,$year);  
						//creates a timestamp of given month, day and yar. It is not proper date or time yet.
						//Format for mktime() function is fixed i.e. Month, Day and Year.
						
						$date_of_birth= date('Y-m-d',$mktime);
			//echo "$fname $lname $contact $addr $country $city $state $date_of_birth ";
			
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
	
								
		
								$sql="UPDATE user SET first_name= '$fname',last_name='$lname',date_of_birth='$date_of_birth',contact_no='$contact',address='$addr',country='$country',state='$state',city='$city',zip='$zip' WHERE username='$user_name'";
								$result=insert_or_update($sql);
								if($result==true)
								{		
										//REGISTRATION SUCCESSFULL
										//Now set the session varibles so that we can access them into further pages.
										//Fetch for a user_id of user just registered.
										//In short : make the user logged in on successful registration.	
										
										
										header("location:index.php");
								}
								else
								{
									die("Some error has occured. Please try again later");
								}
							
			
	break;
	default:
	echo "<h2>Wrong Choice</h2>";
	break;
}



?>