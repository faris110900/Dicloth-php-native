<?php

    require_once '../config/init.php';

    if(!isset($_SESSION['email'])) {
        header('Location: ../view/sale.php');
    }

    if(isset($_GET['id'])) {
        $produk = find($id);

        $item = mysqli_fetch_object($produk);

    if(isset($_POST['submit'])) {
       
        $data['user_id'] = $user->id;
        $data['produk_id'] = $item->id;
        $data['pengiriman_id'] = $pengiriman->id;
        $data['nama'] = $_POST['nama'];
        $data['email'] = $_POST['email'];
        $data['kota'] = $_POST['kota'];
        $data['alamat'] = $_POST['alamat'];
        $data['keterangan'] = $_POST['keterangan'];
        $data['total'] = $totalbayar;
        $data['jumlah'] = $jumlah;

            if(checkout($data)) {
                return('Location:../view/nota.php');
            }  else {
                $error = 'Ada masalah saat Checkout!';
            }

        }
    }

    
    $pengiriman = getPengiriman();
    $profile = mysqli_fetch_object(get_user($_SESSION['email']));

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
    <div class="card-body main">
            <?php if(!empty($error)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

        <h2>Cart </h2>
   
        <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $totalbayar = 0; ?>
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
                            </tr>
                            <?php $totalbayar+=$subharga;?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total Pemabyaran</th>
                                <th>Rp.<?php echo number_format($totalbayar);?></th>
                            </tr>
                        </tfoot>
                </table>
            
        <br>

        <h2>Data Pembeli</h2>
    <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>Nama Pembeli</b></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $profile->name; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>Email Pembeli</b></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $profile->email ;?>">
                 </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>Kota Pengiriman</b></label>
                     <input type="text" class="form-control" name="kota" id="kota" value="<?php echo $profile->kota; ?>">
                 </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>Total Belanja</b></label>
                     <input type="text" class="form-control" name="total" id="total" readonly value="Rp.<?php echo number_format($totalbayar); ?>">
                 </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>Alamat Pengiriman</b></label>
                     <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $profile->alamat; ?>">
                 </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="nama"><b>Kurir</b></label>
                <select class="uk-select" name="pengiriman" id="pengiriman">
                        <option>Pilih Kurir</option>
                        <?php while($item = mysqli_fetch_object($pengiriman)) { ?>
                            <option value="<?php echo $item->id; ?>"><?php echo $item->kurir; ?> - Rp.<?php echo number_format($item->tarif);?></option>
                        <?php } ?>
                    </select>
                 </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="nama"><b>keterangan</b></label>
                  <textarea type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off" id="keterangan"></textarea>
                 </div>
            </div>  
        </div>

           <button class="btn btn-dark" type="submit" name="submit" id="submit">Checkout</button>
           
        </form>
    </div>

    

<br><br>
    <div class="container">
            <hr class="bg-dark">
        </div>
        <br>
    <?php require_once '../template/footer.php'; ?>
   
   </body>
   
       <script src="../assets/jquery/jquery.min.js"></script>
       <script src="../assets/bootstrap/js/bootstrap.js"></script>
   </html>