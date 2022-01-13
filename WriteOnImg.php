<?php

//vars
$name = "علی احمدیان";
$priceDigit='200,500,000,000';
$priceAlphabet="یه قرون";
$moneyFor = "مدرسه خیریه";
$PaymentMethod = "اینترنتی";
$fontsize = 20;



ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_STRICT");
header('Content-type: image/jpg');

include("fagd.php");

//fixed
$jpg_image = imagecreatefromjpeg(dirname(__FILE__) . '/1.jpg');
$black = imagecolorallocate($jpg_image, 0, 0, 0);
$normalFont = dirname(__FILE__) . '/arial.ttf';


$text = fagd($name, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth+650;
imagettftext($jpg_image, $fontsize, 0, $x, 285, $black, $normalFont, $text);

//$text = fagd($priceDigit, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $priceDigit);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth+700;
imagettftext($jpg_image, $fontsize, 0, $x, 358, $black, $normalFont, $priceDigit);


$text = fagd($priceAlphabet, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth+350;
imagettftext($jpg_image, $fontsize, 0, $x, 358, $black, $normalFont, $text);

$text = fagd($moneyFor, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth+700;
imagettftext($jpg_image, $fontsize, 0, $x, 410, $black, $normalFont, $text);


$text = fagd($PaymentMethod, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth+650;
imagettftext($jpg_image, $fontsize, 0, $x, 540, $black, $normalFont, $text);




imagejpeg($jpg_image);



//}
//WriteOnImage("سپهر علیدوستی");