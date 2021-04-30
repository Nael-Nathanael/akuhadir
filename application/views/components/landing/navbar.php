<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="<?= base_url("/#") ?>">
            <img src="<?= base_url("static/assets/img/navLogo.png") ?>" height="50em" alt="">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-center active" style="width: 100px;">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item text-center" style="width: 100px;">
                    <a class="nav-link" href="https://altha.co.id" target="_blank">About Us</a>
                </li>
                <li class="nav-item text-center" style="width: 100px;">
                    <a class="nav-link" href="<?= base_url("landing") ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->