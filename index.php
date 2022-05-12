<?php
 require_once"documentIntro.php"
?>
    <title>Holopals.homepage</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <p class="fs-2 col-lg-auto me-lg-3">HOLO<span>PALS</span></p>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="signinform.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="signinform.php" class="nav-link px-2 text-white">Feed</a></li>
          <li><a href="signinform.php" class="nav-link px-2 text-white">Post</a></li>
          <li><a href="#about" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2"> 
          <a href="signinform.php" style="text-decoration: none; color:grey;">Login</a>
          </button>
          <button type="button" class="btn btn-warning"> 
          <a href="signupform.php" style="text-decoration: none; color:white;">Sign-up</a>
          </button>
        </div>
      </div>
    </div>
  </header>
<main class="container">
  <div class="p-4 p-md-5 mb-4  mt-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">HOLOPALS</h1>
      <p class="lead my-3">We beleive that innovation can never stop.Join us interact with see posts from other people around the globe</p>
    </div>
    <button class="btn btn-warning "><a href="signupform.php" 
    style="text-decoration:none;color:black;">Join</a></button>
  </div>
  <div class="row mb-2 ">
  <?php
       require_once "php/Database.php";
            $getPosts= new User();
            $getPosts->DB();
            $query= ' SELECT * FROM post ORDER BY id desc LIMIT 5';
            $result= $getPosts->read($query);
              if($result){
                while($row = mysqli_fetch_assoc($result)){
                  if(!empty($row)){
                  echo 
                  '<div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">'.$row['user'].'</strong>
          <h3 class="mb-0">'.$row['heading'].'</h3>
          <div class="mb-1 text-muted">'.$row['time'].'</div>
          <p class="card-text mb-auto">'.$row['post'].'</p>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img" width="200" height="250"  alt="Join to view image" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title></title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>

        </div>
      </div>
    </div>';
                }else{


                }
              }
            }
       
?>
<div class="row mb-2 ">
      <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">HOLOPALS</strong>
          <h3 class="mb-0"></h3>
          <p class="card-text mb-auto fw-bold">Welcome to Holopals to join our community and view or post please login post</p>
        </div>
      </div>
    </div>
    
  <div class="md-12 p-fixed" id="about">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded ">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0 ">The creative behind holopals is a mastermind class of Odelola promise  </p>
           <img class="bd-placeholder-img mt-5 mx-0 px-0 mb-0 pb-0" width="200" height="300" src="image/Creator.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title></title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
        </div>
      </div>
    </div>
    </div>
  
        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>


  <?php
require_once "footer.html";
  ?>
        
</body>
</html>