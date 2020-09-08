<?php
    require_once '../config/init.php';
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
    
</head>
<body>

    <?php require_once '../template/navigation.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
            <br><br><h1 style="font-family: 'Oswald', sans-serif; font-size: 80px;">Lo Suit</h1>
                <p>Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.
                    Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your
                     entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.</p>
                     <a href="../view/sale.php" class="btn btn-dark">Go Shop</a>
                     <button class="btn btn-outline-dark">Collection</button>
            </div>
            <div class="col-lg mt-5">
            <img src="../assets/images/banner.png" alt="">
            </div>
        </div>
        </div>

<br><br><br><br>
<!-- Sidebar -->

    <div class="jumbotron mt-5">
    <div class="card-deck">
  <div class="card border-dark">
    <img src="../assets/images/tuxedo.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">TUXEDO</h5>
      <p class="card-text">Blazer with a rounded tuxedo collar. Featuring two front flap pockets, one besom pocket at the chest, lining with an inside pocket, two back vents and fastening in the front with lined buttons.</p>
      <a href="sale.php" class="btn btn-dark">Check on Sale</a>
    </div>
  </div>
  <div class="card border-dark">
    <img src="../assets/images/textured.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">TEXTURED SUIT</h5>
      <p class="card-text">Long sleeve blazer in textured fabric. Featuring a lapel collar, flap pockets at the hip, a chest welt pocket, lining with an inside pocket, two back vents and button fastening in the front.
</p>
      <a href="sale.php" class="btn btn-dark">Check on Sale</a>
    </div>
  </div>
  <div class="card border-dark">
    <img src="../assets/images/comfort.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">CHINTZ COMFORT SUITs</h5>
      <p class="card-text">Plain blazer featuring a notched lapel collar with a contrast pin detail in the buttonhole. Featuring two front flap pockets, one besom pocket at the chest with a contrast pocket square, lining with two inside pockets, a double back vent, buttoned cuffs and button fastening in the front.</p>
      <a href="sale.php" class="btn btn-dark">Check on Sale </a>
    </div>
  </div>
</div>
</div>

<br>
<hr class="bg-dark">
<br>
    <?php require_once '../template/footer.php'; ?>
   
</body>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</html>