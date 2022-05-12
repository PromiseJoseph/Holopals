<?php
class User{

public $dbHost="localhost";
public $dbUser="root";
public $dbPass="";
public $dbName="holopals";

public $stmt;
public $dbconn;

public function DB(){
  $this->dbconn= mysqli_connect($this->dbHost, $this->dbUser,$this->dbPass,$this->dbName);

    if($this->dbconn){

    }else{
        die("sql error");
    }
 }

 public function stmtInit($query){
   $this->stmt = mysqli_stmt_init($this->dbconn);
    return mysqli_stmt_prepare($this->stmt,$query);
 }
 public function read($query){
  
  $result= mysqli_query($this->dbconn, $query);
  
  if($result){
    return $result;
  }
  else{
    return false;
  }

 }

 public function closeCon(){
  if(!empty($this->stmt)){
 mysqli_stmt_close($this->stmt);
 mysqli_close($this->dbconn);
}

mysqli_close($this->dbconn);
  }
}
?>