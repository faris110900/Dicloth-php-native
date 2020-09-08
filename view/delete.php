<?php

    require_once '../config/init.php';

    if(!isset($_SESSION['email'])) {
        header('Location: ../view/sale.php');
    } else {
        if($user->role != 1) {
            header('Location: ../view/sale.php');
        }
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $produk = find($id);

        $item = mysqli_fetch_object($produk);

        if ($user->role == 1 || $item->user_id == $user->id) {
            if(!empty($item->image)) {
                unlink('../assets/image/'.$item->image);
            }

            if(delete($id)) {
                header('Location: index.php');
            } else {
                echo 'Gagal menghapus artikel!';
            }
        } else {
            header('Location: ../product/index.php');
        }

    } else {
        header('Location: admin.php');
    }
