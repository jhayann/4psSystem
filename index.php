<?php
@ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php

    include 'inc/header.inc.php';
    
    if(isset($_SESSION['username']))
    {
        header('location:dashboard.php');
    }
    ?>

<body class="body-login-image">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <?php
                    if(isset($_SESSION['error']))
                    {
                        echo '
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body">
                               LOGIN FAILED
                                <div class="text-white-50 small"> '.$_SESSION['error'].'</div>
                            </div>
                        </div>
                        ';
                    }
                    
                    unset($_SESSION['error']);
                    ?>
                  <br>
                  <form class="user" method="POST" action="app/controller/AuthController.php"> 
                   <input type ="hidden" name="request" value="authenticate">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <br>
                    <button class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <h5>4ps Members of Barangay 188 Caloocan City</h5>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

    <?php
    include 'inc/footer.inc.php';
    
    ?>

</body>

</html>
