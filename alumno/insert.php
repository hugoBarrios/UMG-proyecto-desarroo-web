<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../connect/connect.php");
                $id = $_POST['id'];
                $datos = $_POST['datos'];
                $busrcar = "SELECT * FROM asistencia WHERE id_asistencia = '".$id."'";
                $resultado = $conn->query($busrcar);
                if ($resultado->num_rows >0) {
                    $filas = $resultado->fetch_assoc();
                    $busrcar = "UPDATE asistencia SET datos = '".$datos.",".$filas['datos']."' WHERE id_asistencia = '".$id."'";
                    $resultado = $conn->query($busrcar);
                    $insertAssistanceQuery = "INSERT INTO master_asist (ID_asignacion, fecha, estado, ID_alumno) VALUES ('".$filas['ID_asignacion']."', '".$filas['fecha']."','".$filas['estado']."','".$datos."')";
                    $conn->query($insertAssistanceQuery);
                    header('Location: alumno_home.php');
                }
                header('Location: alumno_home.php');
?>