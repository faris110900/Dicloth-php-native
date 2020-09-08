<?php

function getOrders(){
    $query  = "SELECT * FROM pembelian JOIN user ON pembelian.user_id=user.id";
    return result($query);
}

function detail(){
    $query = "SELECT * FROM pembelian JOIN user ON pembelian.user_id=user.id WHERE pembelian.id";
    return result($query);
}