<?php
$target_dir = "assets/events/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    echo "<h3>❌ Only JPG, JPEG, & PNG files are allowed.</h3>";
    exit;
}

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "<h2>✅ Photo Uploaded Successfully!</h2>";
    echo "<p>File saved as: " . htmlspecialchars(basename($_FILES["photo"]["name"])) . "</p>";
    echo "<a href='admin.html'>Back to Admin Panel</a>";
} else {
    echo "<h3>⚠️ Error uploading file. Please try again.</h3>";
}
?>
