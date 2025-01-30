<?php
session_start();
if(isset($_POST['submit'])){
   extract($_POST);
   $errors=[];
   if($name==""){
    $errors[] = "name is required";
  }elseif(is_numeric($name)){
    $errors[]="name must be string";
  }
  if( $email==""){
      $errors[] = "email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors[]="email not correct";
    }
    if($address==""){
        $errors[] = "address is required";
      }
      if($city==""){
        $errors[] = "email is required";
      }
      if($postalCode==""){
        $errors[] = "postalcode is required";
      }
      if($phone==""){
        $errors[] = "phone is required";
      }
    //   print_r($errors);
    // $_SESSION['errors']=$errors;
   // header("location:confirmorder.php");
    // header("location:shop.php");
      if(!empty($errors)){       
        $_SESSION['errors']=$errors;
        header("Location:confirmorder.php");
         }else{ 
              header("Location:confirmOrderWelcome.php");
         }

}else{
    header("location:confirmorder.php");
}

