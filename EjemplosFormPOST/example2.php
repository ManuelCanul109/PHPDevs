<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $er1 = true;
    $er2 = true;
    $er3 = true;
    $er4 = true;
    
    if ($_POST['nombreAlumnoInput'] == '') {
        $error1 = 'El nombre del Alumno es obligatorio.';
    }else{
        $er1 = false;
        $nombreAlumno = $_POST['nombreAlumnoInput'];
    }

    if ($_POST['carreraAlumnoInput'] == '') {
        $error2 = 'La Carrera del Alumno es obligatoria.';
    }else{
        $er2 = false;
        $carreraAlumno = $_POST['carreraAlumnoInput'];
    }

    if ($_POST['fechaNacimientoInput'] == '') {
        $error3 = 'La fecha de nacimiento del alumno es obligatoria.';
    }else{
        $er3 = false;
        $nacimientoAlumno = $_POST['fechaNacimientoInput'];
    }

    if (!isset($_POST['radioSexo'])) {
        $error4 = 'El sexo del alumno es obligatorio.';
    }else{
        $er4 = false;
        $sexoAlumno = $_POST['radioSexo'];
    }

    if (!isset($_POST['checkBeca'])) {
        $TEXTOBECA = 'NO tiene beca.';
    }else{
        $TEXTOBECA = 'SI tiene beca.';
    }

    if(!$er1 && !$er2 && !$er3 && !$er4){
        $sexo = ($sexoAlumno == 'H') ? "Hombre" : "Mujer";
        $mensaje = "Por este medio me permito presentar al Br. ".$nombreAlumno.", quien es alumno(a) de la Carrera de ".$carreraAlumno.", con fecha de nacimiento del ".date('d-m-Y', strtotime($nacimientoAlumno))." siendo un ".$sexo." y quien ".$TEXTOBECA;
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Alumnos UniModelo!</title>
</head>

<body>
    <div class="container mt-2">
        <h1>Bienvenido al Generador de Constancias de UniModelo!</h1>
        <form action="Tarea312.php" method="POST">

            <div class="form-group">
                <label for="nombreAlumnoInput">Nombre del Alumno</label>
                <input name="nombreAlumnoInput" type="text" class="form-control" id="nombreAlumnoInput" value="<?php if (isset($_POST['nombreAlumnoInput'])) {echo $_POST['nombreAlumnoInput'];}?>">
            </div>

            <?php if (isset($error1)) {echo '<div class="alert alert-danger" role="alert">' . $error1 . '</div>';}?>

            <div class="form-group">
                <label for="carreraAlumnoInput">Carrera del Alumno</label>
                <select name="carreraAlumnoInput" class="form-control" id="carreraAlumnoInput">
                    <option value="">--- Seleccione una Opción ---</option>
                    <?php
$carreras = array(
    'IAM' => 'Ingeniería Automotriz',
    'IBM' => 'Ingeniería Biomedica',
    'DTS' => 'Ingeniería Desarrollo de Tecnologia y Software',
    'IMK' => 'Ingeniería Mecatronica',
    'IIL' => 'Ingeniería Industrial Logistica',
    'IEP' => 'Ingeniería Energia y Petroleo',
);

if (!isset($_POST['carreraAlumnoInput'])) {
    foreach ($carreras as $value => $display_text) {
        echo '<option value="' . $value . '" >' . $display_text . '</option>';
    }
} else {
    foreach ($carreras as $value => $display_text) {
        $selected = ($value == $_POST['carreraAlumnoInput']) ? ' selected="selected"' : "";
        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
    }
}
?>


                </select>
            </div>

            <?php if (isset($error2)) {echo '<div class="alert alert-danger" role="alert">' . $error2 . '</div>';}?>

            <div class="form-group">
                <label for="fechaNacimientoInput">Fecha de Nacimiento del Alumno</label>
                <input name="fechaNacimientoInput" type="date" class="form-control" id="fechaNacimientoInput" value="<?php if (isset($_POST['fechaNacimientoInput'])) {echo $_POST['fechaNacimientoInput'];}?>">
            </div>

            <?php if (isset($error3)) {echo '<div class="alert alert-danger" role="alert">' . $error3 . '</div>';}?>

            <div class="form-group">
                <label>Sexo del Alumno</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSexo" id="radioHombre" value="H" <?php if (!isset($_POST['radioSexo'])) { echo ''; }else{ if('H' == $_POST['radioSexo']){ echo 'checked'; }} ?>>
                    <label class="form-check-label" for="radioHombre">
                        Hombre
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSexo" id="radioMujer" value="M" <?php if (!isset($_POST['radioSexo'])) { echo ''; }else{ if('M' == $_POST['radioSexo']){ echo 'checked'; }} ?>>
                    <label class="form-check-label" for="radioMujer">
                        Mujer
                    </label>
                </div>
            </div>

            <?php if (isset($error4)) {echo '<div class="alert alert-danger" role="alert">' . $error4 . '</div>';}?>

            <div class="form-group">
            <label>El alumno cuenta con beca</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="SI" name="checkBeca" id="checkBeca" <?php if (!isset($_POST['checkBeca'])) { echo ''; }else{ if('SI' == $_POST['checkBeca']){ echo 'checked'; }} ?>>
                    <label class="form-check-label" for="checkBeca">
                        Si tiene
                    </label>
                </div>
            </div>

            

            <button type="submit" class="btn btn-primary">Enviar Datos</button>

            <?php if (isset($mensaje)) {echo '<div class="alert alert-info mt-4" role="alert">' . $mensaje . '</div>';}?>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>