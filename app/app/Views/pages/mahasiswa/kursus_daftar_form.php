<?= $this->extend('components/layout/layout') ?>

<?= $this->section('content') ?>


<?php  $data = $data_kursus->getFirstRow() ?>
<div id="jadwal-kursus"  class="container py-5 text-center" style="max-width: 300px;">
    <h2 class="mb-4" style="font-size: 1.3rem;font-weight:bold">
        Upload KRS (aktif) untuk melanjutkan pendaftaran.
    </h2>
    <form class="d-flex flex-column gap-2" method="post" enctype='multipart/form-data'>
    <input type="text" class="form-control" value="<?= $data->nama_kursus ?>" disabled>
    <input type="text" class="form-control"  value="<?= $data->mulai ?> - <?= $data->selesai ?>"disabled>
    <input class="form-control" type="file" name="file" required>
    <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
 



    


</div>

<?= $this->endSection() ?>