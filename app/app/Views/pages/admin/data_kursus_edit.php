<?= $this->extend('components/layoutadmin/layout') ?>

<?= $this->section('content') ?>


<div id="jadwal-kursus"  class="container py-5">
    <div class="d-flex gap-3 align-items-center mb-3">
    <h2 class="" style="font-size: 1.3rem;font-weight:bold">
        Edit Data Kursus
    </h2>
</div>

<div class="container">

<form action="/admin/data-kursus/edit/<?= $data->id ?>" method="post" name="datakursus">
<div class="mb-3">
  <label for="kursus" class="form-label">Nama Kursus</label>
  <input name="nama_kursus" type="text" class="form-control" id="kursus" placeholder="Nama Kursus" value="<?= $data->nama_kursus ?>">
</div>
<div class="mb-3">
  <label for="ket" class="form-label">Keterangan</label>
  <input name="keterangan_kursus" class="form-control"  id="ket" value="<?= $data->keterangan_kursus ?>"/>

</div>

<button type="submit" class="btn btn-primary">Update</button>


</form>

</div>


    


</div>

<?= $this->endSection() ?>