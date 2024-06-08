<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypermarket Price Calculator</title>
</head>
<body>
    <h1>Hypermarket Price Calculator</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "Product $i Buying Price (KSH): <input type='number' name='price_$i' required><br>";
            }
        ?>
        VAT (%): <input type="number" name="vat" required><br>
        General Expense (%): <input type="number" name="expense" required><br>
        Profit Margin (%): <input type="number" name="profit" required><br>
        <button type="submit">Calculate</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prices = array();
            for ($i = 1; $i <= 10; $i++) {
                $prices[$i] = $_POST["price_$i"];
            }
            $vat = $_POST['vat'] / 100;
            $expense = $_POST['expense'] / 100;
            $profit = $_POST['profit'] / 100;

            echo "<h2>Results</h2>";
            echo "<table><thead><tr><th>Product</th><th>VAT (KSH)</th><th>General Expense (KSH)</th><th>Profit (KSH)</th><th>Selling Price (KSH)</th></tr></thead><tbody>";
            foreach ($prices as $key => $price) {
                $vat_amount = $price * $vat;
                $expense_amount = $price * $expense;
                $profit_amount = $price * $profit;
                $selling_price = $price + $vat_amount + $expense_amount + $profit_amount;
                echo "<tr><td>Product $key</td><td>$vat_amount</td><td>$expense_amount</td><td>$profit_amount</td><td>$selling_price</td></tr>";
            }
            echo "</tbody></table>";
        }
    ?>
</body>
</html>
