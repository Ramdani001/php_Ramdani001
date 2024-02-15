<?php
require "connection.php";
$nama = $_POST['nama'];
// $alamat = $_POST['alamat'];

$query = "SELECT * 
            FROM person
            JOIN hobi ON hobi.person_id = person.id
            WHERE nama LIKE '%".$nama."%'
            ";

$cari = mysqli_query($conn, $query);

$output = mysqli_num_rows($cari);

$kirim = [];

for($i=0; $i<$output; $i++){
    $kirim[$i] = mysqli_fetch_assoc($cari);
}

$send = json_encode(["data" => $kirim]);

echo $send;