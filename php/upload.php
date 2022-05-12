<?php 
if (isset($_POST['submit'])){
//text and heading
session_start();
//file item
	$ftext = $_POST['text'].",";
	$fheading = $_POST['heading'].",";

	//post items
	$text = trim(ucfirst($_POST['text']));
	$heading = trim(ucwords($_POST['heading']));
//post text
	$pathOne = fopen("../image/uploads/text.txt", 'a');

	fwrite($pathOne, $ftext);
	fclose($pathOne);
//post heading
	$pathTwo = fopen("../image/uploads/headings.txt","a");
	
	fwrite($pathTwo,$fheading);
	fclose($pathTwo);



//$item is what to select from db
//$session are items => from session in login must be corresponding to $item



$TblDbname ="minisocialmedi";

// class checkto validate

function Validate($itemOne,$itemTwo){
	if (empty($itemOne) || empty($itemTwo)){
	
		header("Location:../uploadSection.php?err=cannotPost empty item");
		exit();

	}

}
// getting post and headuing from db to file

//File
	
	
	if(isset($_FILES['file'])){

    $file = $_FILES['file'];

	$name = $_FILES['file']['name'];

	$type = $_FILES['file']['type'];

	$size = $_FILES['file']['size'];

	$tmp_name = $_FILES['file']['tmp_name'];

	$error = $_FILES['file']['error'];

	
	$tmpExt = explode(".", $name);

	$fileExt= strtolower(end($tmpExt));

	$Allowed= array('jpg','jpeg','png' );

	//checkingg for ext
 require_once("Database.php");

	if(in_array($fileExt,$Allowed)){
		if($error === 0){
			if($size < 300000){

				$newFileName= uniqid('',true) . "." . $fileExt;
				$destination= "../image/uploads/". $newFileName;

				move_uploaded_file($tmp_name , $destination );

			}else{
				header("../uploadSection.php?err=file is too big");
			}


		}else{
			header("../uploadSection.php?err=An error occur while trying to upload pls check file and try again ");
		}

	}else{
	header("../uploadSection.php?err=can't acccept type of file  or file is empty");
		}
}

require_once"conSetup.php";

//inserting post,heading in db
$query = "INSERT INTO  post (user,heading,post,time,image) VALUES (?,?,?,?,?)";
 
$stmt= mysqli_stmt_init($dbconn);
$prepare = mysqli_stmt_prepare($stmt,$query);

if(!$prepare){
	header("Location:../uploadSection.php?err=sql error");
	
}else{

	validate($heading,$text);
		$time= date('d-M-Y - g:ia');

	//isset params 
	if(isset($_SESSION) ){
		$username=$_SESSION['username'];
	}else{
		header("Location:../signinform.php?err=you have to login");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt,"sssss",$username,$heading,$text,$time,$newFileName);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	header("Location:../feed.php?uploadsucess");
}
}
?>