<?php

//Development of Database Info
$db_host = "localhost"; //name of host server
$db_user = "";  //name of sql user 
$db_pass = "";      //passsword of sql
$db_name = "ubi_forms";   //name of the database

//Creating Connection
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Checking connection
if (mysqli_connect_errno()) {
    echo "Connection Failed" . mysqli_connect_errno();
    exit();
} else {
    // echo "Connection Succesful<br>";
}

date_default_timezone_set("America/New_York");      //default time zone set to ameican time
