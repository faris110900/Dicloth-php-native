<?php

    function get($start, $perPage){
        $query  = "SELECT produk.id, produk.nama, produk.harga, produk.warna, produk.deskripsi, produk.ukuran, produk.image, produk.created_at, user.name, kategori.keterangan AS kategori FROM produk INNER JOIN user ON produk.user_id = user.id LEFT JOIN kategori ON produk.kategori_id = kategori.id LIMIT $start, $perPage";
        return result($query);
    }

    function byKategori($params){
        $query  = "SELECT produk.id, produk.nama, produk.harga, produk.warna, produk.deskripsi, produk.ukuran, produk.image, produk.created_at, user.name, kategori.keterangan AS kategori FROM produk INNER JOIN user ON produk.user_id = user.id LEFT JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.kategori_id=$params";
        return result($query);
    }

    function new_produk($limit){
        $query  = "SELECT produk.id, produk.nama, produk.harga, produk.warna, produk.deskripsi, produk.ukuran, produk.image, produk.created_at, user.name, kategori.keterangan AS kategori FROM produk INNER JOIN user ON produk.user_id = user.id LEFT JOIN kategori ON produk.kategori_id = kategori.id ORDER BY produk.created_at DESC LIMIT $limit";
        return result($query);
    }

    function all(){
        $query = "SELECT * FROM produk";
        return result($query);
    }

    function find($id){
        $query  = "SELECT produk.id, produk.user_id, produk.harga, produk.warna, produk.kategori_id, produk.nama, produk.deskripsi, produk.ukuran, produk.image, produk.created_at, user.name, kategori.keterangan AS kategori FROM produk INNER JOIN user ON produk.user_id = user.id LEFT JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.id=$id";
        return result($query);
    }

    function search($params){
        $query = "SELECT produk.id, produk.nama, produk.harga, produk.warna, produk.deskripsi, produk.ukuran, produk.image, produk.created_at, user.name, kategori.keterangan AS kategori FROM produk INNER JOIN user ON produk.user_id = user.id LEFT JOIN kategori ON produk.kategori_id = kategori.id WHERE nama LIKE '%$params%' OR deskripsi LIKE '%$params%'";
        return result($query);
    }

    function create($data){
        $userId = escape($data['user_id']);
        $kategori = escape($data['kategori']);
        $nama = escape($data['nama']);
        $harga = escape($data['harga']);
        $warna = escape($data['warna']);
        $deskripsi = escape($data['deskripsi']);
        $ukuran = escape($data['ukuran']);
        $images = escape($data['nama_file']);

        $query = "INSERT INTO produk (user_id, kategori_id, nama, harga, warna, deskripsi, ukuran, image) VALUES ('$userId', '$kategori', '$nama', '$harga', '$warna', '$deskripsi','$ukuran', '$images')";
        return run($query);
    }

    function update($data, $id){
        $kategori = escape($data['kategori']);
        $nama = escape($data['nama']);
        $harga = escape($data['harga']);
        $warna = escape($data['warna']);
        $deskripsi = escape($data['deskripsi']);
        $ukuran = escape($data['ukuran']);
        $images = escape($data['nama_file']);

        $query = "UPDATE produk SET kategori_id='$kategori', image='$images', nama='$nama', harga='$harga', warna='$warna', deskripsi='$deskripsi', ukuran='$ukuran' WHERE id=$id";
        return run($query);
    }

    function delete($id){
        $query = "DELETE FROM produk WHERE id=$id";
        return run($query);
    }
