<?php 

include("./components/header.php");
include("../config.php");

?>



<?php
if (isset($_POST['submit'])) {

    $tanggal_ambil = $_POST['tanggal-ambil'];


     
        // echo "Upload berhasil!<br/>";
        // echo "Link: <a href='"."../uploads/produk/".$namaFile."'>".$namaFile."</a>";

        $sql = "INSERT INTO `kursus_daftar`( `id_user`, `id_kursus`, `ambil_kursus`, `status`) 
        VALUES ('2','1','$tanggal_ambil','mendaftar');";
    
        $query = mysqli_multi_query($conn, $sql);
    
        if( $query ) {
            echo "<script> alert('Daftar Berhasil') </script>";
           
        } else {
            echo "<script> alert('Gagal mendaftar!') </script>";
            echo 'Error ' . mysqli_error($conn);
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // exit;
        }

      
   
}

?>


<div class="container d-flex flex-column " style="min-height:500px; align-items: center; justify-content: center;">
    <form method="POST" class="mb-4">
        <p>Kursus yang di ambil : <b><?= $_GET['namakursus'] ?> </b></p>
        <input type="file" class="form-control" id="inputGroupFile01">
        <input type="date" class="form-control"  id="tanggal-ambil" name="tanggal-ambil">
        <input type="submit" name="submit" value="Daftar"/> 
    </form>

    <a href="./index.php">Kembali ke Halaman Home</a>

</div>
