<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23-Dec-23
 * Time: 11:57 AM
 */

function allCourses($mysqli){
    $query = "SELECT * FROM `courses`";
    $result = $mysqli->query($query);
    return mysqli_fetch_all ($result, MYSQLI_ASSOC);
}

?>


