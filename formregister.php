<?php
include "koneksi.php";

$error = '';
$success = '';

if (isset($_POST['register'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = 'User';

    if (mysqli_num_rows(mysqli_query($con, "select * from pengguna where username='" . $username . "'")) > 0) {
        $error = 'Username sudah digunakan';
    }

    if (empty($error)) {
        $q = "insert into pengguna(nama_lengkap,username,password,level) values ('" . $nama_lengkap . "','" . $username . "','" . md5($password) . "','" . $level . "')";
        mysqli_query($con, $q);
        $success = 'Pendaftaran user berhasil';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi SPK Menggunakan Metode SAW</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg h2">REGISTER USER</p>
            <?php
            if (!empty($error)) {
                echo '<div class="alert bg-danger text-center" role="alert">' . $error . '</div>';
            }
            if (!empty($success)) {
                echo '<div class="alert bg-success text-center" role="alert">' . $success . '</div>';
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="register" class="btn btn-success btn-block btn-flat">Register</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="index.php" class="btn btn-primary btn-block btn-flat">Login</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>