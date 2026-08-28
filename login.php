<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    if ($password === "MyStrong123") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "❌ Wrong password!";
    }
}
?>
<form method="post">
  <label>Enter Admin Password:</label>
  <input type="password" name="password" required>
  <button type="submit">Login</button>
</form>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
