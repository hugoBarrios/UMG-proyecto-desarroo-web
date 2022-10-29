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
        <div class="nav-wrapper  teal lighten-1">
            <a href="#" class="brand-logo center">Asistencia</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <!--aqui van los viculos del navbar-->
            </ul>
        </div>
    </nav>

    <br>
    <br>
    <div class="row">
        <div class="col s4"></div>
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
                <button class="btn waves-effect waves-light" type="submit" name="action" formaction="update.php">Modificar
                    <i class="material-icons right">autorenew</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action" formaction="delete.php">Eliminar
                    <i class="material-icons right">delete_forever</i>
                </button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col s2"></div>
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
                include("../../connect/connect.php");
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

</body>

<script type="text/javascript" src="../../js/materialize.min.js"></script>

</html>