<?php
require_once"documentIntro.php";
?>
<title>feeds</title>
</head>
<body>
<?php
require_once "header.php";
// checking if user really loged in
if(isset($_SESSION['id'])){
  }else{
    header("Location:signinform.php?err=you have to login");
    exit();
  }
require_once "php/conSetup.php";
?>
	<h1 class="text-muted mx-5 mt-3">FEED</h1><hr>
    <main class='container '>
      <div class="row mb-2 ">
             <?php 
              // file  unused code
            $pathOne="image/uploads/text.txt";
            $pathTwo="image/uploads/headings.txt";
            $uploadedText=file_get_contents($pathOne);
            $uploadedHeadings= file_get_contents($pathTwo);
            if(!empty($uploadedHeadings)||  !empty($uploadedText)){
            $headings= explode(",",$uploadedHeadings);
            $texts= explode(",", $uploadedText);
          }
            // if (empty($texts)|| !preg_match("/^[a-zA-Z0-9]*/", $texts)) {
            // 	echo "<h1 class= text text-muted px-2> No post available<h1>";
            // }else{


            require_once "php/Database.php";
            $getPosts= new User();
            $getPosts->DB();
            $query= ' SELECT * FROM post ORDER BY id desc LIMIT 30';
            $result= $getPosts->read($query);
              if($result){
                while($row = mysqli_fetch_assoc($result)){
                    if(!empty($row)){
                       include"feedPost.php";
                       
                     
                  // print_r($row);
                  //   $userPost= new DB();
                  //   $userPost->Database();
                   
                  //   $item= $Row['post'];
                  //   echo $item."<br>";

                  //   $sql="SELECT * FROM post";
                  //   $result=$userPost->read($sql);
                  //   print_r($result);
                  //    // $UserRow= $result[0];
                  //   if(empty($row)){
                  //      echo"<h1> No Post Available</h1>";
                  //   }else{
                  //     }
                  } else{
                  echo "<h1> No Post Available</h1>";
                  }
                
              }

              }
              else{
                header("Location:../feed.php?err=query error");
                exit();
              }
            // foreach($values as $value){
            //   require_once "feedPost.php";
            // }
            
             // foreach($values as $value ){
             //  require_once "feedPost.php";
      
             // }

             // $query= 'SELECT post FROM post ';
             //  $result = mysqli_query($dbconn,$query);

              // if($result){
              //   while($values= mysqli_fetch_assoc($result)){
              //       // $query= "SELECT user,heading,post FROM post WHERE post=? LIMIT 1 ";

              //       // $stmt= mysqli_stmt_init($dbconn);

              //       // if(!mysqli_stmt_prepare($stmt,$query)){
              //       //   header("Location:feed.php? error occur");
              //       //   exit();
              //       // }else{
                
                     

              //       //   mysqli_stmt_bind_param($stmt,"s",$item );
              //       //   mysqli_stmt_execute($stmt);
              //       //  $result = mysqli_stmt_get_result($stmt);
              //       //  if($result){
              //       //   if($userRow= mysqli_fetch_assoc($result)){

              //       //   include "feedPost.php";
              //       //   }
              //       //  }
              //       // 

              //        include "feedPost.php";
              //     }
              //   }
              // }


            // if(empty($uploadedText)){
            //   echo "<h1 class='textmuted'>No Post Available</h1>";

            // foreach($texts as $text  ){
            //   require_once "feedPost.php";

                   
            // }
        // }
        ?>
   </div>
   <scrip type='tex/javascript' src='info.js'></script>
  </main>    
<?php 
require_once "footer.html"
?>
</body>
</html>