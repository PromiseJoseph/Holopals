<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=5, initial-scale=1.0">
    <title>Holopals/signup</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
   <link href="css/styles.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="php/signup.php" enctype="multipart/form-data">
  <p class="fs-2 col-lg-auto me-lg-3">HOLO<span>PALS</span></p>
    <h1 class="h3 mb-3 fw-normal fs-5">Please sign up</h1>

     <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name" name="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating" >
      <input type="password" class="form-control" 
      id="floatingPassword" placeholder="Password"
      name="confirmpassword">
      <label for="floatingPassword">Confirm-Password</label>
    </div>
    <p class="error col-red mt-2 "  style="color: red;">
        <?php
        if( isset($_GET['err'])){
        $mssg= $_GET['err'];
        echo  $mssg;
          }
        ?>
        
      </p>

    <button class="w-100 btn btn-lg btn-danger mt-4" type="submit" name="submit">	
    	Sign in
    </button>
    	<p class="mb-3 mt-3 text-muted">Alredy have an account 
    	<a class="login-text fs-6 fw-normal  " href="signinform.php">Login</a> </p>
        <p class="copyright mt-5 mb-3 text-muted" ></p>
<script type="text/javascript" src="js/info.js"></script>
  </form>
</main>
    
  </body>
</html>