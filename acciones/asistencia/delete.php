<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $asignacion = $_POST['asignacion'];
                $fecha = $_POST['fecha'];
                $estado = $_POST['estado'];
                $datos = $_POST['datos'];
                $busrcar = "DELETE FROM asistencia WHERE ID_asistencia = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>