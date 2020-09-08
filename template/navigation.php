<?php

require_once '../config/init.php';
 
 if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

  
  $tags = getKategori();

  if(isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    if(empty(trim($_GET['cari']))) {
      $error = 'Kotak pencarian belum diisi';
    } else {
      $produk = search($cari);
    }
  }

?>

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<nav class="navbar navbar-light bg-white">
<a class="navbar-brand text-dark" style="font-family: 'Oswald', sans-serif; font-size: 30px;" href="index.php">
    <img src="../assets/images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
    &nbsp; <b>Lo Suit</b>
  </a>
  <form class="form-inline" action="../view/sale.php" method="get">
    <input class="form-control mr-sm-2" type="search" name="cari" autocomplete="off" placeholder="Cari ....." aria-label="Search">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><span uk-icon="search"></span></button>
  </form>
</nav>

<nav class="navbar navbar-expand-lg navbar-muted bg-white" uk-sticky="bottom: #offset">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;"href="../view/index.php">Home <hr class="bg-dark"></a>
      <a class="nav-item nav-link text-danger" style="font-family: 'Oswald', sans-serif;" href="../view/sale.php">SALE<hr class="bg-dark"></a>
      <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;" href="../kategori/index.php">Category<hr class="bg-dark"></a>
      <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;" href="../view/stories.php">Stories<hr class="bg-dark"></a>
      <?php if(isset($_SESSION['email'])) { ?>
        <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;" href="../auth/logout.php">Logout<hr class="bg-dark"></a>
        <?php } else { ?>
      <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;" href="../auth/login.php">Login<hr class="bg-dark"></a>
        <?php } ?>

        <?php if(isset($_SESSION['email'])) { ?>
        <?php if($user->role == 1) { ?>
          <a class="nav-item nav-link text-dark" style="font-family: 'Oswald', sans-serif;" href="../admin/index.php">Admin<hr class="bg-dark"></a>
        <?php } ?>
      <?php } ?>
      
    </div>
  </div>
</nav>