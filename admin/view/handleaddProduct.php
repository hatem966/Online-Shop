<?php
session_start();
if(isset($_POST['submit'])){
  // catch input 
  // extract($_POST);
    $cat =trim(htmlspecialchars($_POST['name']));
    $title = trim(htmlspecialchars($_POST['title']));
    $desc =trim(htmlspecialchars($_POST['desc']));
    $price =trim(htmlspecialchars($_POST['price']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
   // catch image 
   $image=$_FILES['file'];
   $image_name= $image['name'];
   $tamp_name=$image["tmp_name"];
   $ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
   
   $errors=[];
    $arr=["png","jpg","jpeg"];
    if( $image['error']!=0){
        $errors[]="image is required"; 
   }elseif(! in_array($ext,$arr)){
     $errors[]="choose correct image"; 
   }

   if($cat==""){
    $errors[] = "category is required";
  }elseif(is_numeric($cat)){
    $errors[]="category must be string";
  }
  if($title==""){
    $errors[] = "title is required";
  }elseif(is_numeric($title)){
    $errors[]="title must be string";
  }
  if($desc==""){
    $errors[] = "description is required";
  }
  if($price==""){
    $errors[] = "price is required";
  }
  if($quantity==""){
    $errors[] = "quantity is required";
  }elseif(!is_numeric($quantity)){
    $errors[]="quantity must be numeric";
  }
  $newName=uniqid().".".$ext;
// زي ما خزنت اليوزر في اراي انا هنا كمان لازم اخزن المنتجات في اراي عشان 
  $products=[
    "title"=>$title,
    "cat"=>$cat,
    "desc"=>$desc,
    "price"=>$price,
    "quantity"=>$quantity,
    "imgName"=>$newName
  ];

if(!isset($_SESSION['products'])){ //
  $_SESSION['products']=[];//
}
$_SESSION['products'][]=$products;  //true  push array 
  
if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    header("location:addProduct.php");
  }else{
      move_uploaded_file($tamp_name,"../upload/$newName"); // لاوم اتطلع بره الفولدر 
      header("location:addProduct.php"); // بيطلع الناتج في اراي )(انا فاهم يعني)
    }

}else{
    header("location:addProduct.php");
}

