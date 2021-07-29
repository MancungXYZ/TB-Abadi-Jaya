<!-- My Css -->
<link rel="stylesheet" href="style.css">

<title>Login</title>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="people.png" id="icon" alt="User Icon">
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <input type="text" id="Username" class="fadeIn second" name="id_karyawan" placeholder="ID">
      <input type="password" id="Password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<?php

require "koneksi.php";

if ( isset($_POST['submit']) ) {
  
    $id_karyawan = $_POST["id_karyawan"];
    $password = $_POST["password"];
  
    $get_user = "select * from karyawan where id_karyawan = '$id_karyawan'";
    $result = mysqli_query($koneksi, $get_user);
  
    $data = mysqli_fetch_array($result);

    //nama pengguna
    $nama_karyawan = $data['nama'];

    if ($password == $data['password'] ) {
      if ($data['posisi'] == "Kasir") {
        session_start();
        $_SESSION["karyawan"] = $nama_karyawan;
        $_SESSION["id_karyawan"] = $id_karyawan;
        $_SESSION["password"] = $password;
        $_SESSION["status"] = "login";
        header("Location: admin/index.php");
      } else {
        header("Location: transaksi.php");
      }
      } else {
      echo "<script>alert('Email atau Password Salah')</script>";
    }
  }

?>