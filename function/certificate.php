<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23-Dec-23
 * Time: 11:58 AM
 */

function checkCertificateIsGenerated($mysqli, $courseId, $studentId){
    $query = "SELECT * FROM `certificate` WHERE `co_id`='".$courseId."' AND `stu_id`='".$studentId."' ";;
    $result = $mysqli->query($query);
    return $result;
}

function generateCertificate($mysqli, $courseId, $studentId, $milliseconds, $uniqid){
    $query="INSERT INTO `certificate` (`co_id`, `stu_id`, `unique1`, `unique2`) VALUES ('$courseId', '$studentId', '$milliseconds', '$uniqid');";
    $result = $mysqli->query($query);
    $resultUpdate =  checkCertificateIsGenerated($mysqli, $courseId, $studentId);
    return $resultUpdate;
}

function certificateFinalDetails($mysqli, $courseId, $studentId){
     $query = "SELECT * FROM `certificate`".
    " INNER JOIN `student` ON `student`.stu_id = `certificate`.stu_id".
    " INNER JOIN `courses` ON `courses`.co_id = `certificate`.co_id".
    " WHERE `certificate`.co_id='".$courseId."' AND `certificate`.stu_id='".$studentId."'";
    $result = $mysqli->query($query);
    return $result;
}

function findCertficate($mysqli, $crtno){
   $query = "SELECT * FROM `certificate`".
        " INNER JOIN `student` ON `student`.stu_id = `certificate`.stu_id".
        " INNER JOIN `courses` ON `courses`.co_id = `certificate`.co_id".
        " WHERE `certificate`.unique1='".$crtno."'";
    $result = $mysqli->query($query);
    return $result;
}

function validateMD5($mysqli, $mdvalue){
    $query = "SELECT * FROM `certificate` WHERE `mdcode`='".$mdvalue."'";
    $result = $mysqli->query($query);
    return $result;
}
?>