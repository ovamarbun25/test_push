<?php
session_start();
include("../includes/config.php");
$ids = $_GET['idAcara'];
$ids2 = $_GET['idTemplate'];
$ids3 = $_GET['idPeserta'];
$query3="select * from templatesertifikatpenyelenggara where IdTemplate = '$ids2'";
$ret2 =mysqli_query($con,$query3);
$getrow2=mysqli_fetch_array($ret2);
$templatename = $getrow2[3];
$templatelayout = $getrow2[4];
$query2="select * from acara where IdAcara = '$ids'";
$ret =mysqli_query($con,$query2);
$getrow=mysqli_fetch_array($ret);
$dir ='Sertifikat/'. $getrow[2];
mkdir($dir);


$query="select * from peserta WHERE IdPeserta = '$ids3' AND IdAcara = '$ids'";
$fire=mysqli_query($con,$query);
$row=mysqli_fetch_array($fire);


$cDate = new DateTime($getrow[3]);
$result = $cDate->format('m/d/Y');
header('content-type:image/jpeg');
$font = realpath('Font/arial.ttf');
$image = imagecreatefromjpeg("../admin/images/$templatename");
$color = imagecolorallocate($image, 0, 0, 0);

$name = $row["NamaPeserta"];
$text = $name;
$image_width = imagesx($image);
$image_height = imagesy($image);
$angle = 45;
$text_box = imagettfbbox(67,$angle,$font,$name);
$text_width = $text_box[2]-$text_box[0];
$text_height = $text_box[7]-$text_box[1];
$xpos = ($image_width/2) - ($text_width/2);

$text2 = $row["StatusPeserta"];$angle2 = 45;
$text_box2 = imagettfbbox(55,$angle2,$font,$text2);
$text_width2 = $text_box2[2]-$text_box2[0];
$text_height2 = $text_box2[7]-$text_box2[1];
$xpos2 = ($image_width/2)-($text_width2/2);

$text3 = "Dalam kegiatan ".$getrow[2];
$angle3 = 45;
$text_box3 = imagettfbbox(37,$angle3,$font,$text3);
$text_width3 = $text_box3[2]-$text_box3[0];
$text_height3 = $text_box3[7]-$text_box3[1];
$xpos3 = ($image_width/2)-($text_width3/2);

$text4 = $getrow[8];
$angle4 = 45;
$text_box4 = imagettfbbox(50,$angle4,$font,$text4);
$text_width4 = $text_box4[2]-$text_box4[0];
$text_height4 = $text_box4[7]-$text_box4[1];
$xpos4 = ($image_width/4)-($text_width4/4);

$text5 = $getrow[9];
$angle5 = 45;
$text_box5 = imagettfbbox(37,$angle5,$font,$text3);
$text_width5 = $text_box5[2]-$text_box5[0];
$text_height5 = $text_box5[7]-$text_box5[1];
$xpos5 = ($image_width/2)-($text_width5/2);

if (!empty($getrow[5])) {
// STAMP LOGO
    $stamp = imagecreatefrompng('Item Sertifikat/Logo/' . $getrow[5]);
    $stamp_new = imagecreatetruecolor(300, 160);
    imagealphablending($stamp_new, false);
    imagesavealpha($stamp_new, true);
    imagecopyresampled($stamp_new, $stamp, 0, 0, 0, 0, 300, 160, imagesx($stamp), imagesy($stamp));

    $margin = ['right' => 1450, 'bottom' => 1120];
    imagecopy($image, $stamp_new,
        imagesx($image) - imagesx($stamp_new) - $margin['right'],
        imagesy($image) - imagesy($stamp_new) - $margin['bottom'],
        0, 0, imagesx($stamp_new), imagesy($stamp_new));
}





if (!empty($getrow[6]) && !empty($getrow[7])){
    //STAMP TTD 1
    $stamp_ttd1 = imagecreatefrompng('Item Sertifikat/Ttd 1/' . $getrow[6]);
    $stamp_new_ttd1 = imagecreatetruecolor(300, 100);
    imagealphablending($stamp_new_ttd1, false);
    imagesavealpha($stamp_new_ttd1, true);
    imagecopyresampled($stamp_new_ttd1, $stamp_ttd1, 0, 0, 0, 0, 300, 100, imagesx($stamp_ttd1), imagesy($stamp_ttd1));

    $margin = ['right' => 1300, 'bottom' => 320];
    imagecopy($image, $stamp_new_ttd1,
        imagesx($image) - imagesx($stamp_new_ttd1) - $margin['right'],
        imagesy($image) - imagesy($stamp_new_ttd1) - $margin['bottom'],
        0, 0, imagesx($stamp_new_ttd1), imagesy($stamp_new_ttd1));

    //STAMP TTD 2
    $stamp_ttd2 = imagecreatefrompng('Item Sertifikat/Ttd 2/' . $getrow[7]);
    $stamp_new_ttd2 = imagecreatetruecolor(300, 100);
    imagealphablending($stamp_new_ttd2, false);
    imagesavealpha($stamp_new_ttd2, true);
    imagecopyresampled($stamp_new_ttd2, $stamp_ttd2, 0, 0, 0, 0, 300, 100, imagesx($stamp_ttd2), imagesy($stamp_ttd2));

    $margin = ['right' => 390, 'bottom' => 320];
    imagecopy($image, $stamp_new_ttd2,
        imagesx($image) - imagesx($stamp_new_ttd2) - $margin['right'],
        imagesy($image) - imagesy($stamp_new_ttd2) - $margin['bottom'],
        0, 0, imagesx($stamp_new_ttd2), imagesy($stamp_new_ttd2));


    imagettftext($image, 48, 0, $xpos, 600, $color, $font, $text);
//    imagettftext($image, 28, 0, 920, 580, $color,$font, "Sebagai : ");
    imagettftext($image, 38, 0, $xpos2, 740, $color, $font,$text2 );
    imagettftext($image, 26, 0, $xpos3, 800, $color, $font, $text3);
    imagettftext($image, 26, 0, 675, 850, $color, $font, "diselenggarakan pada tanggal " . $result);
    imagettftext($image, 26, 0, $xpos4-30, 1190, $color, $font, $text4);
    imagettftext($image, 26, 0, $xpos5*2.1, 1190, $color, $font, $text5);
}elseif (empty($getrow[6]) && empty($getrow[7])){


    imagettftext($image, 48, 0, $xpos, 600, $color, $font, $text);
//    imagettftext($image, 28, 0, 920, 580, $color,$font, "Sebagai : ");
    imagettftext($image, 38, 0, $xpos2, 740, $color, $font,$text2 );
    imagettftext($image, 26, 0, $xpos3, 800, $color, $font, $text3);
    imagettftext($image, 26, 0, 675, 850, $color, $font, "diselenggarakan pada tanggal " . $result);
    imagettftext($image, 26, 0, $xpos4-30, 1190, $color, $font, $text4);
    imagettftext($image, 26, 0, $xpos5*2.1, 1190, $color, $font, $text5);
}elseif(empty($getrow[6])){
    //STAMP TTD 2
    $stamp_ttd2 = imagecreatefrompng('Item Sertifikat/Ttd 2/' . $getrow[7]);
    $stamp_new_ttd2 = imagecreatetruecolor(300, 100);
    imagealphablending($stamp_new_ttd2, false);
    imagesavealpha($stamp_new_ttd2, true);
    imagecopyresampled($stamp_new_ttd2, $stamp_ttd2, 0, 0, 0, 0, 300, 100, imagesx($stamp_ttd2), imagesy($stamp_ttd2));

    $margin = ['right' => 390, 'bottom' => 320];
    imagecopy($image, $stamp_new_ttd2,
        imagesx($image) - imagesx($stamp_new_ttd2) - $margin['right'],
        imagesy($image) - imagesy($stamp_new_ttd2) - $margin['bottom'],
        0, 0, imagesx($stamp_new_ttd2), imagesy($stamp_new_ttd2));

    imagettftext($image, 48, 0, $xpos, 600, $color, $font, $text);
//    imagettftext($image, 28, 0, 920, 580, $color,$font, "Sebagai : ");
    imagettftext($image, 38, 0, $xpos2, 740, $color, $font,$text2 );
    imagettftext($image, 26, 0, $xpos3, 800, $color, $font, $text3);
    imagettftext($image, 26, 0, 675, 850, $color, $font, "diselenggarakan pada tanggal " . $result);
    imagettftext($image, 26, 0, $xpos4-30, 1190, $color, $font, $text4);
    imagettftext($image, 26, 0, $xpos5*2.1, 1190, $color, $font, $text5);

}elseif(empty($getrow[7])){
//STAMP TTD 1
    $stamp_ttd1 = imagecreatefrompng('Item Sertifikat/Ttd 1/' . $getrow[6]);
    $stamp_new_ttd1 = imagecreatetruecolor(300, 100);
    imagealphablending($stamp_new_ttd1, false);
    imagesavealpha($stamp_new_ttd1, true);
    imagecopyresampled($stamp_new_ttd1, $stamp_ttd1, 0, 0, 0, 0, 300, 100, imagesx($stamp_ttd1), imagesy($stamp_ttd1));

    $margin = ['right' => 1300, 'bottom' => 320];
    imagecopy($image, $stamp_new_ttd1,
        imagesx($image) - imagesx($stamp_new_ttd1) - $margin['right'],
        imagesy($image) - imagesy($stamp_new_ttd1) - $margin['bottom'],
        0, 0, imagesx($stamp_new_ttd1), imagesy($stamp_new_ttd1));
    imagettftext($image, 48, 0, $xpos, 600, $color, $font, $text);
//    imagettftext($image, 28, 0, 920, 580, $color,$font, "Sebagai : ");
    imagettftext($image, 38, 0, $xpos2, 740, $color, $font,$text2 );
    imagettftext($image, 26, 0, $xpos3, 800, $color, $font, $text3);
    imagettftext($image, 26, 0, 675, 850, $color, $font, "diselenggarakan pada tanggal " . $result);
    imagettftext($image, 26, 0, $xpos4-30, 1190, $color, $font, $text4);
    imagettftext($image, 26, 0, $xpos5*2.1, 1190, $color, $font, $text5);
}



imagejpeg($image, "$dir/$name.jpg");//Storing certificate here




$file = $name.".jpg";
header('Content-Description: File Transfer');
header('Content-Type: image/jpeg');
header("Content-Disposition: attachment; filename=\"" . basename($file) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($dir."/".$file));
ob_clean();
flush();
readfile("$dir/$file"); //showing the path to the server where the file is to be download
exit;

header('location:acara.php');
