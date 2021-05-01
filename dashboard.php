<?php

@session_start();

if (@$_SESSION['user'] == "") {
    echo "
            <script>
            document.location.href='index.php'
            </script>
        ";
}

if (isset($_SESSION["is_success"])) {
    if (time() - $_SESSION["alert_time_stamp"] > 1) {
        unset($_SESSION['is_success']);
    }
}
?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/style.css">

    <title>Dashboard</title>
</head>

<body>
    <?php include('components/header.html'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include('components/sidebar.html'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php
                    if (isset($_GET['menu'])) {
                        switch ($_GET['menu']) {
                            case 'product':
                                include 'product.php';
                                break;

                            case 'users':
                                include 'user.php';
                                break;

                            case 'type':
                                include 'type.php';
                                break;
                        }
                    } else {
                    ?>
                        <div class="pt-3 pb-2 mb-3">
                            <h3>Selamat datang <?php echo $_SESSION['user']; ?>!</h3>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Alert -->
    <?php include('library/alert.php'); ?>
    <script>
        var alertDuration = setInterval(alertHide, 4000);
        function alertHide() {
            $(".alert.cust-alert").addClass('d-none');

            clearInterval(alerDuration);
        }
    </script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <!-- Datatables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>