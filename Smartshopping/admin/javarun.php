<!DOCTYPE HTML>
<html>
<script type="text/javascript">
/*function init()
{
	if(window.XMLHttpRequest)
		{//code for IE7+,firefox,chrome, safari
		xmlhttp=new XMLHttpRequest();
		return xmlhttp;
		}
	else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHttp");
		return xmlhttp
		}
}*/
function showtable()
{
	//xmlhttp=init();
	tname=document.getElementById('tablename').value;
	document.getElementById('tabname').value = tname;
}		

</script>
<?php
//echo exec('java -jar id3ss.jar');


$dbname = 'test';

if (!mysql_connect('localhost', 'root', '')) {
    echo 'Could not connect to mysql';
    exit;
}

$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);
$num_rows=mysql_num_rows($result);
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
echo "<form action='id3call.php' method='post'>";
echo " <select name='tablename' id='tablename' onchange='showtable()'>";
echo "<option >select table";
while ($row = mysql_fetch_row($result)) {
	echo "<option value=".$row[0].">"."Table: {$row[0]}\n<br>";
}
echo "</select>";
//echo "enter the name of the table on which you want suitablity";
?>
<input type="text" name="tabname" id="tabname"><br>
<input type="submit" value="id3"  />
</form>
