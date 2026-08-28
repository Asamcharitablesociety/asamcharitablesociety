<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $month = $_POST["month"];
    $donation = $_POST["donation"];
    $expense = $_POST["expense"];
    $balance = $donation - $expense;

    $data = "Month: $month | Donation: ₹$donation | Expense: ₹$expense | Balance: ₹$balance\n";
    file_put_contents("donations.txt", $data, FILE_APPEND);

    echo "<h2>✅ Record Updated Successfully!</h2>";
    echo "<p>$month details saved.</p>";
    echo "<a href='admin.html'>Back to Admin Panel</a>";
}
?>
