<?php
session_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
?>
<?php 
// $_SESSION['cat']=[]; // عشان افضي ال category 
if(isset($_POST['addCategory'])){ // submit 

$title = $_POST['name']; // catch 

// validation 
$errors=[];
if($title==""){
  $errors[] ="title is required";
}elseif(is_numeric($title)){
  $errors[] ="title must be string";
} 
/// check 
if(empty($errors)){
  $cat=$_POST['name']; // title 

  if(!isset($_SESSION['cat'])){ // 
    $_SESSION['cat']=[]; // بيخزنها داخل مصفوفه //
  } // 
  $_SESSION['cat'][]=$cat;  

}else{
  $_SESSION['errors']=$errors;
}

}



?>


      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
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
                <form method="POST" action="addCategory.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addCategory" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
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

<?php 
print_r($_SESSION['cat']);
include "../view/footer.php";
 ?>