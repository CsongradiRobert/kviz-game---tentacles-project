<?php
/* Adatbázis hitelesítő adatok */
define('DB_SERVER', '185.111.89.206');
define('DB_USERNAME', 'csongra3_csongra3');
define('DB_PASSWORD', 'Macika740412');
define('DB_NAME', 'csongra3_kviz');
 
/* Kapcsolódási kísérlet az MySQL adatbázishoz */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Kapcsolat ellenőrzése.
if($mysqli === false){
    die("HIBA: Nem sikerült kapcsolódni!" . $mysqli->connect_error);
}


?>