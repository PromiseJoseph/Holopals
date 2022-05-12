<?php 
require_once 'php/conSetup.php';
require_once "documentIntro.php";
?>
<title>holopals/writesomething</title>
</head>
<body>
<?php
require_once "header.php";
require_once "php/Database.php";
if(isset($_GET['postId'])){
    $postId=$_GET['postId'];

    $editdetails= new User();
    $editdetails->DB();

    $query= "SELECT * FROM post WHERE id=$postId LIMIT 1";

    $result= $editdetails->read($query);

    if($result){
         $row = mysqli_fetch_assoc($result);
         $edtPost = trim($row['post']);
         echo($edtPost);
         $edtHeading= trim($row['heading']);
         $edtImg=trim($row['image']);
        }

}
?>    
  <div class="container mt-2">
    <div class="upload">
        <div class="upload-file" >
         <form class="form form-data "
            method="post" 
            action=<?php
            if(isset($postId )){
                echo"php/editpost.php?postId=".$postId;
            }
            else {
                echo"php/upload.php";
            }
             ?> 
           enctype="multipart/form-data">
            <div class="input mt-5">
                <h3 class= "mb-2  fs-6 fw-bold text-muted">Heading</h3>
                <input type="text" name="heading"  class="text fw-1 fs-5 initialism p-3 mb-3" max-value="20" placeholder="max-value 15" 
                value=<?php 
                if(isset($postId)&& isset($edtHeading)){
                echo $edtHeading;
                    } ?>>
                <br>
               
             </div>
             <div class="input ">
                  <h3 class="mb-2  fs-6 fw-bold text-muted">Description</h3>
                  <textarea type="text" cols="20" maxlength="200" name="text" class="p-5 fs-5 " placeholder="write something" >
                    <?php if(isset($postId) && isset($edtPost)){echo $edtPost;}?>
                  </textarea>

             </div>
             <div class="group d-flex m-5">
                    <h5 class="text text-muted mx-2 ">Chooose Image </h5>
                    <input type="file" name="file" 
                    value=<?php
                        if(isset($edtImg)){
                            echo $edtImg;
                        }
                    ?>
                    >    
                    <button class="btn btn-success p-2 mx-1" type="submit" name="submit" id="post">
                    <?php
                    if(isset($_GET['postId'])){
                        echo "Save";

                    }else{
                        echo "Upload";
                    }
                    ?>
                        
                    </button>
             </div>
            </form>
        </div>
    </div>
</div>
    
<!-- <script src="js/imageupload.js"></script>
 --><!-- <script src="js/enpoint.js"></script> -->
<?php
require_once "footer.html";
?>
</body>
</html>