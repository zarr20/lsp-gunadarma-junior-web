<?php 

include("./components/header.php");
include("../config.php");

?>




    <div class="container">

        <div class="mt-3">
        </div>


     
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kursus</th>
                    <th scope="col">Lama Kursus</th>
                    <th scope="col">Keterangan Kursus</th>
                    <th scope="col">Aksi </th>

                </tr>
            </thead>
            <tbody>

                <?php



                // $sql = "SELECT * FROM `transaksi_items` WHERE `id_transaksi` =  $id_transaksi";
                // SELECT * FROM transaksi_items INNER JOIN produk ON transaksi_items.id_produk = produk.id;
                $sql = "SELECT * FROM kursus";
                $query = mysqli_query($conn, $sql);
                $i = 1;

                while ($item = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $item['nama_kursus'] ?></td>
                        <td><?php echo $item['lama_kursus'] ?> Hari</td>
                        <td><?php echo $item['keterangan_kursus'] ?></td>
                        <td>
                            <a href="./daftar_kursus_post.php?idkursus=<?= $item['id'] ?>&namakursus=<?= $item['nama_kursus'] ?>"> Daftar </a>
                        </td>
                    </tr>

                <?php
                }
                ?>

                

            </tbody>
        </table>

    </div>
