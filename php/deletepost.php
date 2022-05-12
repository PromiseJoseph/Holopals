<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['postId'])){
		$id= $_GET['postId'];

		require_once "Database.php";

		$deletePost = new User();
		$deletePost->DB();
		$query="DElETE FROM post WHERE id = ? ";
		$prepare = $deletePost->stmtInit($query);

		if(!$prepare){
			header("Location:../feed.php?err=unable to delete item due to sql error");
			exit();
		}
			else{

				mysqli_stmt_bind_param($deletePost->stmt,"s",$id);
				mysqli_stmt_execute($deletePost->stmt);
			
			$result= mysqli_stmt_store_result($deletePost->stmt);
			$rowCount= mysqli_stmt_num_rows($deletePost->stmt);

			if($rowCount = 1){
				echo "sucessful";
				header("Location:../feed.php?msg=sucessfully deleted");
				exit();
			}else{
				 header("Location:../feed.php?err=an error occur while deleting pls try again");
				 exit();
			}

			}
		

	}
}
?>