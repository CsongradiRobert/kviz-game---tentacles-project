<?php
// Új session indítása
session_start();
 
require_once "config.php";

// Ellenőrizzük, hogy be van-e lépve a user, ha nincs átirányítjuk a beléptetéshez.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: fo3.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Üdvözlő oldal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./assets/graphs/tentacles_flavicons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/e1a01595a9.js" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>


<html>
<body>
    <h1 class="my-5">Helló kedves <b><?php echo htmlspecialchars($_SESSION["username"]); '!'?></b>. Itt lesz a toplista hamarosan ám!</h1>
    <p>Készül-készül... :)</p>
   

    <p id="countdown"></p>

    <div class="form-group">
            <p>
                <a href="fo3.php" class="btn btn-warning">Visszatérés a főoldalra</a>
                <a href="logout.php" class="btn btn-danger ml-3">Kijelentkezés</a>
            </p>
                </div>




<?php

require_once "config.php";

$sql = "SELECT * FROM toplista ORDER BY score DESC LIMIT 10";
$result = $mysqli->query($sql);
$sorszam =0;
if ($result->num_rows > 2) {

  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo $sorszam."  ". "Játékosnév:  ". $row["username"]. " Pontszám:   " . $row["score"]. "<br>";
    $sorszam =$sorszam+1;
  }
} else {
  echo "0 results";
}
$conn->close();
?>




</body>
</html>