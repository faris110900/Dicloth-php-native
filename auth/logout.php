<?php

    require_once '../config/init.php';
    $error = '';

    if(isset($_SESSION['email'])) {
        header('Location: ../view/sale.php');
    }

    unset($_SESSION['nama']);
    session_destroy();

    header('Location: ../view/index.php');
