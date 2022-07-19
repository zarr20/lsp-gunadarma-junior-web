<nav style="background:#222222" class="bg-dark text-white">
    <div class="container d-flex align-items-center gap-4" style="height:60px">
        <div id="navLogo" class="flex-grow-1">
            Universitas <b>Jewepe</b>
        </div>

        <div class="d-flex gap-4">
            <a href="/admin/data-kursus" class="">Data Kursus</a>
            <a href="/admin/data-jadwal-kursus" class="">Data Jadwal Kursus</a>
            <a href="/admin/data-pendaftaran" class="">Data Pendaftaran Peserta</a>
            <a href="/admin/data-mahasiswa" class="">Data Mahasiswa</a>
        </div>

        <div id="navigation" class="d-flex gap-2 align-items-center">
           <?php if(!session()->get('logged_in')) {?>
            <a href="/register" class="btn btn-outline-light">Register</a>
            <a href="/login" class="btn btn-outline-light">Login</a>

           <?php } else {?>
            <a href="/logout" class="btn btn-outline-light">Logout</a>

           <?php } ?>
        
        </div>
    </div>
</nav>

<style>
    nav a {
        color:white;
        text-decoration: none;
    }
</style>