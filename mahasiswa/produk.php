
<?php include("./components/header.php") ?>



<div class="container my-4">
        <div class="row ">

            <?php
            include("../config.php");
            $sql = "SELECT * FROM produk";
            $query = mysqli_query($conn, $sql);

            while ($item = mysqli_fetch_array($query)) {
            ?>
                <div class="col-sm-3">
                    <div class="card overflow-hidden">
                    <div class="p-2">
                        <div style="width: 100%;display: block;padding-bottom: 100%;
                        
                        background:url('../uploads/produk/<?php echo $item['gambar'] ?>');
                        background-size:contain;
                        background-position:center;
                        ">

                        </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title  mb-0"><?php echo $item['nama'] ?></h5>
                            <p>Rp <?php echo $item['harga'] ?></p>
                            <p class="card-text"><?php echo $item['deskripsi'] ?></p>
                            <a href="./bayar.php?produk=<?php echo $item['id'] ?>" class="btn btn-primary">
                            <i class="bi bi-bag me-2"></i>
                            Bayar</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>