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
                <i class="material-icons">assignment_turned_in</i>
                Toma de Asistencia
            </a>
            <ul id="nav-mobile" class="center hide-on-med-and-down">
                <?php
                    session_start();
                    echo "<li><a>".$_SESSION['alumno']['ID_alumno']."</a></li>";
                    echo "<li><a>".$_SESSION['alumno']['nombre']."</a></li>";
                ?>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>

    <div class="row center-align">
        <div class="col s3"></div>
        <form class="col s6 card  " method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input id="class_id" type="text" class="" name="id">
                    <label for="class_id">Inserta el ID de la asistencia correspondiente al curso</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="user_id" class="materialize-textarea" name="datos"></textarea>
                    <label for="user_id">Inserta tu numero de ID para tomar la asistencia</label>
                </div>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action" formaction="insert.php" >Tomar asistencia
                    <i class="material-icons right">add</i>
                </button>
            </div>
        </form>
    </div>

    <div class="row">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include("../connect/connect.php");
        $busrcar = "SELECT asistencia.ID_asistencia, asistencia.estado, asistencia.fecha, asignacion.ID_asignacion, asignacion.h_inicio, asignacion.h_fin, materia.ID_materia, materia.materia, curso.ID_curso, curso.carrera, curso.seccion, curso.ciclo, alumno.ID_alumno, alumno.nombre FROM ((((asistencia INNER JOIN asignacion on asistencia.ID_asignacion = asignacion.ID_asignacion) INNER JOIN materia on asignacion.ID_materia = materia.ID_materia) INNER JOIN curso ON asignacion.ID_curso = curso.ID_curso) INNER JOIN alumno ON curso.ID_curso = alumno.ID_curso) WHERE alumno.ID_alumno = '".$_SESSION['alumno']['ID_alumno']."'";
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
                    <span class="card-title grey-text text-darken-4">ID Asistencia: ' . $filas['ID_asistencia'] . '<i class="material-icons right">close</i></span>
                    <p>Estado de la Asistencia: '.$filas['estado'].'</p>
                    <p>Fecha: '.$filas['fecha'].'</p>
                    <div class="row center-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="takeAssitence('.$filas['ID_asistencia'].')" >Ir a asistencia de este curso
                        <i class="material-icons right">add</i>
                    </button>
                </div>
                </div>
            </div>
            </div>
            ';
            }
        }
        ?>
    </div>

</body>

<script type="text/javascript" src="../js/materialize.min.js">
  
</script>
<script>
      function takeAssitence(classID ) {
        document.getElementById("class_id").value = classID;
        document.getElementById("class_id").focus();
    }
</script>
</html>