<?php
// Index file - redirects to login if not logged in, or main page if logged in
session_start();

if(isset($_SESSION['divino_logged_in']) && $_SESSION['divino_logged_in'] === true) {
    header("Location: DivinoMainPage.php");
} else {
    header("Location: DivinoLogin.php");
}
exit();
?>

