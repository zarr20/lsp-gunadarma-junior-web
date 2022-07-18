



<?php include("./components/header.php") ?>
<?php

if (isset($_POST['submit'])) {
   
    include("../config.php");
//  echo rand(0,100) . date("ymdhis");
    $id_transaksi = rand();
    $datetime = date('Y-m-d H:i:s');

    $penerima = $_POST['penerima'];
    $alamat = $_POST['alamat'];
    $id_produk = $_GET['produk'];

    $sql1 = "SELECT * FROM produk WHERE id = $id_produk limit 1";
    $query1 = mysqli_query($conn, $sql1);
    // print_r(mysqli_fetch_array($query));
    $nama_produk = '';
    $harga_produk = '';
    while ($item = mysqli_fetch_array($query1)) {
        $nama_produk = $item['nama'];
        $harga_produk = $item['harga'];
    }   

    $jumlah = $_POST['jumlah'];

    $id_user = $_SESSION['id_user'];

    echo $id_user;

    $sql = "INSERT INTO `transaksi`(`id`, `id_user`, `tanggal`, `penerima`, `alamat`, `status`) 
    VALUES ($id_transaksi,$id_user,'$datetime','$penerima','$alamat','Belum dibayar');";

    $sql .= "INSERT INTO `transaksi_items`(`id_transaksi`, `id_produk`, `nama`, `harga`, `jumlah`) 
    VALUES ($id_transaksi,$id_produk,'$nama_produk',$harga_produk,$jumlah);";

    $query = mysqli_multi_query($conn, $sql);

    if( $query ) {
        header("location: ./transaksi.php?id_transaksi=$id_transaksi");
    } else {
        echo 'Error ' . mysqli_error($conn);
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
    }

} else { ?>

<?php
if($_SESSION['id_user'] === null){
    
    header("location: ../login.php");
}

?>

    <div class="container my-4 " style="max-width: 500px ;">

        <?php
        $id_produk = $_GET['produk'];

        include("../config.php");
        $sql = "SELECT * FROM produk WHERE id = $id_produk limit 1";
        $query = mysqli_query($conn, $sql);

        // print_r($query->num_rows);

        if ($query->num_rows < 1) {
            header('location: ./index.php');
        }

        $item = mysqli_fetch_assoc($query);
        

        ?>

        <script>
            $(document).on('change', '#jumlah', function() {
                var x = parseInt($("#jumlah").val()); 
                var y =  parseInt($("#harga").val());
                var count = ( x * y);
                // console.log(count);
                
                $('#total').val(count);
                // document.getElementById("#total").value = document.querySelector("#jumlah").value * document.querySelector("#harga").value;
            });
        </script>

        <div class="d-flex gap-3 items-center mb-3">
            <div>
                <img src="../uploads/produk/<?php echo $item['gambar']; ?>" height=70>
            </div>

            <div>
                <p class="fs-4 fw-bold mb-0"><?php echo $item['nama']; ?></p>
                <p><?php echo $item['harga']; ?></p>
            </div>

        </div>

        <form action="" method="POST">
            <input type="hidden" value="<?php echo $item['harga']; ?>" id="harga" />

            <div class="mb-3 row">
                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah *</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" 
                    value="0"
                    onchange=''
                    required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="s" class="col-sm-3 col-form-label">Penerima *</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="s" name="penerima" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="d" class="col-sm-3 col-form-label">Alamat *</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="d" name="alamat" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="total" class="col-sm-3 col-form-label">Total</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="total" disabled>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Bayar</button>

        </form>



    <?php
}

    ?>



    </div>

    <?php include("./components/footer.php"); ?>