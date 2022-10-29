<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $catedratico = $_POST['catedratico'];
                $materia = $_POST['materia'];
                $busrcar = "INSERT INTO materia VALUES('".$id."','".$catedratico."','".$materia."')";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>