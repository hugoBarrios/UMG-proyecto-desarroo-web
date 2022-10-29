<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $contra = $_POST['contra'];
                $nombre = $_POST['nombre'];
                $busrcar = "UPDATE usuario SET nombre = '".$nombre."', contraseña = '".$contra."' where id_usuario = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>