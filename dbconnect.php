<?php
$host_name = "localhost";  //Host Details
$user_name = "root"; //User Name
$password = ""; //Password
$database_name = "edtech"; //Database Name

//Connection query
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($host_name, $user_name, $password, $database_name);

/* get the name of the current default database */
$result = $mysqli->query("SELECT * FROM `student`");
$row = $result->fetch_row();

include ('function/utils.php'); // Include utils functions
include ('function/certificate.php'); // Include certificate functions
include ('function/chapter.php');  // Include chapter functions
include ('function/courses.php'); // Include courses functions
include ('function/student.php'); // Include student functions

?>