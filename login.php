<?php
// session_start();
include "header.php";
include "navbar.php";
?>
<?php
setcookie("email","ahmed@route.com");
setcookie("password","11111111");
if(isset($_COOKIE['remember']) && $_COOKIE['remember']=="checked"){
    header('location:admin/view/layout.php'); // dashboard
}
?>

<?php
  if(!empty($_SESSION['errors']))
  {
   foreach($_SESSION['errors'] as $error)
   {?>
       <div class="alert alert-danger"><?php echo $error ?></div>
  <?php }
  }
  unset($_SESSION['errors']);
?>
            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action ="handler/handlelogin.php" method ="POST" >
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" name="email" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" name="password" class="form-control p_input" >
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit"name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php include "footer.php" ?>

