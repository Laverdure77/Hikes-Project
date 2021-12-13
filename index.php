<?php
$servername = "188.166.24.55";
$username = "jepsen5-anishanderson";
$password = "m4xM0z,)C&4gGrg}XN2<";
$dbname = "jepsen5-anishanderson";
$port = "";
try {
  $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected succesfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$selectAll = $pdo->prepare("SELECT * from hikes ORDER BY title ASC;");
$selectAll->execute();
$hikes = $selectAll->fetchAll(PDO::FETCH_ASSOC);

// echo'<pre>';
// var_dump($hikes);
// echo '</pre>';

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
    <h1>Hikes</h1>
    
    <a href="add.php" class="btn btn-success btn-sm">Add new Hike</a>
   
    <?php
    foreach($hikes as $h => $hike): ?>



<div class="card " style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h6><?php echo $hike["id"];?></h6>
        <h5 class="card-title"><?php echo $hike["title"]; ?></h5>
        <p class="card-text"><?php echo $hike["duration"]; ?> min</p>
        <p class="card-text"><?php echo $hike["elevation"];?> mètres</p>
        <p class="card-text"><?php echo $hike["distance"]; ?> km</p>
        <button type="button" class="btn btn-primary btn-sm">Edit</button>
        <button type="button" class="btn btn-danger btn-sm">Delete</button>
        <a href="#" class="btn btn-primary btn-sm">Full description</a>
    </div>
</div>




    
    <?php endforeach; ?>
  </body>
</html>










