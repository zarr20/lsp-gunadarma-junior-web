

<?php include("./components/header.php") ;

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
        // echo "Upload berhasil!<br/>";
        // echo "Link: <a href='"."../uploads/produk/".$namaFile."'>".$namaFile."</a>";

        $sql = "INSERT INTO `produk`( `gambar`, `nama`, `harga`, `deskripsi`) 
        VALUES ('$namaFile','$nama','$harga','$deskripsi');";
    
        $query = mysqli_multi_query($conn, $sql);
    
        if( $query ) {
            echo "<script> alert('Produk berhasil diinput!') </script>";
            header("location: ./produk.php");
        } else {
            echo "<script> alert('Produk gagal diinput!') </script>";
            echo 'Error ' . mysqli_error($conn);
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // exit;
        }

      } else {
        echo "<script> alert('Gambar gagal diupload!') </script>";
      }
      
      
    } else {
      echo "<script> alert('Gambar belum diupload!') </script>";
    }
   
}

?>


<div class="container py-3"  style="max-width: 500px ;">
<form action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nama</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="nama" >
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Harga</label>
  <input type="text" class="form-control" id="formGroupExampleInput2"  name="harga">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput3" class="form-label">Deskripsi</label>
  <input type="text" class="form-control" id="formGroupExampleInput3"  name="deskripsi">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput4" class="form-label">Gambar</label>
  <input type="file" class="form-control" id="formGroupExampleInput4"  name="gambar">
</div>

<button type="submit" name="submit" class="btn btn-primary w-100">Tambah</button>
</form>

</div>