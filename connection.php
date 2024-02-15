<?php

$servername = "localhost";
$database = "testdb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if(!$conn){
    die("Koneksi Gagal : " . mysqli_connect_error());
}