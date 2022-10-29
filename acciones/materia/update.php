<?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../../connect/connect.php");
                $id = $_POST['id'];
                $catedratico = $_POST['catedratico'];
                $materia = $_POST['materia'];
                $busrcar = "UPDATE materia SET ID_catedratico = '".$catedratico."', materia = '".$materia."' where id_materia = '".$id."'";
                $resultado = $conn->query($busrcar);
                header('Location: form.php');
?>