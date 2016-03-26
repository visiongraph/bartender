
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
$imagepath="http://www.visiongraphstudios.com/exiauto/demo.jpg?random=323527528432525.24234";

$image=imagecreatefromjpeg($imagepath);

header('Content-Type: image/jpeg');
imagejpeg($image, NULL, 95);
?>


