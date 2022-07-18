<?= $this->extend('components/layout/layout') ?>

<?= $this->section('content') ?>



<div id="banner" class="bg-dark position-relative d-flex align-items-center" style="flex: 1 1 auto;background: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-size:cover">
    <div style="background-color: #00000075; height:100%;width:100%; position:absolute"></div>
    <div class=" position-relative container text-white d-flex flex-column justify-content-center gap-4 " style=" height:400px; max-width: 500px;">
        <div style="max-width:200px">
            <h2>
                <b>Isi sesuai dengan data diri </b>
            </h2>
        </div>

        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        <div>
            <form method="post" autocomplete="off" class="d-flex flex-column gap-3">
                <input name="nama" type="text" class="form-control rounded-pill" placeholder="Nama" autocomplete="off">
                <input name="kelas" type="text" class="form-control rounded-pill" placeholder="Kelas" autocomplete="off">
                <input name="npm" type="text" class="form-control rounded-pill" placeholder="NPM" autocomplete="off">
                <input name="password" type="password" class="form-control rounded-pill" placeholder="Password" autocomplete="new-password">

                   
                <button type="submit" class="btn btn-outline-light rounded-pill">Login</button>
            </form>

        </div>
        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php } ?>
        <p>
            Sudah mempunyai akun ? <a href="/login">Login Disini</a>
        </p>

       
    </div>



</div>


<?= $this->endSection() ?>