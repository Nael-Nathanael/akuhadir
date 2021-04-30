<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="<?= base_url() ?>">
            <strong class="blue-text">Aku Hadir!</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= !stripos(current_url(), "home/rangkuman") ? "active" : "" ?>">
                    <a class="nav-link waves-effect" href="<?= base_url("home") ?>">Daftar Hadir Harian</a>
                </li>
                <li class="nav-item <?= stripos(current_url(), "home/rangkuman") ? "active" : "" ?>">
                    <a class="nav-link waves-effect" href="<?= base_url("home/rangkuman") ?>">Rangkuman</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item d-flex justify-content-center align-items-center">
                    <div class="mr-2">
                        Welcome, <?= getUserData("personalData")->username; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("service/auth/logout") ?>" class="text-danger nav-link border border-light rounded waves-effect">
                        Logout ?
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->