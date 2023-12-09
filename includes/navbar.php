<nav class="navbar sticky-top" style="background-color: #f1f1f1;" >

<div class="container-fluid">
    <a class="navbar-brand" href="?page=home"><img class='stube_logo' src="images/sharetube.png" alt="">shareTUBE</a>


    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>



    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#addVideo">Upload a video</a>
          </li>

          <?php
          if(!isset($_SESSION['usr_id'])){
            ?>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#createAccount">Create an account</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
          </li>


          <?php
          }
          ?>
           
          <?php
          if(isset($_SESSION['usr_id'])){
            ?>

          <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo getUserName($_SESSION['usr_id']); ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profile">Profile </a></li>
                      <li><a class="dropdown-item" href="#">User preference</a></li>
                
                      <li>
                        <hr class="dropdown-divider">
                      </li>

                      <li><a class="dropdown-item" href="?page=logout">Logout</a></li>
                    </ul>

           </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=myvideo" >My videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=history" >History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=later" >Watch later</a>
          </li>
            <?php
          }
          ?>
       

        </ul>
   
      </div>
    </div>
  </div>
</nav>