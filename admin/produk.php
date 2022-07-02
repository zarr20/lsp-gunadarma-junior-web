<?php
session_start();
include("../config.php");
if ($_SESSION['role'] !== 'admin') {
  header("Location: ../index.php");
}
?>


<?php include("./components/header.php") ?>


<div class="container">

  <div class="my-3">
    <a class="btn btn-primary" href="./produk_add.php">Tambah</a>
  </div>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga</th>
        <th scope="col">Deksripsi</th>
        
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php



      $sql = "SELECT * FROM `produk`";
      $query = mysqli_query($conn, $sql);
      $i = 1;

      while ($item = mysqli_fetch_array($query)) {
      ?>
        <tr>
          <th scope="row"><?php echo $i;
                          $i++; ?></th>
                          <td><img src="../uploads/produk/<?php echo $item['gambar'] ?>" height="70"/></td>
          <td><?php echo $item['nama'] ?></td>
          <td><?php echo $item['harga'] ?></td>
          <td><?php echo $item['deskripsi'] ?></td>
          
          <td>
          <a class="btn btn-primary" href="./produk_edit.php?id=<?php echo $item['id'] ?>">Edit</a>
          <a class="btn btn-danger"href="./produk_delete.php?id=<?php echo $item['id'] ?>">Hapus</a>
        </td>
        </tr>

      <?php
      }
      ?>
<!-- 
      <tr>
        <th scope="row">1</th>
        <td>Nugget</td>
        <td>10000</td>
        <td>-</td>
        <td>Makanan</td>
        <td>
          <button>Edit</button>
          <button>Hapus</button>
        </td>
      </tr> -->

    </tbody>
  </table>

</div>


<?php include("./components/footer.php") ?>