<?php
ob_start();
// Connection variables
$servername = "188.166.24.55";
$username = "jepsen5-anishanderson";
$password = "m4xM0z,)C&4gGrg}XN2<";
$dbname = "jepsen5-anishanderson";
$port = "";

// PDO to database
try {
    $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected succesfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$id = $_POST['id'] ?? null;
// echo '<pre>';
// var_dump($id);
// echo '</pre>';

if (!$id) {
    header("Location: index.php");
    exit;
}

// DELETE FROM `jepsen5-anishanderson`.`hikes` WHERE (`id` = '57');

$delete = $pdo->prepare("DELETE FROM hikes WHERE (id = :id)");

$delete->bindValue(':id', $id);

$delete->execute();

header('Location: index.php');







// redirect to index page

ob_end_flush();
