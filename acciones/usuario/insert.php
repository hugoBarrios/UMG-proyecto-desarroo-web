<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $contra = $_POST['contra'];
                $nombre = $_POST['nombre'];
                $busrcar = "INSERT INTO usuario VALUES('".$id."','".$nombre."','".$contra."')";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>