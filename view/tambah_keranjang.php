<?php 

    require_once '../config/init.php';

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        if(isset($_GET['id'])) {
            $produk = $_GET['id'];
        }


    if(isset($_SESSION['cart'][$produk])){
        $_SESSION['cart'][$produk]+=1;
    } else {
        $_SESSION['cart'][$produk] = 1;
    }
    
    // $_SESSION['cart'] = $cart;
    
    header('location:keranjang.php');


?>