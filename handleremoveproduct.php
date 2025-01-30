
<?php
session_start();
if(isset($_POST['submit'])){
    $index=$_GET['index'];

    $_SESSION['usercart']=array_values($_SESSION['usercart']); 
    unset($_SESSION['usercart'][$index]);

}
header('location:cart.php');
