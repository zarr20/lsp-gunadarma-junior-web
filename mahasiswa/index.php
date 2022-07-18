

<?php include("./components/header.php") ?>



<div class="container my-4">




        <h5 class="fw-bold mb-3">Kursus</h5>
        <div class="d-flex flex-column gap-3">

            <?php
            include("../config.php");
            $sql = "SELECT * FROM kursus ORDER BY `id` DESC ";
            $query = mysqli_query($conn, $sql);

            while ($item = mysqli_fetch_assoc($query)) {
              $id = $item['id'];
              $nama = $item['nama_kursus']; 
              $lama_kursus = $item['lama_kursus']; 
              $keterangan = $item['keterangan_kursus']; 
            ?>
            <div>

                <div class="d-flex gap-4" >
                    <div class="fw-bold">
                      <?= $nama ?>
                    </div>
                    <div>
                      <?= $lama_kursus ?> Hari
                    </div>
                      
                </div>
                <div>
 Keterangan : <?= $keterangan ?>
            </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>