<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $er1 = true;
    $er2 = true;
    $er3 = true;


    if(isset($_GET['nombreUsuarioInput']) && isset($_GET['edadUsuarioInput'])){
        if ($_GET['nombreUsuarioInput'] == '') {
            $error1 = 'El nombre del Usuario es obligatorio.';
        }else{
            $er1 = false;
            $nombreUsuario = $_GET['nombreUsuarioInput'];
        }
    
        if ($_GET['edadUsuarioInput'] == '') {
            $error2 = 'La edad del Usuario es obligatoria.';
        }else{
            $er2 = false;
            $edadAlumno = $_GET['edadUsuarioInput'];
        }
    
        if (!isset($_GET['radioSexo'])) {
            $error3 = 'El sexo del Usuario es obligatorio.';
        }else{
            $er3 = false;
            $sexoUuario = $_GET['radioSexo'];
        }
    
        if(!$er1 && !$er2 && !$er3){
            $sexo = ($sexoUuario == 'H') ? "Hombre" : "Mujer";
            $mensaje = "Por este medio me permito presentar al Usuario: ".$nombreUsuario.", tiene una edad de ".$edadAlumno." y es ".$sexo.".";
        }
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
        <h1>Bienvenido al Generador de Usuarios!</h1>
        <form action="Tarea313.php" method="GET">

            <div class="form-group">
                <label for="nombreUsuarioInput">Nombre de Usuario</label>
                <input name="nombreUsuarioInput" type="text" class="form-control" id="nombreUsuarioInput" value="<?php if (isset($_GET['nombreUsuarioInput'])) {echo $_GET['nombreUsuarioInput'];}?>">
            </div>

            <?php if (isset($error1)) {echo '<div class="alert alert-danger" role="alert">' . $error1 . '</div>';}?>
            
            <div class="form-group">
                <label for="edadUsuarioInput">Edad del Usuario</label>
                <input name="edadUsuarioInput" type="text" class="form-control" id="edadUsuarioInput" value="<?php if (isset($_GET['edadUsuarioInput'])) {echo $_GET['edadUsuarioInput'];}?>">
            </div>

            <?php if (isset($error2)) {echo '<div class="alert alert-danger" role="alert">' . $error2 . '</div>';}?>

            <div class="form-group">
                <label>Sexo del Usuario</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSexo" id="radioHombre" value="H" <?php if (!isset($_GET['radioSexo'])) { echo ''; }else{ if('H' == $_GET['radioSexo']){ echo 'checked'; }} ?>>
                    <label class="form-check-label" for="radioHombre">
                        Hombre
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioSexo" id="radioMujer" value="M" <?php if (!isset($_GET['radioSexo'])) { echo ''; }else{ if('M' == $_GET['radioSexo']){ echo 'checked'; }} ?>>
                    <label class="form-check-label" for="radioMujer">
                        Mujer
                    </label>
                </div>
            </div>

            <?php if (isset($error3)) {echo '<div class="alert alert-danger" role="alert">' . $error3 . '</div>';}?>

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