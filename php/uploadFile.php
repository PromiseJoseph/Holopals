<?php
if(isset($_POST['submit'])){
    // variable for the name inpfile

    $File= $_FILES['inpfile'];
    //
    $FileName= $_FILES['inpfile']['name'];
    // variable to store the temporary file 
    $TepFile=$_FILES['inpfile']['tep_file'];
    // variable for file size
    $FileSize=$_FILES['inpfile']['size'];
    // variable for 
    $FileError=$_FILES['inpfile']['error'];
    //
    $FileType=$_FILES['inpfile']['type'];
    // file extension
    $FilExt=explode('.',$FileName); //explode() seperates the .ext from the filename

    $FileActualExt= strtolower(end($FilExt)); //changes the last part of the  .exe seperaated from fileNameto lower case

    $fixedExt=array('jpg','jpeg','png','pdf');

    if(in_array($FileActualExt,$fixedExt)){

        if($FileError===0){
            
            if($FileSize<100000){//100000kb=100mb
                $NewFileName= uniqid('',true). ".".$FileActualExt; //gives us a newfilename with a unique id with a "." + the actual extension.
                $FileDestination= 'image/uploads/'.$NewFileName;// newfilename in this case represent what to upload
                move_uploaded_file($TepFile,$FileDestination);//move file in the temporaryfile(tempfile) to the New filedestination
                header("Location:php/uploadFile.php?uploadsuccess");
                
            
            }

             else{
                echo "<h3>file is to big</h3>";
             }
            }
        else{
            echo '<h3>there is an error while uploading file</h3>';

        }
    }
    else{
        echo "<h3>cannot upload file</h3>";
    }



}
?>