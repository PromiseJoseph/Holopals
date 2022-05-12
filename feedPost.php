
<div class='col-md-6'>
    <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
        <div class='col p-4 d-flex flex-column position-static'>
        <strong class='d-inline-block mb-2 text-primary'><?php echo "Posted By ". $row['user'] ?></strong>
        <h3 class='mb-0'><?php echo $row['heading']?></h3>
            <div class='mb-1 text-muted' ><?php echo $row['time']?></div>
                <p class='card-text mb-auto'>
                <?php echo $row['post']?>
                </p>
            <div class='m-2 fs-6 mt-0 ' style="position:relative;">
                <?php 
                 if($row['user'] == $_SESSION['username']){ 
                       include "editBut.php";
                       include "deleteBut.php";
                }else{
                  echo "";  
                }
                ?>   
            </div>
        </div>
     
    <div class='col-auto d-none d-lg-block'>
        <img class='bd-placeholder-img' alt="No Image available" width='200' height='250' 
        src=<?php
        echo "image/uploads/".$row['image']
        ?> 
        role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title></title><rect width='100%' height='100%' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'></text></svg>

    </div>
    </div>
</div>
       
