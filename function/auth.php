<?php

    function register($data){
        $nama = escape($data['nama']);
        $email = escape($data['email']);
        $kota = escape($data['kota']);
        $password = escape($data['password']);
        $password = md5($password);

        $query = "INSERT INTO user (name, email, kota, password, role) VALUES ('$nama', '$email', '$kota', '$password', 0)";
        return run($query);
    }

    function login($data) {
        $email = escape($data['email']);
        $password = escape($data['password']);
        $password = md5($password);

        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        global $connection;

        if($result = mysqli_query($connection, $query)){
            if(mysqli_num_rows($result) != 0)return true;
            else return false;
        }
    }

    function get_user($email){
        $query = "SELECT * FROM user WHERE email = '$email'";
        return result($query);
    }

    function getUser(){
        $query = "SELECT * FROM user";
        return result($query);
    }
