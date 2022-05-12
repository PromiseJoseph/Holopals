<?php 

if(isset($_POST['submit'])){
	
	require "conSetup.php";
	$email=$_POST['email'];
	
	$password=$_POST['password'];
	$id=uniqid("",true);
	
	$confirmpassword=$_POST['confirmpassword'];
	
	$username=ucfirst($_POST['username']);
	//messages
	$messageTwo= "check for empty inputs";
	$messageThree="wrong inputs";
	$messageFour="password not matched";


if (empty($email)||empty($password)||empty($confirmpassword)||empty($username)){

	header("Location:../signupform.php?err=".$messageTwo);
	exit();

}
// else if(!preg_match("/^[a-zA-Z0-9]*/", $email)){
// 	header("Location:../signupform.php?".$messageThree);
// 	exit();
// }

else if($password != $confirmpassword){
	header("Location:../signupform.php?err=".$messageFour);
	exit();
}else{
	// checking for user name in the database
	$query= "SELECT * FROM minisocialmedi WHERE email = ? ";
	
	$stmt= mysqli_stmt_init($dbconn);

	if(!mysqli_stmt_prepare($stmt,$query)){
		header("Location:../signupform.php?err=sqlerror");
		exit();

	}else{
		mysqli_stmt_bind_param($stmt,"s",$email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

		if(mysqli_stmt_num_rows($stmt ) > 0){
			header("Location:../signupform.php?err=email already exist");
			exit();
		}else{
			$sql="SELECT * FROM minisocialmedi WHERE username= ?";

			$stmt=mysqli_stmt_init($dbconn);
		
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location:../signupform.php?err=sqlerror");
				exit();

			}else{
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_execute($stmt);
				mysqli_stmt_store_result($stmt);
				
				$usernameRowcount= mysqli_stmt_num_rows($stmt);
				
				if($usernameRowcount>0){
					header("Location:../signupform.php?err=username already exist");
					exit();

				}else{
							// inserting into database

					$query="INSERT INTO minisocialmedi (Id,Email, Password, Username) VALUES (?,?,?,?)";
					
					$stmt= mysqli_stmt_init($dbconn);

						if(!mysqli_stmt_prepare($stmt,$query)){
							header("Location:../signupform?err=sqlerror");
							exit();
							
					}else{
					//$hashedpassword= password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"ssss",$id,$email,/*$hashedpassword*/$password,$username);
					mysqli_stmt_execute($stmt);
				
					header("Location:../signinform.php?sucessfully created");
					exit();

					}
				}

			}	}
		}

	}
	mysqli_stmt_close($stmt);
	mysql_close($dbconn);
}
else{
	header("Location:../signupform.php");
	exit();
}

?> 