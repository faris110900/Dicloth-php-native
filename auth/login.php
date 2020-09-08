<?php

    require_once '../config/init.php';
    
    $error = '';

    if(isset($_SESSION['email'])) {
        header('Location: ../view/sale.php');
    }

    if(isset($_POST['submit'])) {
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];

        if (!empty(trim($data['email'])) && !empty(trim($data['password']))) {
            if(strlen($data['email']) >= 6 && strlen($data['password']) >= 8) {
                if(login($data)) {
                    $_SESSION['email'] = $data['email'];
                    header('Location: ../view/sale.php');
                } else {
                    $error = 'Login gagal!';
                }
            } else {
                $error = 'Email minimal 6 karakter <br>
                            Password minimal 8 karakter';
            }
        } else {
            $error = 'Email dan Password tidak boleh kosong!';
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

    <div class="container mt-4">
    <div class="card-body">
        <?php if(!empty($error)){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <center><h1 style="font-family: 'Oswald', sans-serif;">Login</h1></center>
        <br><br>

    <div class="konten d-flex justify-content-center">
        <form method="POST" action="" enctype="multipart/form-data">

        <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input id="email" name="email" autocomplete="off" class="uk-input uk-form-width-large" type="text" placeholder="Email">
        </div>
    </div>

        <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: lock"></span>
            <input id="password" name="password" autocomplete="off" class="uk-input uk-form-width-large" type="password" placeholder="Password">
        </div>
    </div>

        <button type="submit" name="submit" class="btn btn-dark">Login</button>
        <a href="register.php" class="btn btn-outline-dark">Register</a>
                  
            </form>
        </div>
    </div>

    
    <br><br><br><br><br>

    <hr>

    <?php require_once '../template/footer.php'; ?>
   
   </body>
   
       <script src="../assets/jquery/jquery.min.js"></script>
       <script src="../assets/bootstrap/js/bootstrap.js"></script>
   </html>
