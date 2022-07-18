<?php

include 'config.php';

error_reporting(0);

session_start();

// if ($_SESSION['role'] == 'admin') {
//     header("Location: ./admin/index.php");
// } elseif ($_SESSION['role'] == 'mahasiswa') {
//     header("Location: ./mahasiswa/index.php");
// }



if (isset($_POST['submit'])) {
    // echo "tersubmit";
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo  $email;

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['jenis_user'];
        $_SESSION['id_user'] = $row['id'];

        echo "<script>alert('Berhasil')</script>";

        if ($_SESSION['role'] == 'admin') {
            header("Location: ./admin/produk.php");
        } elseif ($_SESSION['role'] == 'mahasiswa') {
            header("Location: ./mahasiswa/index.php");
        }
    } else {
        $_SESSION['error'] = "Username atau password Anda salah. Silahkan coba lagi!";
    }
}

?>


<html lang="en" data-ember-extension="1">

<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.2/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="" method="POST">
            <h3 class="mb-3">Silahkan Masuk</h3>

          
            

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="NPM">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <?php if(isset($_SESSION['error'])) { ?>

            <div class="alert alert-warning" role="alert">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>

            <?php } ?>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Masuk</button>
        </form>
    </main>





</body>

</html>