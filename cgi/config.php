<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mediship_admin');
define('DB_PASSWORD', 'Spring2021!');
define('DB_NAME', 'mediship_login');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>