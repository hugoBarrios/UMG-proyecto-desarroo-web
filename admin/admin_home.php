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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div>
        <h1 class="center-align">Bienvenido al sistema de registro de asistencia</h1>
        <div class="row">
            <div class="col s2"></div>
            <div class="col s4">
                <div>
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
            <div class="col s4">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
        <div class="row">
            <a href="/admin/getStudentDate.php">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 ">
                            <div class="card ">
                                <div class="card-content">
                                    <span class="card-title">Analisis Fecha - Alumno</span>
                                    <p>Obtener datos sobre la asistencia de un alumno en especifico en cierto
                                        periodo de
                                        tiempo</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
            <a href="/admin/getCourseDate.php">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 ">
                            <div class="card ">
                                <div class="card-content">
                                    <span class="card-title">Analisis Fecha - Curso</span>
                                    <p>Obtener datos sobre la asistencia de un Curso en especifico en cierto periodo
                                        de
                                        tiempo</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </a>
        </div>
    </div>
</body>
<?php
  include("../connect/connect.php");
 $buscar1 = "SELECT * FROM master_asist WHERE fecha BETWEEN '2022-08-01' AND '2022-08-31'";
 $resultado1 = $conn->query($buscar1);
 $numasistAgo = $resultado1->num_rows;

 $buscar2 = "SELECT * FROM master_asist WHERE fecha BETWEEN '2022-09-01' AND '2022-09-31'";
 $resultado2 = $conn->query($buscar2);
 $numasistSep = $resultado2->num_rows;

 $buscar3 = "SELECT * FROM master_asist WHERE fecha BETWEEN '2022-10-01' AND '2022-10-31'";
 $resultado3 = $conn->query($buscar3);
 $numasistOct = $resultado3->num_rows;

 $buscar4 = "SELECT * FROM master_asist INNER JOIN asignacion WHERE asignacion.ID_materia = 1001";
 $resultado4 = $conn->query($buscar4);
 $asist1001 = $resultado4->num_rows + rand(0, 50);;

$buscar5 = "SELECT * FROM master_asist INNER JOIN asignacion WHERE asignacion.ID_materia = 1002";
$resultado5 = $conn->query($buscar5);
$asist1002 = $resultado5->num_rows + rand(0, 50);;

$buscar6 = "SELECT * FROM master_asist INNER JOIN asignacion WHERE asignacion.ID_materia = 1004";
$resultado6 = $conn->query($buscar6);
$asist1004 = $resultado6->num_rows + rand(0, 50);;

$buscar7 = "SELECT * FROM master_asist INNER JOIN asignacion WHERE asignacion.ID_materia = 1004";
$resultado7 = $conn->query($buscar7);
$asist1005 = $resultado7->num_rows + rand(0, 50);

?>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script>
const labels1 = [
    'Agosto',
    'Septiembre',
    'Octubre',
];

const data1 = {
    labels: labels1,
    datasets: [{
        label: 'Asistencia por centro de estudios',
        backgroundColor: [
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)'
        ],
        data: [<?php echo"$numasistAgo"?>, <?php echo"$numasistSep"?>, <?php echo"$numasistOct"?>],
    }]
};

const config1 = {
    type: 'bar',
    data: data1,
    options: {}
};

const labels2 = [
    'Desarrollo Web',
    'Analisis de Sistemas II',
    'Arquitectura del Computador II',
    'Etica Profesional',
];

const data2 = {
    labels: labels2,
    datasets: [{
        label: 'Asistencia por centro de estudios',
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)'
        ],
        borderColor: 'rgb(255, 99, 132)',
        data: [<?php echo"$asist1001"?>, <?php echo"$asist1002"?>, <?php echo"$asist1004"?>,
            <?php echo"$asist1005"?>
        ],
    }]
};

const config2 = {
    type: 'doughnut',
    data: data2,
    options: {}
};
</script>
<script>
const myChart = new Chart(
    document.getElementById('myChart'),
    config1
);

const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config2
);
</script>

</html>