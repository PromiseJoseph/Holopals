<?php
session_start();
if(isset($_SESSION['id'])){
  }else{
    header("Location:signinform.php?err=you have to login");
    exit();
  }
?>
<header class="p-3 bg-dark text-white mx-0">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="feed.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <p class="fs-2 col-lg-auto me-lg-3">HOLO<span>PALS</span></p>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="feed.php" class="nav-link px-2 text-white">Feed</a></li>
          <li><a href="uploadSection.php" class="nav-link px-2 text-white">Post</a></li>
          <li><a href="#about" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <a href="php/logout.php" style="text-decoration: none;color: white;">
          <button type="button" class="btn btn-success me-2">
          Logout! <?php echo $_SESSION['username']?>
          </button>
          </a>
        </div>
      </div>
    </div>
  </header>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

