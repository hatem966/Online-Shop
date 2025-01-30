<?php 
// session_start();
// $_SESSION['usercart']=[];
include 'header.php' ?>
<?php include 'navbar.php';

if(!isset($_SESSION['login'])){
    header('Location:login.php');
  }
  
?>

<?php
if(isset($_POST['submit'])){

  $index=$_GET['index'];

  $cart=$_SESSION['products'][$index];  //   اندكس مسكت كل حاجه جايه من ال product 
  // cart هنا تحول الي اراي 
  $userquantity=$_POST['quantity'];

  if(empty($userquantity) && $userquantity!= 0){
    $userquantity=1;
  }

  $errors=[];

  if(!is_numeric($userquantity) || $userquantity < 1){
    $errors[]="quantity not valid";
  }elseif($userquantity > $cart['quantity']){
    $errors[]="quantity not valid";
  }else{
    $_SESSION['products'][$index]['quantity'] -= $userquantity; // انا هنا بطرح ال كميه الخاصه بالمنتج الاساسي بالكميه اللي دخلها المستخدم
    $quantityofroduct =['userquantity'=> $userquantity];
   
    $finalcart = array_merge($cart, $quantityofroduct);



    if(!isset($_SESSION['usercart'])){
        $_SESSION['usercart'];
    }
    $_SESSION['usercart'][]=$finalcart ; // انا بخزن القميه الجديده في usercart
    // انا دلوقتي دي بقى فيها كل حاجه وهلوب بيها 
}
if(!empty($errors)){
    $_SESSION['errors']= $errors;
    header('location:shop.php');
}
// انا في الاول مسكت كل حاجه في cart من ال session products  index بتاع ال منتج 
// بعد كدا عملت اراي ميرج وبقيت ماسك كل حاجه في final cart 
// وبعدين خزنت ال final cart في session user cart 
// اذا دلوقتي كل حاجه في ال user cart 
// final cart contain     $products=[
//     "title"=>$title,
//     "cat"=>$cat,
//     "desc"=>$desc,
//     "price"=>$price,
//     "quantity"=>$quantity,
//     "imgName"=>$newName
//   ];  ++++ userquantity 
}
?>

<!-- table -->
<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
        <?php if (isset($_SESSION['usercart'])) :
        $finalprice=0;
        $index=0;
            foreach($_SESSION['usercart'] as $item) :
                $subtotal= $item['price'] * $item['userquantity'];
        ?>
                <tr>
                    <td><img src="admin/upload/<?= $item['imgName']?>" alt="product1"></td>
                    <td><?= $item['title']?></td>
                    <td><?= $item['desc']?></td>
                    <td><?= $item['userquantity']?></td>
                    <td><?= $item['price']?></td>
                    <td><?=  $subtotal ?></td>
                
                    <form action="handleremoveproduct.php?index=<?=$index?>" method="POST">
                        <td><button type="submit" name="submit" class="btn btn-danger">Remove</button></td>
                    </form>
                </tr>
        <?php
         $finalprice +=$subtotal;
         $index ++;
            endforeach;
        endif;
        ?>
                </tr>
            </tbody>
            <!-- confirm order  -->
            <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?=$subtotal ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?= $finalprice ?></strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

    <?php include "footer.php" ?>

