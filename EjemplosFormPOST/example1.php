<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $er1 = true;
    $er2 = true;
    $er3 = true;
    $er4 = true;
    
    if ($_POST['clienteInput'] == '') {
        $error1 = 'El nombre del cliente es obligatorio.';
    }else{
        $er1 = false;
        $nombreCliente = $_POST['clienteInput'];
    }

    if ($_POST['TamanoInput'] == '') {
        $error2 = 'El Tamaño es obligatorio.';
    }else{
        $er2 = false;
        $tamanoPizza = $_POST['TamanoInput'];
    }

    if ($_POST['cantidadInput'] == '') {
        $error3 = 'La cantidad es obligatoria.';
    }else{
        $er3 = false;
        $cantidadPizzas = $_POST['cantidadInput'];
    }

    if ($_POST['ingredientesInput'] == '') {
        $error4 = 'La cantidad de ingredientes es obligatorio.';
    }else{
        $er4 = false;
        $cantidadIngredientes = $_POST['ingredientesInput'];
    }

    if(!$er1 && !$er2 && !$er3 && !$er4){
        if ($cantidadIngredientes <= 3) {
            switch ($tamanoPizza) {
                case 'CH':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format((100 * (int) $cantidadPizzas),2);
                    break;
                case 'M':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format((120 * (int) $cantidadPizzas),2);
                    break;
                case 'G':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format((150 * (int) $cantidadPizzas),2);
                    break;
                case 'F':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format((200 * (int) $cantidadPizzas),2);
                    break;
            }
        } else {
            switch ($tamanoPizza) {
                case 'CH': 
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format(((100 * (int) $cantidadPizzas) + ((((int) $cantidadIngredientes - 3) * 10) * (int) $cantidadPizzas)), 2);
                    break;
                case 'M':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format(((120 * (int) $cantidadPizzas) + ((((int) $cantidadIngredientes - 3) * 10) * (int) $cantidadPizzas)), 2);
                    break;
                case 'G':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format(((150 * (int) $cantidadPizzas) + ((((int) $cantidadIngredientes - 3) * 10) * (int) $cantidadPizzas)), 2);
                    break;
                case 'F':
                    $mensaje = "Hola ".$nombreCliente.", el costo es: $" . number_format(((200 * (int) $cantidadPizzas) + ((((int) $cantidadIngredientes - 3) * 10) * (int) $cantidadPizzas)), 2);
                    break;
            }
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
    <title>Pizzeria Don Canul!</title>
</head>

<body>
    <div class="container mt-2">
        <h1>Bienvenido a Pizzeria Don Canul!</h1>
        <form action="Tarea311.php" method="POST">
            <div class="form-group">
                <label for="clienteInput">Nombre del Cliente</label>
                <input name="clienteInput" type="text" class="form-control" id="clienteInput"
                    value="<?php if (isset($_POST['clienteInput'])) {echo $_POST['clienteInput'];}?>">
            </div>
            <?php if (isset($error1)) {echo '<div class="alert alert-danger" role="alert">' . $error1 . '</div>';}?>
            <div class="form-group">
                <label for="TamanoInput">Tamaño de Pizza</label>
                <select name="TamanoInput" class="form-control" id="TamanoInput">
                    <option value="">--- Seleccione una Opción ---</option>
                    <?php
$tamanos_pizza = array(
    'CH' => 'Chica',
    'M' => 'Mediana',
    'G' => 'Grande',
    'F' => 'Familiar',
);

if (!isset($_POST['TamanoInput'])) {
    foreach ($tamanos_pizza as $value => $display_text) {
        echo '<option value="' . $value . '" >' . $display_text . '</option>';
    }
} else {
    foreach ($tamanos_pizza as $value => $display_text) {
        $selected = ($value == $_POST['TamanoInput']) ? ' selected="selected"' : "";
        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
    }
}
?>
                </select>
            </div>
            <?php if (isset($error2)) {echo '<div class="alert alert-danger" role="alert">' . $error2 . '</div>';}?>
            <div class="form-group">
                <label for="cantidadInput">Cantidad</label>
                <input name="cantidadInput" type="number" class="form-control" id="cantidadInput"
                    value="<?php if (isset($_POST['clienteInput'])) {echo $_POST['cantidadInput'];}?>">
            </div>
            <?php if (isset($error3)) {echo '<div class="alert alert-danger" role="alert">' . $error3 . '</div>';}?>
            <div class="form-group">
                <label for="ingredientesInput">No. Ingredientes</label>
                <input name="ingredientesInput" type="number" class="form-control" id="ingredientesInput"
                    value="<?php if (isset($_POST['clienteInput'])) {echo $_POST['ingredientesInput'];}?>">
            </div>
            <?php if (isset($error4)) {echo '<div class="alert alert-danger" role="alert">' . $error4 . '</div>';}?>
            <button type="submit" class="btn btn-primary">Enviar Datos</button>

            <?php if (isset($mensaje)) {echo '<div class="alert alert-success mt-4" role="alert">' . $mensaje . '</div>';}?>
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