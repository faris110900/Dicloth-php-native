<?php

function getPengiriman(){
    $query  = "SELECT * FROM pengiriman WHERE id";
    return result($query);
}