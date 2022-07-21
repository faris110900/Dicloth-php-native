<?php

require_once '../config/init.php';


if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];

  if (empty(trim($_GET['cari']))) {
    $error = 'Kotak pencarian belum diisi';
  } else {
    $produk = search($cari);
  }
}

$kategori = getKategori();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/images/logo.png">
  <title>Lo Suit | Category</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


  <!-- Uikit -->

  <link rel="stylesheet" href="../assets/uikit/css/uikit.min.css" />
  <script src="../assets/uikit/js/uikit.min.js"></script>
  <script src="../assets/uikit/js/uikit-icons.min.js"></script>

  <!-- bootstrap -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
  <!-- <link rel="stylesheet" href="../assets/bootstrap/css/style.css"> -->
</head>


<body>

  <?php require_once '../template/navigation.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="uk-child-width-1-2@m" uk-grid>
          <?php while ($tag = mysqli_fetch_object($kategori)) { ?>
            <div>
              <div class="uk-dark uk-background-secondary uk-padding">
                <h3 class="text-white"><?php echo $tag->keterangan; ?></h3>
                <p class="text-white">Choise with Category</p>
                <a href="<?php echo $base_url; ?>view/bykategori.php?id=<?php echo $tag->id; ?>" class="uk-button uk-button-default text-white">Check</a>
              </div>
            </div>
            <br>
          <?php } ?>
        </div>
      </div>
    </div>


  </div>

  <br><br>

  <div class="container">
    <hr class="bg-dark">
  </div>
  <?php require_once '../template/footer.php'; ?>

</body>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>

</html>