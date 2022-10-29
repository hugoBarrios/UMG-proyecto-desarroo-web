<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $materia = $_POST['materia'];
                $curso = $_POST['curso'];
                $inicio = $_POST['inicio'];
                $fin = $_POST['fin'];
                $busrcar = "DELETE FROM asignacion WHERE ID_asignacion = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>