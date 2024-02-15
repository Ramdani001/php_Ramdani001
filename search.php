<?php
require "connection.php";
$nama = $_POST['nama'];
// $alamat = $_POST['alamat'];

$query = "SELECT *
            FROM hobi
            JOIN person ON person.id = hobi.person_id
            WHERE nama  LIKE '%".$nama."%'
            ";

$cari = mysqli_query($conn, $query);

$output = mysqli_fetch_assoc($cari);

echo json_encode($output);