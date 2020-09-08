<?php

function getDetail(){
    $query  = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk";
    return result($query);
}
