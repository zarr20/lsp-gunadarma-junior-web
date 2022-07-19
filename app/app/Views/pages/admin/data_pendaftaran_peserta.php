<?= $this->extend('components/layoutadmin/layout') ?>

<?= $this->section('content') ?>


<div id="jadwal-kursus"  class="container py-5">
    <div class="d-flex gap-3 align-items-center mb-3">
    <h2 class="" style="font-size: 1.3rem;font-weight:bold">
        Data Pendaftaran
    </h2>
   
</div>



    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Daftar</th>
                <th scope="col">NPM</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kursus</th>
                
                <th scope="col">Jadwal Kursus</th>
            </tr>
        </thead>
        <tbody>
            <?php // print_r($data_pendaftaran->getResultArray()) ?>
            <?php $i=1; foreach ($data_pendaftaran->getResultArray() as $data) : ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td scope="row"><?= $data['tanggal_permintaan'] ?></td>
                    <td scope="row"><?= $data['npm'] ?></td>
                    <td scope="row"><?= $data['nama'] ?></td>
                    <td scope="row"><?= $data['kelas'] ?></td>
                    <td scope="row"><?= $data['nama_kursus'] ?></td>
                    <td scope="row"><?= $data['mulai'] ?> - <?= $data['selesai'] ?></td>
                    <td scope="row">
                        
                    <a target="_blank" href="<?= $data['krs'] ?>" class="btn btn-primary">Lihat KRS</a>
                    <a href="/admin/daftar-kursus/setujui/<?= $data['iddaftar'] ?>" class="btn btn-primary">Setujui</a>
                    </td>
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