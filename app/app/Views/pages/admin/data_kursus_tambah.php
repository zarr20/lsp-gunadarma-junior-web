<?= $this->extend('components/layoutadmin/layout') ?>

<?= $this->section('content') ?>


<div id="jadwal-kursus"  class="container py-5">
    <div class="d-flex gap-3 align-items-center mb-3">
    <h2 class="" style="font-size: 1.3rem;font-weight:bold">
        Tambah Data Kursus
    </h2>
</div>

<div class="container">

<form method="post" name="datakursus">
<div class="mb-3">
  <label for="kursus" class="form-label">Nama Kursus</label>
  <input name="nama_kursus" type="text" class="form-control" id="kursus" placeholder="Nama Kursus">
</div>
<div class="mb-3">
  <label for="ket" class="form-label">Keterangan</label>
  <input name="keterangan_kursus" class="form-control"  id="ket"/>

</div>

<button type="submit" class="btn btn-primary">Submit</button>


</form>

</div>


    


</div>

<?= $this->endSection() ?>