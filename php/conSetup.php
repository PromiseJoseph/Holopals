<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="holopals";

$dbconn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if($dbconn){
 
}else{
    die("connection failed");
}
?>

