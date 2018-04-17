<?php
session_start();

$RandomStr = md5(microtime());

$ResultStr = substr($RandomStr,0,5);

$NewImage =imagecreatefromjpeg("images/captcha.jpg");

$LineColor = imagecolorallocate($NewImage,150,19,255);
$TextColor = imagecolorallocate($NewImage, 0,0,255);

imageline($NewImage,1,1,40,40,$LineColor);
imageline($NewImage,190,100,60,0,$LineColor); 

imagestring($NewImage, 10, 50, 5, $ResultStr, $TextColor);

$_SESSION['key'] = $ResultStr;

header("Content-type: image/jpeg");

imagejpeg($NewImage);

?>
