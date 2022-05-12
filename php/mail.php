<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['Email'];
	$password=$_POST['password'];


	 echo $password;

session_start()
	$code=getrandmax(1000,9999);
	$message="You signed up for Minisocialmedia "."\n\n\n"."Your code is" .$code."\n\n"."pls copy the four digit code code";
	$header=ucword("From:"." holopals")."noreply@gmail.com";
	$email = $_POST('email');
	$subject=strtoupper("holopals");

	mail($email,$subject,$message,$header);
}
?>