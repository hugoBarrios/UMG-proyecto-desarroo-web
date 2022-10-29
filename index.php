<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/general.css" media="screen,projection" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Asistencia</title>
</head>

<body>

    <nav>
        <div class="nav-wrapper  teal lighten-1">
            <a href="#" class="brand-logo center">
                <i class="material-icons">group</i>
                Wally Attendance
            </a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <!--aqui van los viculos del navbar-->
            </ul>
        </div>
    </nav>

    <br>
    <br>
    <div class="row">
        <div class="col s4"></div>
        <form action="login/login.php" class="col s4 card" method="POST">
            <div class="row center-align">
                <h1>Login</h1>
            </div>
            <div class="row center-align">
                <i class="large material-icons">verified_user</i>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate" name="contra">
                    <label for="last_name">Numero de ID / Contraseña</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate" name="nombre">
                    <label for="last_name">Nombre completo</label>
                </div>
            </div>
            <div class="row">
                <div class="col s1"></div>
                <p class="col s10" id="info_login">Si ya eres miembro, inicia sesión utilizando tus credenciales. En caso contrario comunícate con tu centro de estudios.</p>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Iniciar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

</body>

<script type="text/javascript" src="js/materialize.min.js"></script>

</html>