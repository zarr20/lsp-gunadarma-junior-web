<?= $this->extend('components/layout/layout') ?>

<?= $this->section('content') ?>

<?= $this->include('components/banner1') ?>


<div id="jadwal-kursus"  class="container py-5 pb-2">
    <h2 class="mb-4" style="font-size: 1.3rem;font-weight:bold">
    Kursus Tersedia
    </h2>


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kursus</th>
                <!-- <th scope="col">Keterangan</th> -->
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php // print_r($data_kursus->getResultArray()) ?>
            <?php $i=1; foreach ($data_kursus->getResultArray() as $data) : ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td scope="row"><?= $data['nama_kursus'] ?></td>
                    <!-- <td scope="row"><?= $data['lama_kursus'] ?></td> -->
                    
                    <td scope="row"><?= $data['mulai'] ?> - <?= $data['selesai'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php  if(!session()->get('logged_in')) {?>
        <div class="alert alert-warning" role="alert">

Silahkan login untuk mendaftar. 

</div>
           <?php } ?>

    


</div>

<div id="jadwal-kursus"  class="container py-5 pt-2">
    <h2 class="mb-4" style="font-size: 1.3rem;font-weight:bold">
    Materi Kursus
    </h2>


    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kursus</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php // print_r($data_kursus->getResultArray()) ?>
            <?php $i=1; foreach ($materi_kursus->getResultArray() as $data) : ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td scope="row"><?= $data['nama_kursus'] ?></td>
                    <!-- <td scope="row"><?= $data['lama_kursus'] ?></td> -->
                    <td scope="row"><?= $data['keterangan_kursus'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php  if(!session()->get('logged_in')) {?>
        <div class="alert alert-warning" role="alert">

Silahkan login untuk mendaftar. 

</div>
           <?php } ?>

    


</div>

<?= $this->endSection() ?>