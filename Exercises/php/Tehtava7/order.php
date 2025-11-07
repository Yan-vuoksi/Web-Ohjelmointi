<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Scooter Order</title>
    <style>
        /* Basic page setup */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 15px;
            color: #444;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
        }

        button {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<?php
function calculateShippingCost($toimitustapa) {
    switch ($toimitustapa) {
        case "nouto":
            return 0.00;
        case "postipaketti":
            return 6.90;
        case "kotiinkuljetus":
            return 12.50;
        default:
            return -1; // Invalid shipping method
    }
}
?>

    <form method="post" action="order.php">
        <h3>Product: Electric scooter (349,90 €/pcs)</h3>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <label for="delivery">Delivery method:</label>
        <select id="delivery" name="delivery_method" required>
            <option value="nouto">nouto</option>
            <option value="postipaketti">postipaketti</option>
            <option value="kotiinkuljetus">kotiinkuljetus</option>
        </select>

        <button type="submit">Calculate the price</button>
        <?php
// Check if the form has been sent
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $valittu_tapa = $_POST["delivery_method"];
    $price_per_unit = 349.90;
    $maara = $_POST["quantity"];
    $total_price = $price_per_unit * $maara;
    $hinta = calculateShippingCost($valittu_tapa);
if ($hinta != -1) {
    $final_price = $total_price + $hinta;
    echo "<h2>Order Summary</h2>";
    echo "Valittu toimitustapa: $valittu_tapa<br>";
    echo "Toimituskulut: " . number_format($hinta, 2, ',', '.') . " €<br>";
    echo "Yhteensä: " . number_format($final_price, 2, ',', '.') . " €<br>";
} else {
    echo "Virheellinen toimitustapa.";
}
}
?>
    </form>

</body>
</html>