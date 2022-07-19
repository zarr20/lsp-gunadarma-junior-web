<?= $this->extend('components/layoutadmin/layout') ?>

<?= $this->section('content') ?>


<div id="jadwal-kursus"  class="container py-5">
    <div class="d-flex gap-3 align-items-center mb-3">
    <h2 class="" style="font-size: 1.3rem;font-weight:bold">
        Data Mahasiswa
    </h2>
  
</div>



    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">NPM</th>
            </tr>
        </thead>
        <tbody>
            <?php // print_r($data_kursus->getResultArray()) ?>
            <?php $i=1; foreach ($data_mahasiswa->getResultArray() as $data) : ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td scope="row"><?= $data['nama'] ?></td>
                    <td scope="row"><?= $data['kelas'] ?></td>
                    <td scope="row"><?= $data['npm'] ?></td>
                    <td scope="row">
                        
                    <a href="/admin/data-kursus/<?= $data['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="/admin/data-kursus/delete/<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
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