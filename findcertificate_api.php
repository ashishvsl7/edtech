<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "dbconnect.php";
if(sizeof($_REQUEST)>0 && !empty($_REQUEST['crtno'])) {
    $crtno = $_REQUEST['crtno'];
    $dummyPrintData = findCertficate($mysqli, $crtno);
    $printData = mysqli_fetch_all($dummyPrintData, MYSQLI_ASSOC);
    $row =  mysqli_num_rows($dummyPrintData);
    if($row==0){
        http_response_code(503);
        echo json_encode(array("message" => "Certificate is not valid."));
    }else{
        http_response_code(201);
        echo json_encode(array("message" => "Certificate is valid."));
    }
}else{
    http_response_code(400);
    echo json_encode(array("message" => "Certificate is not valid."));
}
?>


