<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Welcome Admin!</h2>
<!-- Your admin panel content here -->
