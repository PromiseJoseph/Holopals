<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=5, initial-scale=1.0">
    <title>Holopals/login</title>
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
  <form method="post" action="php/signin.php" enctype="multipart/form-data">

  <p class="fs-2 col-lg-auto me-lg-3">HOLO<span>PALS</span></p>
    <h1 class="h3 mb-3 fw-normal fs-5">Please login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
      <p class="error col-red mt-2 "  style="color: red;">
        <?php
        if( isset($_GET['err'])){
        $mssg= $_GET['err'];
        echo  $mssg;
          }
        ?>
        
      </p>
    <div class="checkbox mb-3 mt-2">
      <label>
        <input type="checkbox" value="remember-me" name="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit"> 
      Login
    </button>
    <p class="mb-3 mt-3 text-muted">Do not have an account?
      <a class="login-text fs-6 fw-normal  " href="signupform.php">Singup</a> 
    </p>

        <p class=" mt-5 mb-3 text-muted " id="copyright"></p>
        <script type="text/javascript" src="js/info.js"></script>
  </form>
</main>
    
  </body>
</html>

