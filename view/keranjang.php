<?php 

    require_once '../config/init.php';

       
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(isset($_GET['id'])) {
        $produk = $_GET['id'];
    }

    if(!isset($_SESSION['email'])) {
        header('Location: ../view/sale.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Lo Suit</title>

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

    <div class="container mt-3">

        <h2>Cart </h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION['cart'] as $produk => $jumlah): ?>
                       <?php $ambil = mysqli_query($connection, "SELECT * FROM produk WHERE produk.id='$produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga']*$jumlah;
                       ?>
    
                            <tr>
                                <td><?= $pecah['nama']; ?></td>
                                <td>Rp.<?= number_format($pecah['harga']); ?></td>
                                <td><?= $jumlah; ?></td>
                                <td>Rp.<?= number_format($subharga); ?></td>
                                <td><a href="hapus_keranjang.php?id=<?= $produk; ?>" class="btn btn-outline-danger">Batal</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                </table>
                <a href="sale.php" class="btn btn-dark">Lanjut Belanja</a>
                <?php if(!isset($_SESSION['email'])) { ?>
                    <a class="btn btn-outline-dark" href="<?php echo $base_url; ?>auth/login.php">Checkout</a>
                    <?php  } else { ?>
                        <a class="btn btn-outline-dark" href="checkout.php">Checkout</a>
                        <?php } ?>
            
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