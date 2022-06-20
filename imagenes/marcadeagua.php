<?php
$base = "plandeestudio.jpg"; 
$marcadeagua = "marca.png"; 
$imagen= imagecreatefrompng($marcadeagua);
$ext = substr($base, -3); 
if(strtolower($ext) == "gif") {

{
echo "Error opening $base!"; exit;
}
} else if(strtolower($ext) == "jpg") {
if (!$imagen2 = imagecreatefromjpeg($base)) { echo "Error opening $base!"; exit;
}

} else if(strtolower($ext) == "png") {
//si el archivo es png creamos la imagen a proteger
if (!$imagen2 = imagecreatefrompng($base)) { echo "Error opening $base!"; exit;
}
} else {
die;
}
imagecopy($imagen2, $imagen, 30, 30, 0, 0, imagesx($imagen), imagesy($imagen));
imagecopy($imagen2, $imagen, 300, 300, 0, 0, imagesx($imagen), imagesy($imagen));

header("Content-Type: image/jpeg");
imagejpeg($imagen2);

?>