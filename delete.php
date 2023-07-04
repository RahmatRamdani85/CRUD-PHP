<?php

include('koneksi.php');

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM tabel_produk WHERE id = '$id'");
//mysqli_query($conn, "DELETE FROM tabel_produk WHERE id = '$id'");
// mysqli_query($conn, "DELETE FROM ...... WHERE id = '$id'");
}

header('location:/index.php');
exit;
?>