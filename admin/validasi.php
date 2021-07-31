<?php
if ($_SESSION['status'] != "login") {
        echo "<script>alert('Lakukan Prosedur Login Terlebih Dahulu') </script>";
        Header("Location: ../index.php");
    }
?>