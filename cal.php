<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h1>Multipurpose Calculator</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="number" name="num1" placeholder="Enter first number">
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>  </select>
        <input type="number" name="num2" placeholder="Enter second number">
        <input type="submit" value="Calculate">
    </form>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operator = $_POST["operator"];

        
            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 == 0) {
                        $error = "Error: Cannot divide by zero";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                case "^":
                    $result = $num1**$num2;  break;
            }
        }
    ?>

    <?php
    
        if (isset($result)) {
            echo "Result: $num1 $operator $num2 = $result";
        } else if (isset($error)) {
            echo $error;
        }
    ?>
</body>
</html>
