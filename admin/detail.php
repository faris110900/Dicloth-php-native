<?php

    require_once '../config/init.php';

    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $pembelian_produk = getDetail();

        $item = mysqli_fetch_object($pembelian_produk);
    


   $orders = getOrders();
    
     $beli = mysqli_fetch_object($orders);
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
          <h1>Detail Pembelian</h1>
        </div>

    <div class="container"> 
        <div class="row">
            <div class="col-sm-3">
            <strong><?php echo $beli->name;?></strong>
            <br>
            <p><?php echo $beli->email; ?>  <br>
                <?php echo $beli->kota; ?>  <br>
                <?php echo $beli->alamat; ?>
            </p>

            <p><?php echo $beli->created_at?>   <br>
                <b>Total Bayar :</b> Rp.<?php echo number_format($beli->total);?>
            </p>
        </div>
        
        <div class="col-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    
                <tbody>
                    <tr>
                        <td><?php echo $item->nama; ?></td>
                        <td><?php echo number_format($item->harga); ?></td>
                        <td><?php echo $item->jumlah; ?></td>
                        <td><?php echo number_format($beli->total); ?></td>
                    </tr>
                </tbody>

                </table>
                <div class="card">
                <div class="container">
                    <h5>Keterangan Pembeli</h5> <br>
                    <p><?php echo $beli->keterangan;?></p>
                </div>
                 </div>
                    </div>
             </div>
        </div>
    <?php }  ?>
        </body>
   
   <script src="../assets/jquery/jquery.min.js"></script>
   <script src="../assets/bootstrap/js/bootstrap.js"></script>
</html>