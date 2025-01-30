<?php
session_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";

?>


      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <?php
                   if(!empty($_SESSION['errors'])):
                     
                     foreach($_SESSION['errors'] as $error):
                     ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                  <?php endforeach;
                        endif;
                       unset($_SESSION['errors']);
                      ?>
                <form method="POST" action="handleaddProduct.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                            <select name="name" class="form-control p_input">
                                <?php foreach ($_SESSION['cat'] as $cat): ?>
                                    <option value="<?= $cat ?>"><?php echo $cat ?></option>
                                <?php endforeach; ?>
                            </select>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="file" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">AddProduct</button>
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

include "../view/footer.php";
 ?>
 <?php
if (isset($_SESSION['products'])) {
    // foreach ($_SESSION['products'] as $product) { // انا مخزنها في اراي 
        // echo "<div>";
        // echo "<h3>Title: " . $product['title'] . "</h3>";
        // echo "<p>Category: " . $product['cat'] . "</p>";
        // echo "<p>Description: " . $product['desc'] . "</p>";
        // echo "<p>Price: $" . $product['price'] . "</p>";
        // echo "<p>Quantity: " . $product['quantity'] . "</p>";
        // echo "<img src='../upload/" . $product['imgName'] . "' alt='Product Image'>";
        // echo "</div>";
        print_r($_SESSION['products']);
    // }
    // Optional: Clear the products after displaying them
    // unset($_SESSION['products']);
}
?>




