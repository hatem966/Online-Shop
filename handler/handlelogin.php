<?php
session_start();

if (isset($_POST['submit'])){
    $email =trim(htmlspecialchars($_POST['email']));
    $password =trim(htmlspecialchars($_POST['password']));
  

    $errors = [];
    if( $email==""){
        $errors[] = "email is required";
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="email not correct";
      }
      if( $password==""){
        $errors[] = "password is required";
      }elseif(!is_numeric($password)){
        $errors[]="password must be number";
      }elseif(strlen($password)<6){
        $errors[]="password must be more than 6 ";
      }
      // $_SESSION['errors']=$errors;
    
      if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("Location:../login.php");
        exit();
        }else{
          if(!isset($_SESSION['users'])){
            $_SESSION['users']=[];
          }
          $_SESSION['users'][] =$user ;
          
          $email_col= array_column($_SESSION['users'],'email');  // انا هنا بمسك ال ثةشهم الخاص باليوز 
          $password_col= array_column($_SESSION['users'],'password'); // هنا بمسك ال باسورد بتاعو عشان مينفعش ادخل اسم شخص ب باسورد حد تاني وانا تحت عامل كدا وبخزن ال ايرور ده
         
          $email_key= array_search($email,$email_col);  // انا هنا بتاكد هل اللايميل ده بتاع الشخص 
          $password_key= array_search($password,$password_col);// انا هنا بتاكد كمان عشان لو اه هما بتوع الشخص هروح ال shop

            if(in_array($email,$email_col)&& in_array($password,$password_col) &&  $email_key == $password_key ){
             
              if(!isset($_SESSION['user'])){
                $_SESSION['user']=[];
              }
              $_SESSION['user']= $_SESSION['users'][$email_key]; //  انا هنا بمسك ال المستخدم اللي موجود السيشن ب الايميل بتاعو 
              
              if(!isset($_SESSION['login'])){
                $_SESSION['login']=[];
              }
              $_SESSION['login']=true ;  // عشان لم اعوز اغير login ب logout 
              header("location:../shop.php");
                exit();
            }elseif($_COOKIE['email']==$email && $_COOKIE['password']==$password){ //  انا هنا ممكن كمان اخلي الادمن استاتيك عشان لو حبيت اغيرو كل فتره يبقى براحتي
                if(isset($_POST['remember'])) {
                    setcookie('remember','checked',time()+60*60*14);
                }
                header('location:../admin/view/layout.php'); 
                exit();
            }else{
              $_SESSION['errors'][]="email or password is wrong"; 
              header("Location:../login.php");
            }
        }

}else{
    header('Location:../login.php');
}

?>




