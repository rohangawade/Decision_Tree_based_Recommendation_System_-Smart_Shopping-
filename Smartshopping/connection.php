<?php
class connect
	{
		public $conn="";
		function __construct()
		{
			$this->conn = new mysqli("localhost","root","","smartshopping");
		}

		function select($table,$field,$condition,$dim)
		{
				if($condition)
				{
					$sql = "Select ".$field." from ".$table." where ".$condition;
				}
				else
				{
					$sql = "Select ".$field." from ".$table;
				}
				$result = $this->conn->query($sql);
				if ($result->num_rows == 0)
			{
			//	echo "No Matching Data Found";
			}
			else if($dim==1)
			{
			while($row =$result->fetch_array(MYSQL_NUM))
				{
					$data[] = $row;
				}
			}
			else 
			{
				while($row =$result->fetch_array(MYSQL_ASSOC))
				{
					$data[] = $row;
				}
			}
			return $data;
		}

		function dropdown($table,$field_id,$field_name,$condition)
		{
			$field = $field_id.",".$field_name;
			$result= $this -> select ($table,$field,$condition,1);
			if ($result)
			foreach($result as $val)
			{
				echo "<option value='".$val[0]."'>".$val[1]."</option>";
			}
		}

		function dropdown1($table,$field_id,$field_name,$condition)
		{
			$field = $field_id.",".$field_name;
			$result= $this -> select ($table,$field,$condition,1);
			if ($result)
			foreach($result as $val)
			{
				$str.=$val[0]."#".$val[1]."||";
			}
			return $str;
		}
	}

$obj= new connect();
?>