<?php
    include("../connect/connect.php");
    // id student
    $id = $_POST['id'] ?? '';
    // date
    $dateStart = $_POST['dateStart'] ?? '';
    // $id = '1990-19-6344';
    // $date = '2022-10-01';
    // get all courses
    $query = "SELECT * FROM curso";
    $result = $conn->query($query);
    $cursos = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cursos[] = $row;
        }
    }
    // echo json_encode($alumnos);
    ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/general.css" media="screen,projection" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Asistencia</title>

</head>

<body>
    <nav>
        <div class="nav-wrapper teal lighten-1">
            <a href="/admin/admin_home.php" class="brand-logo">
                <i class="material-icons">remove_red_eye</i>
                Administrador del Sitio
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../acciones/curso/form.php">Curso</a></li>
                <li><a href="../acciones/alumno/form.php">Alumno</a></li>
                <li><a href="../acciones/catedratico/form.php">Catedratico</a></li>
                <li><a href="../acciones/materia/form.php">Materia</a></li>
                <li><a href="../acciones/asignacion/form.php">Asignacion</a></li>
                <li><a href="../acciones/asistencia/form.php">Asistencia</a></li>
                <li><a href="../acciones/usuario/form.php">Usuario</a></li>
            </ul>
        </div>
    </nav>
    <h5 class="center-align">Asistencia Curso Fecha</h5>
    <div class="row">
        <div class="col s4"></div>
        <form class="col s4 card" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s12">
                        <select name="id">
                            <option value="" disabled selected>Selecciona una opcion</option>
                            <?php foreach ($cursos as $curso) : ?>
                            <option value="<?php echo $curso['ID_curso']?>">
                                <?php echo $curso['carrera'] .'  '.$curso['seccion']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <label>Cursos</label>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate" name="dateStart">
                    <label for="last_name">Fecha</label>
                </div>
            </div>


            <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action"
                    formaction="/admin/getCourseDate.php">Generar
                    <i class="material-icons right">search</i>
                </button>

            </div>
        </form>
    </div>
    <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                // get number of alumnos asignados to a course
                $buscar2 = "SELECT * FROM alumno WHERE ID_curso ='$id'";
                $resultado2 = $conn->query($buscar2);
                $numAlumnos = $resultado2->num_rows;
                $buscar3 = "SELECT * FROM master_asist INNER JOIN asignacion  WHERE asignacion.ID_curso = '$id' AND fecha = '$dateStart'" ;
                // $buscar = "SELECT * FROM master_asist WHERE fecha = '".$dateStart."';
                $resultado3 = $conn->query($buscar3);
                $numAlumnosAsist = $resultado3->num_rows;
                $numAlumnosNoAsist = $numAlumnos - $numAlumnosAsist;
                if ($resultado2->num_rows >0) {
            ?>
    <div class="row">
        <div class="col s2"></div>
        <div class="col s8">
            <table class="white card striped">
                <thead>
                    <tr>

                        <th>Total alumnos</th>
                        <th>Asisitieron</th>
                        <th>No Asisitieron</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td><?php echo $numAlumnos ?></td>
                        <td><?php echo $numAlumnosAsist ?></td>
                        <td><?php echo $numAlumnosNoAsist ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
                }
            ?>

    <h6 class="center-align">Detalle asistencias</h6>
    <div class="row">
        <div class="col s2"></div>
        <div class="col s8">
            <table class="white card striped">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Alumno</th>
                        <th>Fecha</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
               // get course id fron course table using a join
                $buscar = "SELECT * FROM master_asist INNER JOIN asignacion  WHERE asignacion.ID_curso = '$id' AND fecha = '$dateStart'" ;
                // $buscar = "SELECT * FROM master_asist WHERE fecha = '".$dateStart."';
                $resultado = $conn->query($buscar);
                if ($resultado->num_rows >0) {
                    while ($filas = $resultado->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $filas['ID_curso']?></td>
                        <td><?php echo $filas['ID_alumno']?></td>
                        <td><?php echo $filas['fecha']?></td>
                    </tr>
                    <?php
                    }
                }else{
                 ?>
                    <tr>
                        No se encontro datos para este curso
                    </tr>
                    <?php
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>


</body>


<script type="text/javascript" src="../../js/materialize.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, ['left']);
});
</script>

</html>