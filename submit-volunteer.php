<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $interest = $_POST["interest"];

    $data = "Name: $name | Email: $email | Phone: $phone | Interest: $interest | Status: Pending Approval\n";
    file_put_contents("volunteers.txt", $data, FILE_APPEND);

    echo "<h2>Thank you, $name!</h2>";
    echo "<p>Your volunteer request has been submitted for admin approval.</p>";
    echo "<a href='index.html'>Back to Home</a>";
}
?>
