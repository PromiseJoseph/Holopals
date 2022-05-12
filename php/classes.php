<?php
class DB{
private $dbHost="localhost";
private $dbUser="root";
private $dbPass="";
private $dbName="holopals";

 _constructor(){
    mysqli_connect($dbHost,$dbuser,$dbPass,$dbName);
 }

 
else{
    die("connection failed");
}
}
?>