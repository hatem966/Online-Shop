
<?php
// session_start();
 include 'header.php' ?>
<?php include 'navbar.php' ;

if(!isset($_SESSION['login'])){
  header('Location:login.php');
}

?>







    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
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
          
        <div class="pro-container">
           <?php if (isset($_SESSION['products'])): 
           $index=0;
            foreach($_SESSION['products'] as $product): 
            ?>
            <div class="pro">
            <form action ="cart.php?index=<?=$index?>" method ="post">
              
            <a href="review.php?index=<?=$index ?>">
            <img src="admin/upload/<?= $product['imgName']?>" alt="p1" />
              </a>
              
              <?php // عملت لينك عشان لما اضغط على الصوره تفتح في صفحه ال review  ?>

                <div class="des">
                <h2><?= $product['title']?></h2>
                    <h5><?= $product['cat']?></h5>
                    <?php  if(isset($_SESSION["review$index"])) :
                      $originalRate=count(array_column($_SESSION["review$index"],"rating")) * 5;
                      // echo $originalRate;
                      // echo "<br>";
                      $realRate = array_sum(array_column($_SESSION["review$index"],"rating"));
                      // echo   $realRate;
                      $rate= ($realRate / $originalRate) *5; // عشان الناتج هيطلع رقم في الميه ف لازم نضربو في خمسه
                      echo (int)$rate;
                    endif;?>
                  
                  <div class="star ">
                    <?php for ($i=0; $i < (int)$rate ; $i++):    
                     ?>
                        <i class="fas fa-star "></i>
                        <?php endfor ; ?>
                    </div>

                    <h4><?= $product['price']?>$</h4>
                    <h4>Available: <?= $product['quantity']?></h4>
                    <input type="number" name="quantity">
                    <button type="submit" name ="submit"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>
               </form>
                    </div>
                </div>
            <?php 
          $index++;  
          endforeach;
            endif ;?>
                  
            </div>
           
        </div>
    </section>
    

    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>