<?php

    require_once '../config/init.php';

    if(!isset($_SESSION['email'])) {
        header('Location: ../view/index.php');
    } else {
        if($user->role != 1) {
            header('Location: ../view/index.php');
        }
    }

    $kategori = getKategori();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lo Suit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../assets/images/logo.png">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    

    <!-- Uikit -->
    
    <link rel="stylesheet" href="../assets/uikit/css/uikit.min.css" />
         <script src="../assets/uikit/js/uikit.min.js"></script>
         <script src="../assets/uikit/js/uikit-icons.min.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>

        <nav class="navbar navbar-light bg-white"  uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
        <a class="navbar-brand" style="font-family: 'Oswald', sans-serif; font-size:30px;" href="../view/index.php">
        <img src="../assets/images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
        Lo Suit</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

        <div class="jumbotron">
          <h1>Welcome Admin Web</h1>
        </div>

    <div class="container">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
           <a class="list-group-item text-dark" href="../view/create.php">Create Produk</a>
            <a class="list-group-item text-dark" href="produk.php">Check Produk</a>
            <a class="list-group-item text-dark" href="../kategori/create.php">Create Category</a>
            <a class="list-group-item text-dark" href="pembelian.php">Orders</a>
            <a class="list-group-item text-dark" href="user.php">User</a>
          </ul>
        </div>
      </div>

        </body>
   
   <script src="../assets/jquery/jquery.min.js"></script>
   <script src="../assets/bootstrap/js/bootstrap.js"></script>
</html>