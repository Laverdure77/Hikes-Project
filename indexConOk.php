<?php
$servername = "188.166.24.55";
$username = "jepsen5-anishanderson";
$password = "m4xM0z,)C&4gGrg}XN2<";
$dbname = "jepsen5-anishanderson";
$port = "";
try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>