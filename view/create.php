<?php
      require_once '../config/init.php';

      if(!isset($_SESSION['email'])) {
          header('Location: ../view/sale.php');
      }

      $error = '';
      $kategori = getKategori();


      if(isset($_POST['submit'])) {
    
        $data['user_id'] = $user->id;
        $data['nama'] = $_POST['nama'];
        $data['harga'] = $_POST['harga'];
        $data['warna'] = $_POST['warna'];
        $data['deskripsi'] = $_POST['deskripsi'];
        $data['ukuran'] = $_POST['ukuran'];
        $data['kategori'] = $_POST['kategori'];
        $data['nama_file'] = $_FILES['image']['name'];
        $tmp_file = $_FILES['image']['tmp_name'];

        if (!empty(trim($data['nama'])) && !empty(trim($data['deskripsi']))) {
            if(strlen($data['nama']) >= 6 && strlen($data['deskripsi']) >= 10) {
                if(create($data)) {
                    if(!empty($data['nama_file'])) {
                        $path = '../assets/image/'.$data['nama_file'];

                        if(move_uploaded_file($tmp_file, $path)) {
                            header('Location: sale.php');
                        } else {
                            $error = "Gagal mengupload foto!";
                        }
                    } else {
                        header('Location: sale.php');
                    }
                } else {
                    $error = 'Ada masalah saat menambah data!';
                }
            } else {
                $error = 'Judul minimal 6 karakter <br>
                            Konten minimal 10 karakter';
            }
        } else {
            $error = 'Judul dan Konten tidak boleh kosong!';
        }
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

    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body main">
            <?php if(!empty($error)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

        <div class="uk-margin">
            <input class="uk-input" name="nama" autocomplete="off" type="text" placeholder="Name">
        </div>
    
        <div class="uk-margin">
            <input class="uk-input" name="harga" autocomplete="off" type="number" placeholder="Harga">
        </div>

        <div class="uk-margin">
            <input class="uk-input" name="warna" autocomplete="off" type="text" placeholder="Warna">
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" name="deskripsi" rows="5" placeholder="Deskripsi Barang"></textarea>
        </div>

        <div class="uk-margin">
            <input class="uk-input" name="ukuran" autocomplete="off" type="text" placeholder="Ukuran">
        </div>

        <div class="uk-margin">
            <select class="uk-select" name="kategori" id="kategori">
                <option>Pilih</option>
                <?php while($item = mysqli_fetch_object($kategori)) { ?>
                    <option value="<?php echo $item->id; ?>"><?php echo $item->keterangan; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
                <input type="file" name="image" id="image">
            </div>
        
        <div class="uk-margin">
            <button type="submit" name="submit" class="btn btn-dark">Upload</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</body>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>
</html>