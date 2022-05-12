<?php
if(isset($_POST['submit'])){
if(isset($_POST) && isset($_GET)){
	
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
	
// updating post in the database
	print_r($_POST);
	
	$postId = $_GET['postId'];
	echo $postId;
	$newHeading = trim(ucwords($_POST['heading']));
	$newPost= trim(ucwords($_POST['text']));
	echo $newHeading."</br>".$newPost;
    
    require_once"Database.php";

	$editPost = new User();
	$editPost->DB();
		print_r( $editPost);
// if new image is beign selected

	$query="";

if(isset($newFileName)){
	$query= "UPDATE post SET post = $newPost, heading = $newHeading, image=$newFileName  WHERE id = $postId";
}else{
	$query= "UPDATE post SET post = $newPost, heading = $newHeading WHERE id = $postId";
}

	$result= $editPost->read($query);

	if($result){
		header("Location:../feed.php?msg=successfully edited");
		exit();
	}else if($result== false){
		echo'error occured';
		echo $result;
	}

}else{
	header("Location:../feed.php?access denied");
	exit();
}
}
?>