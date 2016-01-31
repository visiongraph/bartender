<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
$imagepath="http://www.visiongraphstudios.com/bartender/demo.jpg";

$image=imagecreatefromjpeg($imagepath);

header('Content-Type: image/jpeg');
imagejpeg($image, NULL, 95);
?>

