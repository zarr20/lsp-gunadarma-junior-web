<?php
session_start();
include("../config.php");
if ($_SESSION['role'] !== 'admin') {
  header("Location: ../index.php");
}
?>


<?php include("./components/header.php") ?>

<?php
if(isset($_POST['changepass'])){
    $iduser = $_POST['id'];
    $password = $_POST['password'];

    $sql = "UPDATE `users` SET `password`='$password' WHERE `id` = '$iduser'";

    $query = mysqli_multi_query($conn, $sql);

    if( $query ) {
        echo "<script> alert('Password berhasil diganti!'); </script>";
    } else {
        echo "<script> alert('Password gagal diganti!') </script>";
        echo 'Error ' . mysqli_error($conn);
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
    }
}
?>


    <div class="container">

        <div class="mt-3">
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM `users` WHERE `role`= 'pelanggan'";
                $query = mysqli_query($conn, $sql);
                $i = 1;

                while ($item = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $item['username'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $item['id'] ?>">
                                <input type="text" id="password" name="password" value="<?php echo $item['password'] ?>">
                                <button type="submit" id="changePassword" name="changepass">Ganti</button>
                            </form>
                            
                    </td>
                    <td>
                    <a class="btn btn-danger"href="./pelanggan_delete.php?id=<?php echo $item['id'] ?>">Hapus</a>
                    <a class="btn btn-primary"href="./transaksi.php?user=<?php echo $item['id'] ?>">Lihat Transaksi</a>
                    </td>
                    
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

    </div>


<?php include("./components/footer.php") ?>