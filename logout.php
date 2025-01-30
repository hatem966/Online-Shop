<?php 
session_start();
if(isset($_SESSION['login'])){
    unset($_SESSION['login']);  // بعمل حذف ليها عشان  تظهر عندي ال logout 
}
header('Location:login.php');
?>