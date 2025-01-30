<?php
session_start();
  if (isset($_POST['submit'])){
    // catch data 
    // extract($_POST);
    $username =trim(htmlspecialchars($_POST['name']));
    $email =trim(htmlspecialchars($_POST['email']));
    $password =trim(htmlspecialchars($_POST['password']));
    $phone =trim(htmlspecialchars($_POST['phone']));
    $address =trim(htmlspecialchars($_POST['address']));
    
  
    $errors = [];
    // validatiion 
    if( $username==""){
        $errors[] = "name is required";
      }elseif(is_numeric( $username)){
        $errors[]="name must be string";
      }elseif(strlen($username)>100){
        $errors[]="name must be less than 100 char ";
      }
      if(!isset($_SESSION['users'])){
        $_SESSION['users']=[]; // بستخدم function array push 
      }
     
     $email_col = array_column($_SESSION['users'],'email'); // array column الفائده منها انها بتحفظ بداخلها جميع الايميلات اللي موجوده في session users
      if( $email==""){
        $errors[] = "email is required";
      }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="email not correct";
      } else if(in_array($email, $email_col)){ // انا هنا بتشيك هل الايميل ده موجود عندي قبل كدا ولا لا
        $errors[]="email is already exist ";
      }

      if( $password==""){
        $errors[] = "password is required";
      }else if(!is_numeric($password)){
        $errors[]="password must be number";
      }else if(strlen($password)<6){
        $errors[]="password must be more than 6 ";
      }
   //   $phonePattern = '/^\+20\s1[0-9]\s\d{4}\s\d{4}$/';
      if( $phone==""){
        $errors[] = "phone is required";   
      } 
      //  } elseif (!preg_match($phonePattern, $phone)) { // Check if the entered phone number matches the pattern
      // // Invalid phone number, handle the error
      //    $errors[] = "Please enter a valid Egyptian phone number.";
      //   }
    if( $address==""){
        $errors[] = "address is required";
    }
 // مفروض اخزن جميع اليوزر في array 
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("Location:../signup.php");
        }else{
          $user=[
            "username"=>$username,
            "email"=>$email,
            "password"=>$password,
            "phone"=>$phone,
            "address"=>$address
          ];
          // if(!isset($_SESSION['users'])){
          //   $_SESSION['users']=[]; // بستخدم function array push 
          // }
          $_SESSION['users'][] =$user ;
            header("Location:../login.php");
            exit();
        }
  }else{
    header("Location:../signup.php");
  }