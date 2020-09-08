<?php

    session_start();
    $base_url = 'http://localhost/locloth/';

    require_once '../function/connection.php';
    require_once '../function/control.php';
    require_once '../function/produk.php';
    require_once '../function/auth.php';
    require_once '../function/kategori.php';
    require_once '../function/pengiriman.php';
    require_once '../function/oders.php';
    require_once '../function/pembelian_produk.php';
    require_once '../function/checkout.php';


    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user = mysqli_fetch_object(get_user($email));
    }
