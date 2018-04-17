<?php
	$dbname='test';
	$tabname=$_REQUEST["tabname"];
	echo $tabname."<br>";
//$dbname='test';
	echo 'java id3ssdbtry '.$dbname." ".$tabname ;
exec('javac id3ssdbtry.java');
	exec('java id3ssdbtry '.$dbname." ".$tabname );

	
	
?>