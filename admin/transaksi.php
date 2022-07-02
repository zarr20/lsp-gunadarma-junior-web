<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
  header("Location: ../index.php");
}
?>


<?php include("./components/header.php") ?>


<?php
if (isset($_GET['id_transaksi'])) {
    include("../config.php");
    $id_transaksi = $_GET['id_transaksi'];
?>

    <div class="container">

        <div class="mt-3">
        </div>



        <?php

        $id_transaksi = $_GET['id_transaksi'];

        $sql = "SELECT * FROM `transaksi` WHERE id = $id_transaksi";
        $query1 = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($query1);

        ?>

        <div class="d-flex justify-content-between mb-3">

            <div>

                <p>Tanggal: <?php echo $row[2] ?></p>
                <p>Penerima: <?php echo $row[3] ?></p>
                <p>Alamat: <?php echo $row[4] ?></p>
            </div>

            <div>
                <h4>TRX<?php echo $id_transaksi ?></h4>
                <p>Status: <?php echo $row[5] ?></p>
            </div>

        </div>





        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>

                </tr>
            </thead>
            <tbody>

            

<?php



// $sql = "SELECT * FROM `transaksi_items` WHERE `id_transaksi` =  $id_transaksi";
// SELECT * FROM transaksi_items INNER JOIN produk ON transaksi_items.id_produk = produk.id;
$sql = "SELECT * FROM transaksi_items INNER JOIN produk ON transaksi_items.id_produk = produk.id WHERE `id_transaksi` =  $id_transaksi;";
$query = mysqli_query($conn, $sql);
$i = 1;

$total_harga = 0;

while ($item = mysqli_fetch_array($query)) {
    $total_harga = $total_harga + ($item['harga'] * $item['jumlah']);
?>
    <tr>
        <th scope="row"><?php echo $i;
                        $i++; ?></th>
        <td><img class="me-2" src="../uploads/produk/<?php echo $item['gambar']; ?>" height=70><?php echo $item['nama'] ?></td>
        <td><?php echo $item['harga'] ?></td>
        <td><?php echo $item['jumlah'] ?></td>
    </tr>

<?php
}
?>

                

            </tbody>
        </table>

        <h4>Total: Rp <?php echo $total_harga ?></h4>

    </div>
<?php

} else {
?>

    <div class="container">

        <div class="mt-3">
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>

                <?php

                include("../config.php");

                $iduser = @$_GET['user'];
                if(!isset($_GET['user'])){
                    $sql = "SELECT * FROM `transaksi`";
                } else {
                    $sql = "SELECT transaksi.id as id, tanggal, penerima, alamat,`status`  FROM transaksi INNER JOIN users ON transaksi.id_user = users.id
                    WHERE users.id = $iduser;";
                }

                // $sql = "SELECT * FROM `transaksi` ";
                $query = mysqli_query($conn, $sql);
                $i = 1;

                while ($item = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td>TRX<?php echo $item['id'] ?></td>
                        <td><?php echo $item['status'] ?></td>
                        <td><?php echo $item['penerima'] ?></td>
                        <td><?php echo $item['alamat'] ?></td>
                        <td>
                            <a href="?id_transaksi=<?php echo $item['id'] ?>">Detail</a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

    </div>

<?php } ?>

<?php include("./components/footer.php") ?>