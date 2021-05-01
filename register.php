<?php 
include "config/connect.php";
include "library/app.php";

$go = new App();
$table = 'login';

@$password = base64_encode($_POST['pass']);

$field = array(
    'username' => @$_POST['user'],
    'password' => @$password
);

$redirect = "index.php";
@$where = "id = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->create($con, $table, $field, $redirect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="border border-1 rounded border-primary p-4 col-4 position-absolute top-50 start-50 translate-middle">
            <h2 class="mb-5 text-primary text-center">Monggo daftar</h2>
            <form method="post">
                <div class="mb-3">
                    <input type="text" name="user" class="form-control" id="input_username" placeholder="Username" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="pass" class="form-control" id="input_password" placeholder="Password" required>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Daftar</button>
                </div>
                <div class="text-center">
                <hr>
                    <a class="text-decoration-none" href="index.php">Sudah punya akun? Klik disini</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>