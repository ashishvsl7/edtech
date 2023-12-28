<?php

$name = "";
$courseName = "";
$crtdate = "";
$crtno = "";
$crtid = 0;


if(sizeof($_REQUEST)>0 && !empty($_REQUEST['crtno'])) {
    $crtno = $_REQUEST['crtno'];
    $name = $_REQUEST['name'];
    $courseName = $_REQUEST['co'];
    $crtdate = $_REQUEST['crtdate'];
    $crtid  = $_REQUEST['crtid'];
}

include "dbconnect.php";
require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set("chroot", "img/");
$dompdf = new Dompdf($options);
$html = '<div class="row g-5" id="pdfportion" data-no="Ashish_0" style="background-color: #FFFFFF;width: 100%;height:100%;position: relative;" >'.
'<div class="cert_img_1" style="position: absolute;width: 100%;height:100%;border: 4px solid darkblue;border-radius: 35px;background-repeat: no-repeat;"></div>'.
'<div class="img18" style="position: absolute;top: 50px;left: 70px;width: 100px;height: 100px;background-image: url(img/logoboost.png);background-repeat: no-repeat;background-size: 100%;"></div>'.
'<div class="img29" style="position: absolute;top: 50px;left: 810px;width: 170px;height: 100px;background-image: url(img/img29.png);background-repeat: no-repeat;background-size: 100%;"></div>'.
'<div class="img29_1" style="position: absolute;top: 520px;left: 90px;width: 130px;height: 33px;background-image: url(img/img29.png);background-repeat: no-repeat;background-size: 100%;"></div>'.
'<div class="img30" style="position: absolute;top: 550px;left: 96px;width: 110px;height: 30px;background-image: url(img/img30.jpg);background-repeat: no-repeat;background-size: 100%;"></div>'.
'<div class="text1" style="position: absolute;left: 0px;right: 0px;margin: auto;top: 152px;width: 800px;height: 40px;text-align: center;font-family: auto;font-size: 44px;line-height: 44px;color: #000000;text-transform: uppercase;font-weight: bold;text-shadow: 1px 1px #999999;">CERTIFICATE OF ACHIEVEMENT</div>'.
'<div class="text2" style="position: absolute;left: 0px;right: 0px;margin: auto;top: 220px;width: 620px;height: 40px;text-align: center;font-size: 38px;line-height: 44px;color: #000000;">Congratulations!</div>'.
'<div class="text3" style=" position: absolute;left: 0px;right: 0px;margin: auto;top: 282px;width: 840px;height: 40px;text-align: center;font-family: auto;font-size: 58px;line-height: 44px;color: #294dce;text-transform: uppercase;font-weight: bold;text-shadow:1px 1px #999999;">'.$name.'</div>'.
'<div class="text4" style="position: absolute;left: 0px;right: 0px;margin: auto;top: 352px;width: 720px;height: 40px;text-align: center;font-size: 38px;line-height: 44px;color: #000000;">for successfully completing an online course on!</div>'.
'<div class="text5" style=" position: absolute;top: 446px;left: 0px;right: 0px;margin: auto;height: 70px;text-align: center;font-size: 38px;font-family: cursive;color: #251f79;font-weight: bold;text-shadow: 1px 1px #443b3b;">'.$courseName.'</div>'.
'<div class="text11" style=" position: absolute;left: 460px;top: 510px;width: 200px;height: 20px;font-weight: bold;text-align: center;font-size: 28px;">Mr. ABC </div>'.
'<div class="text12" style="position: absolute;left: 430px;top: 550px;width: 260px;height: 20px;font-weight: bold;text-align: center;">President - Ed-Tech Courses</div>'.
'<div class="bagelogo" style="position: absolute;top: 490px;left: 870px;width: 77px;height: 77px;background-image: url(img/bagelogo.png);background-repeat: no-repeat;background-size: 100%;"></div>'.
'<div class="text13" style="position: absolute;left: 850px;top: 570px;width: 230px;height: 20px;font-family: sans-serif;">Date : '.$crtdate.'</div>'.
'<div class="text14" style="position: absolute;left: 830px;top: 590px;width: 230px;height: 20px;font-family: sans-serif;font-weight: bold;font-size: 12px;">Certificate No. : '.$crtno.'</div>'.
'</div>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$outputPath = $crtno .'.pdf';
$dompdf->stream($outputPath, ['Attachment' => 1]);
$output = $dompdf->output();
file_put_contents($outputPath, $output);
$fileName = md5_file($outputPath, false);


$querys ="SELECT * FROM `certificate` WHERE `certificate`.`crt_id` = $crtid";
$results = $mysqli->query($querys);
$allData =  mysqli_fetch_all ($results, MYSQLI_ASSOC);

if(empty($allData[0]['mdcode'])){
    $query="UPDATE `certificate` SET `mdcode` = '$fileName' WHERE `certificate`.`crt_id` = $crtid";
    $result = $mysqli->query($query);

}

?>