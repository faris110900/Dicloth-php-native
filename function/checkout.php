<?php

function checkout($data){
    $userId = htmlspecialchars($data['user_id']);
    $produkId = htmlspecialchars($data['produk_id']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $kota = htmlspecialchars($data['kota']);
    $alamat = htmlspecialchars($data['alamat']);
    $pengirimanId = htmlspecialchars($data['pengiriman_id']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $total = htmlspecialchars($data['total']);
    $jumlah = htmlspecialchars($data['jumlah']);

    $query = "INSERT INTO pembelian (user_id, produk_id, nama, email, kota, alamat, pengiriman_id, keterangan, total, jumlah) VALUES ('$userId', '$produkId', '$nama', '$email', '$kota', '$alamat', '$pengirimanId', '$keterangan', '$total', '$jumlah')";
    return run($query);
}

function getCheckout($id){
    $query  = "SELECT pembelian.produk_id, pembelian.nama, pembelian.email, pembelian.kota, pembelian.alamat, pembelian.pengiriman_i komentar.created_at, user.name FROM pembelian INNER JOIN user ON pembelian.user_id = users.id WHERE pembelian.produk_id=$id ORDER BY pembelian.id DESC";
    return result($query);
}