<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/general.css" media="screen,projection" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Asistencia</title>
</head>

<body>

    <nav>
        <div class="nav-wrapper teal lighten-1">
            <a href="#" class="brand-logo center">
                <i class="material-icons">local_library</i>
                Control Docente
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php
                session_start();
                echo "<li><a>" . $_SESSION['catedratico']['ID_catedratico'] . "</a></li>";
                echo "<li><a>" . $_SESSION['catedratico']['nombre'] . "</a></li>";
                ?>
            </ul>
        </div>
    </nav>

    <div class="row">
        <form class="col s4 card" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" name="id">
                    <label for="last_name">ID Asistencia</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" name="asignacion">
                    <label for="last_name">ID Asignacion</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" name="fecha">
                    <label for="last_name">fecha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" name="estado">
                    <label for="last_name">Estado</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="datos"></textarea>
                    <label for="textarea1">Datos</label>
                </div>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action" formaction="insert.php">Agregar
                    <i class="material-icons right">add</i>
                </button>
            </div>
        </form>

        <div class="col s8">
            <table class="white card striped">
                <thead>
                <tr>
                    <th>ID Asistencia</th>
                    <th>ID Asignacion</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Datos</th>
                </tr>
            </thead>
            <tbody>
            <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("../connect/connect.php");
                $busrcar = "SELECT * FROM asistencia";
                $resultado = $conn->query($busrcar);
                if ($resultado->num_rows >0) {
                    while ($filas = $resultado->fetch_assoc()) {
            ?>
                        <tr>
                        <td><?php echo $filas['ID_asistencia']?></td>
                        <td><?php echo $filas['ID_asignacion']?></td>
                        <td><?php echo $filas['fecha']?></td>
                        <td><?php echo $filas['estado']?></td>
                        <td><?php echo $filas['datos']?></td>
                        </tr>
            <?php
                    }
                }
            ?>
            </tbody>
            </table>
        </div>

    </div>

    <div class="row">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include("../connect/connect.php");
        $busrcar = "SELECT materia.ID_materia, materia.materia, catedratico.ID_catedratico, catedratico.nombre, asignacion.ID_asignacion FROM ((materia INNER JOIN catedratico ON materia.ID_catedratico = catedratico.ID_catedratico) INNER JOIN asignacion ON materia.ID_materia = asignacion.ID_materia) WHERE catedratico.ID_catedratico = '" . $_SESSION['catedratico']['ID_catedratico'] . "'";
        $resultado = $conn->query($busrcar);
        if ($resultado->num_rows > 0) {
            while ($filas = $resultado->fetch_assoc()) {
                echo '
            <div class="col s4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="https://www.kindpng.com/picc/m/343-3439406_universidad-mariano-galvez-logo-universidad-mariano-galvez-hd.png">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">' . $filas['materia'] . '<i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">ID Materia: ' . $filas['ID_materia'] . '<i class="material-icons right">close</i></span>
                    <p>ID Catedratico: ' . $filas['ID_catedratico'] . '</p>
                    <p>ID Asignacion: ' . $filas['ID_asignacion'] . '</p>
                    <p>Impoartida por: ' . $filas['nombre'] . '</p>
                </div>
            </div>
            </div>
            ';
            }
        }
        ?>
    </div>

</body>

<script type="text/javascript" src="../js/materialize.min.js"></script>

</html>