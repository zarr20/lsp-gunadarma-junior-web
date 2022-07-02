

<?php include("./components/header.php") ?>

<div style=" background: #ffe200; margin-bottom: 130px; ">
<section class="container py-5" >
    <div class="row py-lg-5" style="align-items: center;">

      <div class="col-lg-6 text-center text-sm-start ">
        <h1 class="fw-bold">PetshopZarr</h1>
        <p class="lead ">Penuhi Kebutuhan Hewan Peliharaan Anda.</p>
        <p>
          <a  href="./produk.php" class="btn btn-lg btn-dark my-2">Lihat Semua Produk</a>
        </p>
      </div>

      <div class="col" style=" margin-bottom: -130px; ">
      <img src="https://www.pngall.com/wp-content/uploads/5/Fat-British-Shorthair-Cat-PNG-Clipart.png" style="
    width: 100%;
">
      </div>
   
    </div>
  </section>

</div>



<div class="container my-4">




        <h5 class="fw-bold mb-3">Produk Terbaru</h5>
        <div class="row gy-4">

            <?php
            include("../config.php");
            $sql = "SELECT * FROM produk ORDER BY `produk`.`id` DESC LIMIT 4 ";
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