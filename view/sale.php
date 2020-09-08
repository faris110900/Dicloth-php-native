<?php

    require_once '../config/init.php';

   
    $perPage = 12;
    $page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start   = ($page > 1) ? ($page * $perPage) - $perPage : 0;
    $produk = get($start, $perPage);

    $prev = $page - 1;
    $next = $page + 1;

    $result  = all();
    $total   = mysqli_num_rows($result);
    $pages   = ceil($total/$perPage);

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

<style>
       .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 10px;
        padding: 10px;
      }
</style>

<body>

        <?php require_once '../template/navigation.php'; ?>
           

        <div class="container-fluid mt-3"> 
    <div class="row">
            <!-- <div class="col-md-10 col-xs-20 pl-10"> -->
            <div class="col">
                <div class="grid-container">
                    <?php while($item = mysqli_fetch_object($produk)) { ?>
                    <a href="show.php?id=<?php echo $item->id; ?>">
                        <div class="card">
                            <?php if(!empty($item->image)) { ?>
                                <img class="card-img-top" style="height: 300px; width: 100%;object-fit: contain;" src="../assets/image/<?php echo $item->image; ?>" alt="Card image cap">
                            <?php } ?>

                            <div class="card-body">
                                <b><h5 class="card-title">
                                    <a href="show.php?id=<?php echo $item->id; ?>" class="text-dark">
                                        <?php echo $item->nama; ?>
                                    </a>
                                </h5></b>

                                <p>
                                  <b><i>  Rp.<?php echo number_format($item->harga); ?>  </i></b>
                                </p>

                                <a href="show.php?id=<?php echo $item->id; ?>" class="btn btn-dark">Lihat &nbsp;<span uk-icon="tag"></span></a>
                             <?php if(!isset($_SESSION['email'])) { ?>
                                <a href="<?php echo $base_url; ?>auth/login.php" class="btn btn-outline-dark">Cart &nbsp;<span uk-icon="cart"></span></a>
                            <?php  } else { ?>
                                    <a href="tambah_keranjang.php?id=<?php echo $item->id; ?>" class="btn btn-outline-dark">Cart &nbsp;<span uk-icon="cart"></span></a>
                                <?php } ?>
                            </div>

                            
                        </div>
                    <?php } ?>
                </div>
                </a>
    
                <nav aria-label="Page navigation example" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php for($pageNumber = 1; $pageNumber <= $pages; $pageNumber++){ ?>
                            <li class="page-item"><a class="page-link text-dark" href="?page=<?php echo $pageNumber; ?>"><?php echo $pageNumber; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>

    <br><br>
    <div class="container">
            <hr class="bg-dark">
        </div>
    <?php require_once '../template/footer.php'; ?>
   
   </body>
   
       <script src="../assets/jquery/jquery.min.js"></script>
       <script src="../assets/bootstrap/js/bootstrap.js"></script>
   </html>