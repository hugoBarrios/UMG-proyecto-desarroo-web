<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $busrcar = "UPDATE catedratico SET nombre = '".$nombre."' where id_catedratico = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>