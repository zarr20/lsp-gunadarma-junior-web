<?= $this->extend('components/layout/layout') ?>

<?= $this->section('content') ?>


<div id="jadwal-kursus" class="container py-5">
    <h2 class="mb-4" style="font-size: 1.3rem;font-weight:bold">
        Status Pendaftaran
    </h2>


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Permintaan</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">NPM</th>
                <th scope="col">KRS</th>
                
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php // print_r($data_kursus->getResultArray()) 
            ?>
            <?php $i = 1;
            foreach ($data_pendaftaran->getResultArray() as $data) : ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td scope="row"><?= $data['tanggal_permintaan'] ?></td>
                    <td scope="row"><?= $data['nama'] ?></td>
                    <td scope="row"><?= $data['kelas'] ?></td>
                    <td scope="row"><?= $data['npm'] ?></td>
                    <td scope="row"><?= $data['krs'] ?></td>
                   
                    <td scope="row"><?= $data['status'] ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php if (!session()->get('logged_in')) { ?>
        <div class="alert alert-warning" role="alert">

            Silahkan login untuk mendaftar.

        </div>
    <?php } ?>




</div>

<?= $this->endSection() ?>