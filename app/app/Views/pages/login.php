<?= $this->extend('components/layout/layout') ?>

<?= $this->section('content') ?>



<div id="banner" class="bg-dark position-relative d-flex align-items-center" style="flex: 1 1 auto;background: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-size:cover">
<div style="background-color: #00000075; height:100%;width:100%; position:absolute"></div>
    <div class=" position-relative container text-white d-flex flex-column justify-content-center gap-4 " style=" height:400px; max-width: 500px;">
        <div style="max-width:200px">
            <h2>
                <b>Silahkan melakukan Login </b>
            </h2>
        </div>

        <div >
        <form method="post" class="d-flex flex-column gap-3">
            <input name="username" type="text" class="form-control rounded-pill" placeholder="NPM">
            <input name="password" type="password" class="form-control rounded-pill" placeholder="******">
            <button type="submit" class="btn btn-outline-light rounded-pill">Login</button>
        </form>
        </div>
        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php } ?>
        <p>
        Belum Mempunyai Akun ? <a href="/register">Daftar Disini</a>
        </p>
    </div>



</div>


<?= $this->endSection() ?>