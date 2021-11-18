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
<!-- Ubah Font Style -->
<!-- h3 { font-family: Cambria,"Times New Roman",serif; } 
#h3 { font-family: Georgia, serif; } -->
<style type="text/css">
  
</style>

<head>
  <title>MY LIBRARY | LOGIN</title>
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

<body style="margin-top: 75px;">
  <div class="row mt-5 mx-auto justify-content-center">
    <div class="col-lg-6 text-center" style="background: rgba(7, 9, 23, 0.5); padding-top: 50px; padding-right: 40px; padding-bottom: 50px; padding-left: 40px; border-radius: 10px;">
      <?php
      if (!empty($sesiData['userLoggedIn']) && !empty($sesiData['userID'])) {
        include 'user.php';
        $user = new User();
        $kondisi['where'] = array(
          'id' => $sesiData['userID'],
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
        if ($userData['level'] == 'user') {
          header("Location:index.php");
        } else if ($userData['level'] == 'admin') {
          header("Location:daftar.php");
        }
      ?>
      <?php } else { ?>
        <h3 class="text-center text-black text-white" id="h3">Login To Your Account</h3><br>
        <?php echo !empty($statusPsn) ? '<p class="text-white"' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
        <div class="form-signin">
          <form action="akunuser.php" method="post">
            <div class="form-floating">
              <input style="font-weight: 500;" type="email" class="form-control" name="email" placeholder="Email" style="font-family: 'Margarine', cursive;" required="">
              <label style="font-weight: 500;" for="email">Email Address</label>
            </div>
            <div class="form-floating">
              <input style="font-weight: 500;" type="password" class="form-control mt-2" name="password" placeholder="Password" style="font-family: 'Margarine', cursive;" required="">
              <label style="font-weight: 500;" for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg mt-3 btn-primary" value="Login" name="loginSubmit" type="submit">Login</button>
          </form>
          <div class=" mt-2 text-white">Not Registered ? <a style="color: #71B5FF" href="daftara.php">Register Now!! </a></div>
          <p class="mt-2  text-white">Rahman Sucipto &copy; 2021</p>
        </div>
    </div>
  </div>
<?php } ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>