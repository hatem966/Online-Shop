<!DOCTYPE html>
<?php 
session_start();
 ?>
<head>

<?php 
// echo $_SESSION['lang'];
if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}else{
    $lang="en";
}

if($lang == "ar"){
    require_once 'arabic.php';
  }else{
    require_once 'english.php';
  }

?>
    <!-- Start Links -->
    <link rel="stylesheet" href="css/splide.min.css">
    <link rel="stylesheet" href="css/splide-core.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Start Home Style -->
    <link rel="stylesheet" href="css/index_style.css">
    <!-- End Home Style -->

    <!-- Start Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,400&display=swap" rel="stylesheet">
    <!-- End Google Fonts -->

    <!-- End Links -->

    <title>online shop</title>

</head>


<body>