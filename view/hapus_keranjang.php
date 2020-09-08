<?php

require_once '../config/init.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(isset($_GET['id'])) {
        $produk = $_GET['id'];
    }

    unset($_SESSION['cart'][$produk]);

    echo '<td>';
    echo ' <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>';
    echo '</td>';
    echo "<script>location='keranjang.php';</script>";

?>