<?php

    require_once '../config/init.php';

    $error = '';
    

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $produk = find($id);

        $item = mysqli_fetch_object($produk);
    }
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

        <nav class="navbar navbar-light bg-muted"  uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
        <a class="navbar-brand" style="font-family: 'Oswald', sans-serif; font-size:30px;" href="../view/index.php">
        <img src="../assets/images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
        Lo Suit</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

    <div class="container-fluid">
        <div class="row"> 
            <div class="col-sm-5 mt-5" style="margin-left: 100px;">
            <?php if(!empty($item->image)) { ?>
            <img data-src="../assets/image/<?php echo $item->image; ?>" width="1800" height="1200" alt="" uk-img>
            <?php } ?>
           <br><br>
            <!-- <img data-src="https://static.zara.net/photos///2019/V/0/2/p/1564/480/704/5/w/1024/1564480704_2_2_1.jpg?ts=1545647306520" width="1800" height="1200" alt="" uk-img> -->
            </div>
            <div class="col"  style="margin-top: 200px; margin-left:80px;">
            <div class="uk-child" uk-grid>
                <div>
                        <div class="uk-text-left uk-card-body">
                           <h6><?php echo $item->nama; ?></h6>
                           <h6><?php echo number_format($item->harga); ?> IDR</h6>
                           <br>
                           <p class="text-muted" style="font-size: 12px;"><?= $item->warna; ?></p>
                           <p style="font-size: 12px;"><<?php echo $item->ukuran; ?></p>
                           <p><?= $item->deskripsi; ?></p>

                        <?php if(isset($_SESSION['email'])) { ?>
                           <a href="tambah_keranjang.php?id=<?php echo $item->id; ?>" class="btn btn-dark">BUY &nbsp;<span uk-icon="tag"></span></a>
                        <?php } else { ?>
                            <a href="../auth/login.php" class="btn btn-dark">BUY &nbsp;<span uk-icon="tag"></span></a>
                        <?php } ?>

                         <?php if(isset($_SESSION['email'])) { ?>
                             <?php if($user->role == 1) { ?>
                                <a href="edit.php?id=<?php echo $item->id; ?>" class="btn btn-outline-warning">Edit</a> 
                                <a href="delete.php?id=<?php echo $item->id; ?>" class="btn btn-outline-danger">Delete</a> 
                             <?php }?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="container">
        <hr class="bg-dark">
    </div>
    <br><br>
    <?php require_once '../template/footer.php'; ?>
   
   </body>
   
       <script src="../assets/jquery/jquery.min.js"></script>
       <script src="../assets/bootstrap/js/bootstrap.js"></script>
   </html>