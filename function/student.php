<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23-Dec-23
 * Time: 11:58 AM
 */

function checkMobileNumber($mobile, $mysqli){
    $query = "SELECT * FROM `student` WHERE `stu_mobile`='".$mobile."' ";
    $result = $mysqli->query($query);
    return mysqli_num_rows($result);
}

function checkEmailId($email, $mysqli){
    $query = "SELECT * FROM `student` WHERE `stu_email`='".$email."' ";
    $result = $mysqli->query($query);
    return mysqli_num_rows($result);
}

function createStudent($mysqli, $name, $mobile, $email, $address, $password){
    $query="INSERT INTO `student` (`stu_name`, `stu_mobile`, `stu_email`, `stu_address`, `stu_password`)" .
        " VALUES ('$name', '$mobile', '$email', '$address', '$password');";
    $result = $mysqli->query($query);
    return $mysqli -> insert_id;
}

function checkLoginConfirmation($mysqli, $mobile, $password){
    $query = "SELECT * FROM `student` WHERE `stu_mobile`='".$mobile."' AND `stu_password`='".$password."' ";
    $result = $mysqli->query($query);
    return $result;
}

?>