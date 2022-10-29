<?php
$servername = "localhost";
$database = "asisitencia";
$username = "hugo";
$password = "hugo";
$port = "3306";
// creacion de la conexion
$conn = mysqli_connect($servername, $username, $password, $database, $port);
// conprobando la conexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);
?>