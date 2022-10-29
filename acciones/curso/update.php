<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $carrera = $_POST['carrera'];
                $seccion = $_POST['seccion'];
                $ciclo = $_POST['ciclo'];
                $busrcar = "UPDATE curso SET carrera = '".$carrera."', seccion = '".$seccion."', ciclo = '".$ciclo."' where id_curso = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>