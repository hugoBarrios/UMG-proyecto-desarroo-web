<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $curso = $_POST['curso'];
                $nombre = $_POST['nombre'];
                $busrcar = "DELETE FROM alumno WHERE ID_alumno = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>