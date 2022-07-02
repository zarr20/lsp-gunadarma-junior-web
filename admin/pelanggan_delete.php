<?php
include("../config.php");
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $sql = "DELETE FROM `users` WHERE `id` = $id;";

    $query = mysqli_multi_query($conn, $sql);

    if( $query ) {
        header("location: ./pelanggan.php");
    } else {
        echo 'Error ' . mysqli_error($conn);
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
    }
}

?>