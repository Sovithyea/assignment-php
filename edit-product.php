<?php 
    include './includes/header.php';
    session_start();
    include "./includes/connection.php";
    if(!isset($_SESSION['name'])) {
        echo "<script>location.href = 'index.php';</script>";
    }
?>





<?php
    include './includes/footer.php';
?>