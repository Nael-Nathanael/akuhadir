<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
<style>
    h1 {
        font-family: 'Akaya Telivigala', cursive;
    }
</style>
<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
        <h1 class="display-6 text-center">Aku Hadir!</h1>
    </a>

    <div class="list-group list-group-flush">
        <a href="<?= base_url() ?>" class="list-group-item <?= !stripos(current_url(), "home/rangkuman") ? "active" : "" ?> waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Daftar Hadir Harian
        </a>
        <a href="<?= base_url("home/rangkuman") ?>" class="list-group-item <?= stripos(current_url(), "home/rangkuman") ? "active" : "" ?> waves-effect">
            <i class="fa fa-file-excel mr-3"></i>Rangkuman
        </a>
    </div>

</div>
<!-- Sidebar -->