<?php
// Session check file - include this at the top of protected pages
session_start();

if(!isset($_SESSION['divino_logged_in']) || $_SESSION['divino_logged_in'] !== true) {
    header("Location: DivinoLogin.php");
    exit();
}
?>

