<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= isset($title) ? $title : "Aku Hadir" ?></title>

    <!-- Favicon -->
    <!-- <link rel="icon" href="<?= base_url("static/assets/img/logo.png") ?>" type="image/x-icon" /> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url("static/assets/css/bootstrap.css") ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url("static/assets/css/mdb.css") ?>">

    <link rel="stylesheet" href="<?= base_url("static/assets/css/landing.css") ?>">
    <link rel="stylesheet" href="<?= base_url("static/assets/css/style.css") ?>">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <?= isset($css) ? $css : "" ?>
</head>

<body>

    <?= isset($header) ? $header : "" ?>

    <?= isset($content) ? $content : "" ?>

    <?= isset($footer) ? $footer : "" ?>


    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url("static/assets/js/jquery.js") ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type=" text/javascript" src="<?= base_url("static/assets/js/popper.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type=" text/javascript" src="<?= base_url("static/assets/js/bootstrap.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type=" text/javascript" src="<?= base_url("static/assets/js/mdb.js") ?>"></script>
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom scripts -->
    <?= isset($js) ? $js : "" ?>

    <?php if ($this->session->flashdata("error")) { ?>
        <script>
            swal("Oops", "<?= $this->session->flashdata("error") ?>", "error")
        </script>
    <?php } ?>
    <?php if ($this->session->flashdata("success")) { ?>
        <script>
            swal("Success!", "<?= $this->session->flashdata("success") ?>", "success")
        </script>
    <?php } ?>
    <?php if ($this->session->flashdata("warning")) { ?>
        <script>
            swal("Warning!", "<?= $this->session->flashdata("warning") ?>", "warning")
        </script>
    <?php } ?>
    <?php if ($this->session->flashdata("info")) { ?>
        <script>
            swal("Notice!", "<?= $this->session->flashdata("info") ?>", "info")
        </script>
    <?php } ?>


    <script>
        $(document).ready(() => {
            $('.select2').select2();
        })
    </script>
</body>

</html>