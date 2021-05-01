<?php
include "config/connect.php";
include "library/app.php";

$go = new App();

$table = 'login';

@$username = $_POST['user'];
@$password = base64_encode($_POST['pass']);

$redirect = 'dashboard.php';

if (isset($_POST['login'])) {
    $go->login($con, $table, $username, $password, $redirect);
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="border border-2 rounded border-primary p-4 col-4 position-absolute top-50 start-50 translate-middle">
            <h2 class="mb-5 text-primary text-center">Login mas</h2>
            <form method="post">
                <div class="mb-3">
                    <input type="text" name="user" class="form-control" id="input_username" placeholder="Username">
                </div>
                <div class="mb-4">
                    <input type="password" name="pass" class="form-control" id="input_password" placeholder="Password">
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" name="login" value="masuk" class="btn btn-primary">Masuk</button>
                </div>
                <div class="text-center">
                <hr>
                    <a class="text-decoration-none" href="register.php">Klik disini untuk membuat akun baru</a>
                </div>
            </form>
        </div>
    </div>

</body>