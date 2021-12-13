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


// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';


// echo '<pre>';
// echo($_SERVER['RESQUEST_METHOD']);
// echo '</pre>';
// exit;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $title = $_POST['title'];
  $distance = $_POST['distance'];
  // $image = '';                //$_POST["image"]
  // $duration = $_POST["duration"];
  // $location = $_POST["location"];
  // $elevation = $_POST["elevation"];
  // $description = $_POST["description"];
  
  $input = $pdo->prepare("INSERT INTO hikes (title, distance) VALUES (:title, :distance);");

  $input->bindValue(':title', $title);
  $input->bindValue(':distance', $distance);

  // $input->bindValue(':duration', $duration);
  // $input->bindValue(':elevation', $elevation);
  // $input->bindValue(':location', $location);
  // $input->bindValue(':image', '');
  // $input->bindValue(':description', $description);

  // echo'<pre>';
  // var_dump($_POST);
  // echo '</pre>';


  $input->execute();

  // echo '<pre>';
  // var_dump($input);
  // echo '</pre>';
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="basic.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Add new Hike</title>
</head>

<body>
  <h1 class="title">Add new Hike</h1>

  <form action="" method="POST">

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control">
    </div>
    <br>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image">
    </div>

    <div class="mb-3">
      <label class="form-label">Location</label>
      <input type="text" name="location" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">duration</label>
      <input type="time" name="duration" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">distance</label>
      <input type="number" name="distance" step="0.1" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Elevation gain</label>
      <input type="number" name="elevation" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" name="description"></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>

    <a class="btn btn-primary btn-sm" href="index.php">Home</a>

  </form>
</body>

</html>