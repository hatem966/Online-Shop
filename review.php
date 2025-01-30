
<?php
// session_start();
 include 'header.php' ?>
<?php include 'navbar.php' ;

if(!isset($_SESSION['login'])){
    header('Location:login.php');
  }
  
?>



<?php

if(isset($_GET['index'])){    
    $index = $_GET['index'];
    $product=$_SESSION['products'][$index]; // 
    // print_r($_POST);
    
    if(!isset($_SESSION["review$index"])){   // Array ( [rating] => 3 [comment] => comment [rate] => hatem ) // rate = username 
      $_SESSION["review$index"]=[];
    }
    

    if(isset($_POST['rate'])){
    $_POST['rate']=$_SESSION['user']['username'];  // انا هنا بمسك الحاجه اللي دخلتها ه
      $_SESSION["review$index"][]=$_POST; // انا هنا بخزن كل حاجه مووجوده داخل ال post في ال session 
      // اذا انا هكمل واعمل لوب ب sesssion 
    }

}else{
    header('location:shop.php');
}

?>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
          
        <div class="pro-container">
          
            <div class="pro">
                <img src="admin/upload/<?=$product['imgName']?>" alt="p1" />
               
                </div>
           
            </div>
           
        </div>
    </section>
    

    <div class="row d-flex justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
     
    <div class="card-body p-4">
        <form action="review.php?index=<?=$index ?>" method="post">
      1<input type="radio" name="rating" value="1">
      2<input type="radio" name="rating" value="2">
     3<input type="radio" name="rating" value="3">
      4<input type="radio" name="rating" value="4">
      5<input type="radio" name="rating" value="5">
        <div class="form-outline mb-4">
          <input type="text" id="addANote" name="comment" class="form-control" placeholder="Type comment..." />
          <button class="form-label mt-2 btn btn-primary" name="rate" for="addANote">+ Add a note</label>
        </div>
        </form>
           
           <?php if(isset($_SESSION["review$index"])): 
                foreach ($_SESSION["review$index"] as $review ):
                ?>
        <div class="card mb-4">
          <div class="card-body">
            <p><?= $review['comment']?></p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center"> 
                <p class="small mb-0 ms-2"><?= $review['rate']?></p>
              </div>
              <div class="star ">
                    <?php for ($i=0; $i < $review['rating'] ; $i++):    
                     ?>
                        <i class="fas fa-star "></i>
                        <?php endfor ; ?>
                    </div>
            </div>
          </div>
        </div>
                <?php
                endforeach ;
                // unset($_SESSION["review$index"]);
                endif ;
                  ?>
      </div>
    </div>
  </div>
</div> 

  

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




  