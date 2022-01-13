<?php

$name = "علی احمدی";
$priceDigit = "1000000";
$priceAlphabet = "یک میلیون";
$moneyFor = "مدرسه خیریه";
$PaymentMethod = "اینترنتی";






ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_STRICT");
// Set the content-type
header("Content-type: image/png");
include("fagd.php");

$normalFont = dirname(__FILE__) . '/arial.ttf';
$HeaderFont = dirname(__FILE__) . '/arial.ttf';
//vars
$header = "انجمن مدد کاری امام زمان(عج)";
$addr = "تهران: شمال غربی پل کریم خان زند تلفن88906061، میدان وحدت اسلامی تلفن55152706، بازار جنب امام زاده زید تلفن55639557 ";
$addr1 = "اصفهان: خیابان چهارباغ پایین تلفن34711081";
$footNote="این برگه بدون ثبت کامپیوتری و مهر فاقد اعتبار است";
$string = array(
    "توسط: " . $name,
    "مبلغ:       " . $priceDigit . "     به حروف:     " . $priceAlphabet . "  ریال  ",
    "بابت        " . $moneyFor . "       به انجمن رسید.",
    "از درگاه خداوند متعال برای ایشان پاداش نیکو و سلامت و سرافروزی دنیا و آخرت خواهانیم.",
    "نحوه ی پرداخت: " . $PaymentMethod,
);
$HeighT=(count($string) + 8) * 40;
//create image
$im = imagecreate(1100, $HeighT);
$y = 90;
$fontsize = 20;


// Create some colors
$white = imagecolorallocate($im, 200, 200, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
$blue = imagecolorallocate($im, 0, 0, 255);


#HEADER
$text = fagd($header, 'fa', 'nastaligh');
$dimensions = imagettfbbox($fontsize, 0, $HeaderFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = imagesx($im) - $textWidth-30;
imagettftext($im, $fontsize, 0, $x, 40, $blue, $HeaderFont, $text);
imagettftext($im, $fontsize, 0, $x-50, 60, $blue, $HeaderFont, "ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ");


//Body
foreach ($string as $member) {
    $text = fagd($member, 'fa', 'normal');
    $dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
    $textWidth = abs($dimensions[4] - $dimensions[0]);
    $x = imagesx($im) - $textWidth - 50;
    imagettftext($im, $fontsize, 0, $x, $y, $blue, $normalFont, $text);
    $y += 40;
}


//write Address
$fontsize = 12;
$y+=190;
$text = fagd($addr, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = (imagesx($im) / 2) - (($dimensions[2] - $dimensions[0]) / 2);
imagettftext($im, $fontsize, 0, $x, $y, $blue, $normalFont, $text);
$text = fagd($addr1, 'fa', 'normal');
$dimensions = imagettfbbox($fontsize, 0, $normalFont, $text);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$x = (imagesx($im) / 2) - (($dimensions[2] - $dimensions[0]) / 2);
imagettftext($im, $fontsize, 0, $x, $y + 25, $blue, $normalFont, $text);

$text = fagd("مهر و امضاء", 'fa', 'nastaligh');
imagettftext($im, 12, 0, 250, $y- 120, $blue, $normalFont, $text);


//write Foote Note
$text = fagd($footNote, 'fa', 'normal');
imagettftext($im, 10, 90, 10, $HeighT, $blue, $normalFont, $text);

imagepng($im);
imagedestroy($im);