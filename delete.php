<?php
    include "koneksi.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "DELETE FROM `data_produk` WHERE id='$id'");
        header('location: Inventory.php');
    }

?>