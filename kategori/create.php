<?php

    require_once '../config/init.php';

    if(!isset($_SESSION['email'])) {
        header('Location: ../view/index.php');
    } else {
        if($user->role != 1) {
            header('Location: ../view/index.php');
        }
    }

    $error = '';

    if(isset($_POST['submit'])) {
        $data['keterangan'] = $_POST['keterangan'];

        if (!empty(trim($data['keterangan']))) {
            if(strlen($data['keterangan']) >= 4) {
                if(createKategori($data)) {
                    header('Location: index.php');
                } else {
                    $error = 'Ada masalah saat menambah data!';
                }
            } else {
                $error = 'Keterangan kategori minimal 4 karakter!';
            }
        } else {
            $error = 'Keterangan tidak boleh kosong!';
        }
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

        <nav class="navbar navbar-light bg-white">
        <a class="navbar-brand text-dark" style="font-family: 'Oswald', cursive; font-size: 30px;" href="index.php">
            <img src="../assets/images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
            &nbsp;Lo Suit
        </a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

<div class="container mt-3">
          <div class="row pt-4">
            <div class="col-md-9 col-xs-12 pl-4">
                <div class="card">
                    <div class="card-header text-center">
                        Create Category
                    </div>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?php if(!empty($error)){ ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $error; ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            
                            <div class="uk-margin">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" autocomplete="off" class="uk-input" id="keterangan" placeholder="Keterangan">
                            </div>
                            

                        </div>

                        <div class="card-footer text-muted text-center">
                            <button type="submit" name="submit" class="btn btn-dark">Tambahkan</button>
                            <a href="index.php" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>

            </div>
        </div>

    </body>
    
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>