

<?php include("./components/header.php") ;
$id = $_GET['id'];
include("../config.php");?>

<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    if(!$_FILES['gambar']['size'] == 0){
      $namaFile = $_FILES['gambar']['name'];
      $lokasiFIle = $_FILES['gambar']['tmp_name'];
  
      $moveFile = move_uploaded_file($lokasiFIle, "../uploads/produk/".$namaFile);

      if ($moveFile) {
        $sql = "UPDATE `produk` 
        SET `gambar`='$namaFile',`nama`='$nama',`harga`='$harga',`deskripsi`='$deskripsi' 
        WHERE `id` = $id;";   
      } else {
        echo "<script> alert('Gambar gagal diupload!') </script>";
      }      
    } else {
      $sql = "UPDATE `produk` 
        SET `nama`='$nama',`harga`='$harga',`deskripsi`='$deskripsi' 
        WHERE `id` = $id;";
    } 
   
        $query = mysqli_multi_query($conn, $sql);
    
        if( $query ) {
            echo "<script> alert('Produk berhasil diupdate!') </script>";
            header("location: ./produk.php");
        } else {
            echo "<script> alert('Produk gagal diupdate!') </script>";
            echo 'Error ' . mysqli_error($conn);
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // exit;
        }
   
}

?>

<?php
if (isset($_POST['submit'])) {

    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    $sql = "UPDATE `produk` 
    SET `kategori`='$kategori',`nama`='$nama',`harga`='$harga',`deskripsi`='$deskripsi' 
    WHERE `id` = $id;";

    $query = mysqli_multi_query($conn, $sql);

    if( $query ) {
        header("location: ./produk.php");
    } else {
        echo 'Error ' . mysqli_error($conn);
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
    }
}

?>


<?php

        $sql = "SELECT * FROM `produk` WHERE `id` =  $id";
        $query1 = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($query1);

        ?>

<div class="container py-3"  style="max-width: 500px ;">
<form action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nama</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="nama" value="<?php echo $row[2] ?>" >
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Harga</label>
  <input type="text" class="form-control" id="formGroupExampleInput2"  name="harga" value="<?php echo $row[3] ?>">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput3" class="form-label">Deskripsi</label>
  <input type="text" class="form-control" id="formGroupExampleInput3"  name="deskripsi" value="<?php echo $row[4] ?>">
</div>
<label for="formGroupExampleInput4" class="form-label">Gambar</label>
<img class="mb-3" src="../uploads/produk/<?php echo $row[1] ?>" style="width:100%; border-radius:10px" />
<div class="mb-3">



  <input type="file" class="form-control" id="formGroupExampleInput4"  name="gambar">
</div>

<button type="submit" name="submit" class="btn btn-primary w-100">Perbaharui</button>
</form>
</div>