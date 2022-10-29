<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("../connect/connect.php");
    session_start();
    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];
    if (empty($nombre) && empty($conta)) {
        header('Location: ../index.php');
    } else {
        $buscar = "SELECT * FROM alumno WHERE ID_alumno = '".$contra."' and nombre = '".$nombre."'";
        $resultado = $conn->query($buscar);
        if ($resultado->num_rows == 1) {
            $datos = $resultado->fetch_assoc();
            $_SESSION['alumno'] = $datos;
            header('Location: ../alumno/alumno_home.php');
        }else {
            $buscar = "SELECT * FROM catedratico WHERE ID_catedratico = '".$contra."' and nombre = '".$nombre."'";
            $resultado = $conn->query($buscar);
            if ($resultado->num_rows == 1) {
                $datos = $resultado->fetch_assoc();
                $_SESSION['catedratico'] = $datos;
                header('Location: ../catedratico/catedratico_home.php');
            }else {
                $buscar = "SELECT * FROM usuario WHERE contraseña = '".$contra."' and nombre = '".$nombre."'";
                $resultado = $conn->query($buscar);
                if ($resultado->num_rows == 1) {
                    header('Location: ../admin/admin_home.php');
                }else {
                    header('Location: ../index.php');
                }
            }
        }
        mysqli_close($conn);
    }
?>