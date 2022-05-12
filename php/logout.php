<?php
session_start();
if(isset($_SESSION['id'])){
	session_destroy();
	header("Location:../signinform.php?successfully loged out");
	exit();
	
}
?>