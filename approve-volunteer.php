<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailToApprove = $_POST["email"];
    $lines = file("volunteers.txt");
    $updated = "";

    foreach ($lines as $line) {
        if (strpos($line, $emailToApprove) !== false) {
            $line = str_replace("Pending Approval", "Approved", $line);
        }
        $updated .= $line;
    }

    file_put_contents("volunteers.txt", $updated);

    echo "<h2>Volunteer Approved!</h2>";
    echo "<p>$emailToApprove has been added as an official member.</p>";
    echo "<a href='admin.html'>Back to Admin Panel</a>";
}
?>
