<?php
include "header.php";
include "navbar.php";

?>
<?php
    session_start();
    if(!empty($_SESSION['errors']))
    {
     foreach($_SESSION['errors'] as $error)
     {?>
         <div class="alert alert-danger"><?php echo $error ?></div>
    <?php }
    unset($_SESSION['errors']);
        }
     ?>

<section id="cart-add" class="section-p1">
    <form>
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" name="coupon" placeholder="Enter coupon code">
            <button class="normal" type="submit" >Apply</button>
        </div>
        </form>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <form action= "handleconfirmOrder.php" class=" col-4"method ="POST">
                name<input type="text" name="name" >
               email <input type="email" name="email">
                address<input type="text" name="address" >
                city<input type="text" name="city">
                postalCode<input type="number" name="postalCode">
                phone<input type="text" name="phone">
                paymentType<select >
                <option value="Cash_on_Delivery">Cash on Delivery</option>
                    <option value="Credit_Card">Credit Card</option>
                    <option value="Fawry">Fawry</option>
                </select>
                <button class="normal" type="submit" name="submit">proceed to checkout</button>
            </form>
           
        </div>
    </section>


    <?php include "footer.php" ?>