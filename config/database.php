<?php
// $server   = "localhost";
// $username = "root";
// $password = "";
// $database = "pbarang";

$server   = "dimsum-order.d3v.site";
$username = "u1561199_dimsum_order";
$password = "RIParip_69";
$database = "u1561199_dimsum_order";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>