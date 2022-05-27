<?php
// Új session indítása
session_start();
 
// Ellenőrizzük, hogy be van-e lépve a user, ha nincs átirányítjuk a beléptetéshez.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: fo3.php");
    exit;
}
?>
 
 <!DOCTYPE html>
<html lang="hu">
<head>
    <title>KVÍZ - Tentacles Projekt - Toplista</title>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="./assets/css/toplista.css">

</head>
<body>

    
</head>


<html>
<body>

<?php

require_once "config.php";

$sql = "SELECT * FROM toplista ORDER BY score DESC LIMIT 10";
$result = $mysqli->query($sql);
$sorszam =0;?>
<div class="col-xs-11 col-sm-10 col-md-6 col-lg-6 col-xl-6 align-middle toptabla">
  <h3 class="my-5">Üdvözlet <strong><?php echo htmlspecialchars($_SESSION["username"]); '!'?></strong></h3>
      <h5>A Kvíz játék aktuális top 10-es listája</h5>
      <hr>
      <br>

<?php if ($result->num_rows > -1) {?>
  <table><tr><th>Helyezés</th><th>Játékosnév</th><th>Pontszám</th></tr>  
  <colgroup>
    <col style="width: 10%;">
    <col style="width: 30%;">
    <col style="width: 10%;">    
  </colgroup>

  <?php

  // Soronkénti találatkezelés
  while($row = $result->fetch_assoc()) {
    $sorszam =$sorszam+1;
    echo "<tr><td>".$sorszam."</td><td>".$row["username"]."</td><td>".$row["score"]."</td></tr>";    
    
    
  }
  echo "</table>";?>
  <div class="form-group">
    <br>
    <hr>
    <br>
              <p>
                  <a href="fo3.php" class="btn btn-outline-success">Visszatérés a főoldalra</a>
                  
              </p>
  </div>

<?php
} else {
  echo "0 results";
}
$mysqli->close();
?>
</div>

    


</body>
</html>