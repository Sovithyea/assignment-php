<?php 
    session_start();
    include './includes/header.php';
    include "./includes/connection.php";
    if(!isset($_SESSION['id'])) {
        echo "<script>location.href = 'index.php';</script>";
    }
?>




<?php
    include './includes/footer.php';
?>