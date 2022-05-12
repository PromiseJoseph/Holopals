<?php
if (isset($_POST['submit'])){

	$email= $_POST['email'];
	
	$password= $_POST['password'];

	require_once "conSetup.php";

	if(empty($email) || empty($password)){
		header("Location:../signinform.php?err=check for empty inputs");
		exit();

	}
	else{
		$query = "SELECT * FROM minisocialmedi WHERE  Email = ? ";
		
		$stmt = mysqli_stmt_init($dbconn);

		if(!mysqli_stmt_prepare($stmt,$query)){
			header("Location:../signinform.php?err=sql error");
			exit();

		}else{
			mysqli_stmt_bind_param($stmt,"s",$email);
			mysqli_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);
			// if(mysqli_stmt_num_rows($result)>1){
			// 	header("Location:../signinform.php?err=access denied");
			// 	exit();
			// }
			
			if($row = mysqli_fetch_assoc($result)){

				echo $row['Password'];
				 
				// $verPass = password_verify($password,$row['Password']);
				
				function verify_match($itemOne,$itemTwo){
				
					if ($itemOne == $itemTwo){
						return true;
					}
					else{
						return false;
					}
				}
		$verPass=verify_match($password,$row['Password']);

				 if($verPass){
				 	session_start();
					
					$_SESSION['id'] = $row['Id'];
					
					$_SESSION['email'] = $row['Email'];

					$_SESSION['username'] = $row['Username'];

					header("Location:../feed.php?login sucessful");
					exit();
					session_end();
				}
				 elseif($verPass == false){
					
					header("Location:../signinform.php?err= password incorrect");
					exit();

				}
				else{
				 	header("Location:../signinform.php?err=an error occured please try again");
				 	exit();
				 }
			}
		}
	}
mysqli_stmt_close($stmt);
mysqli_close($dbconn);
}
else{
	header("Location:../signinform.php?Access Denied");
}
?>
