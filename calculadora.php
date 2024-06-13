<!DOCTYPE html>
<html>
<head>
    <title>Johnny Morales Gómez - Calculadora</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            width: 100%;
        }
        .calculator h2 {
            margin-bottom: 20px;
        }
        .calculator input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .calculator input[type="submit"] {
            width: calc(50% - 10px);
            padding: 10px;
            margin: 5px 5px 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .calculator input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <script>
        function validateForm() {
            let num1 = document.forms["calcForm"]["num1"].value;
            let num2 = document.forms["calcForm"]["num2"].value;
            let regex = /^[0-9]*\.?[0-9]+$/;

            if (!regex.test(num1)) {
                alert("Por favor, ingrese un número válido para el valor 1.");
                return false;
            }
            if (!regex.test(num2)) {
                alert("Por favor, ingrese un número válido para el valor 2.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="calculator">
        <h2>CALCULADORA</h2>
        <form name="calcForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
            <input type="text" name="num1" placeholder="Valor 1" required ><br>
            <input type="text" name="num2" placeholder="Valor 2" required ><br>
            <input type="submit" name="sumar" value="Sumar">
            <input type="submit" name="restar" value="Restar"><br>
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];

                if (!is_numeric($num1) || !is_numeric($num2)) {
                    echo "Por favor, ingrese valores numéricos válidos.";
                } else {
                    if (isset($_POST['sumar'])) {
                        $resultado = $num1 + $num2;
                        echo "El resultado de la suma es: " . $resultado;
                    } elseif (isset($_POST['restar'])) {
                        $resultado = $num1 - $num2;
                        echo "El resultado de la resta es: " . $resultado;
                    } elseif (isset($_POST['multiplicar'])) {
                        $resultado = $num1 * $num2;
                        echo "El resultado de la multiplicación es: " . $resultado;
                    } elseif (isset($_POST['dividir'])) {
                        if ($num2 != 0) {
                            $resultado = $num1 / $num2;
                            echo "El resultado de la división es: " . $resultado;
                        } else {
                            echo "No se puede dividir entre cero";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
