<?php

function checkout($data) {
    $userId = escape($data['user_id']);
    $produkId = escape($data['produk_id']);
    $nama = escape($data['nama']);
    $email = escape($data['email']);
    $kota = escape($data['kota']);
    $alamat = escape($data['alamat']);
    $pengirimanId = escape($data['pengiriman_id']);
    $keterangan = escape($data['keterangan']);
    $total = escape($data['total']);
    $jumlah = escape($data['jumlah']);
    
    $query = "INSERT INTO pembelian (user_id, produk_id, nama, email, kota, alamat, pengiriman_id, keterangan, total, jumlah) VALUES ('$userId', '$produkId', '$nama', '$email', '$kota', '$alamat', '$pengirimanId', '$keterangan', '$total', '$jumlah')";
    return run($query);
}

function getCheckout($id){
    $query  = "SELECT pembelian.produk_id, pembelian.nama, pembelian.email, pembelian.kota, pembelian.alamat, pembelian.pengiriman_i komentar.created_at, user.name FROM pembelian INNER JOIN user ON pembelian.user_id = users.id WHERE pembelian.produk_id=$id ORDER BY pembelian.id DESC";
    return result($query);
}