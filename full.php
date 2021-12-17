<?php
ob_start();
$id = $_GET['id'];

$servername = "188.166.24.55";
$username = "jepsen5-anishanderson";
$password = "m4xM0z,)C&4gGrg}XN2<";
$dbname = "jepsen5-anishanderson";
$port = "";
try {
    $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected succesfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$selectOne = $pdo->prepare("SELECT * from hikes WHERE id = :id;");
$selectOne->bindValue(':id', $id);
$selectOne->execute();
$datas = $selectOne->fetch(PDO::FETCH_ASSOC);




ob_end_flush();

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="basic.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hikes</title>
</head>

<body>
    <h1>Hike: <?php echo $datas['title'] ?></h1>






    <div class="card " style="width: 18rem;">

        <div class="card-body">
            <?php if ($datas["image"]) : ?>
                <img src="<?php echo $datas['image'] ?>" class="card-img-top" alt="...">
            <?php endif; ?>

            
            
            <p class="card-text"> Duration: <?php echo $datas["duration"]; ?> min</p>
            <p class="card-text">Elevation gain: <?php echo $datas["elevation"]; ?> mètres</p>
            <p class="card-text">Distance : <?php echo $datas["distance"]; ?> km</p>
            <p class="card-text">Description : <?php echo $datas["description"]; ?></p>

            <a href="index.php" class="btn btn-primary btn-sm">Home</a>

        </div>
    </div>






</body>

</html>