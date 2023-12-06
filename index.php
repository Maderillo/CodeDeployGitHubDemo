<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calculator {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculadora WEB</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="num1">Número 1:</label>
            <input type="text" name="num1" required>
            <br>
            <label for="num2">Número 2:</label>
            <input type="text" name="num2" required>
            <br><br>
            <label>Operación:</label>
            <select name="operation">
                <option value="sum">Suma</option>
                <option value="subtract">Resta</option>
                <option value="multiply">Multiplicación</option>
                <option value="divide">División</option>
            </select>
            <br><br>
            <input type="submit" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];

            switch ($operation) {
                case "sum":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error: No se puede dividir por cero, cambiar numero por favor.";
                    }
                    break;
                default:
                    $result = "Error: Operación no válida.";
            }

            echo "<br><br><strong>Resultado:</strong> " . $result;
        }
        ?>
    </div>
</body>
</html>
