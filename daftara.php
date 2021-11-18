<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>MY LIBRARY | REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/Logo.png" type="image">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">
    <style>
        body {
            background: url(https://images.unsplash.com/photo-1483921020237-2ff51e8e4b22?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8ZnJlZXxlbnwwfDB8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60) no-repeat fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body style="margin-top: 10px;">
    <div class="row mt-2 mx-auto justify-content-center">
        <div class="col-lg-6 text-center" style="background: rgba(7, 9, 23, 0.5); padding-top: 30px; padding-right: 40px; padding-bottom: 10px; padding-left: 40px; border-radius: 10px;">
            <h3 class="text-white text-center">Create A New Account</h3>
            <?php echo !empty($statusPsn) ? '<p class="' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
            <form action="akunuser.php" method="post">
                <div class="form-floating">
                    <input style=" font-weight: 500;" type="text" class="form-control mt-2" name="username" placeholder="Username" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input style=" font-weight: 500;" type="email" class="form-control mt-2" name="email" placeholder="Email" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="email">Email Address</label>
                </div>
                <div class="form-floating">
                    <input style=" font-weight: 500;" type="text" class="form-control mt-2" name="telp" placeholder="Phone Number" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="telp">Phone Number</label>
                </div>
                <div class="form-floating">
                    <input style=" font-weight: 500;" type="password" class="form-control mt-2" name="password" placeholder="Password" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="password">Password</label>
                </div>
                <div class="form-floating">
                    <input style=" font-weight: 500;" type="password" class="form-control mt-2" name="confirm_password" placeholder="Confirm Password" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="confirm_password">Confirm Password</label>
                </div>
                <input class="w-100 btn-lg btn btn-primary mt-3" type="submit" name="daftarSubmit" value="Create Account"><br>
            </form>
            <div class=" mt-2 text-white">Have a Registered Account? <a style="color: #71B5FF" href="indexa.php">Login</a></div>
            <p class="mt-2  text-white">Rahman Sucipto &copy; 2021</p>
        </div>
    </div>
</body>

</html>
