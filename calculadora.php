<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="number"],
        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .resultado {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora Simple</h1>

        <!-- Formulario para ingresar los números y la operación -->
        <form method="post" action="">
            <label for="numero1">Número 1:</label>
            <input type="number" id="numero1" name="numero1" step="any" required>
            <label for="numero2">Número 2:</label>
            <input type="number" id="numero2" name="numero2" step="any" required>
            <label for="operacion">Operación:</label>
            <select id="operacion" name="operacion" required>
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <input type="submit" value="Calcular">
        </form>

        <?php
        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los valores del formulario
            $numero1 = isset($_POST['numero1']) ? floatval($_POST['numero1']) : null;
            $numero2 = isset($_POST['numero2']) ? floatval($_POST['numero2']) : null;
            $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';

            // Validar que los números y la operación no estén vacíos
            if ($numero1 !== null && $numero2 !== null && $operacion !== '') {
                // Variable para almacenar el resultado
                $resultado = null;

                // Realizar la operación correspondiente
                switch ($operacion) {
                    case 'suma':
                        $resultado = $numero1 + $numero2;
                        break;
                    case 'resta':
                        $resultado = $numero1 - $numero2;
                        break;
                    case 'multiplicacion':
                        $resultado = $numero1 * $numero2;
                        break;
                    case 'division':
                        // Verificar si el divisor no es cero
                        if ($numero2 != 0) {
                            $resultado = $numero1 / $numero2;
                        } else {
                            $resultado = 'Error: División por cero';
                        }
                        break;
                    default:
                        $resultado = 'Operación no válida';
                }

                // Mostrar el resultado
                echo "<div class='resultado'>Resultado: " . htmlspecialchars($resultado) . "</div>";
            } else {
                echo "<div class='error'>Por favor, complete todos los campos.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
