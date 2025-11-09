
<?php
$destination = isset($_GET['destination']) ? $_GET['destination'] : 'Unknown';

$trip_info = [
    "Lapland" => [
        "description" => "Lapland is Finland’s Arctic treasure — perfect for seeing the Northern Lights and experiencing snow adventures.",
        "base_price" => 500,
        "default_duration" => 5
    ],
    "Saimaa" => [
        "description" => "Southern Finland offers lush forests and thousands of lakes — ideal for peaceful kayaking and cozy cabin stays.",
        "base_price" => 350,
        "default_duration" => 3
    ],
    "Nuuksio National Park" => [
        "description" => "Lush forests and lakes, perfect for hiking and nature escapes.",
        "base_price" => 200,
        "default_duration" => 2
    ],
    "Oulanka National Park" => [
        "description" => "Waterfalls, canyons, and vibrant wildlife. A paradise for hikers.",
        "base_price" => 300,
        "default_duration" => 4
    ]
];

$info = $trip_info[$destination] ?? [
    "description" => "No information available.",
    "base_price" => 0,
    "default_duration" => 1
];

$confirmation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $people = intval($_POST["people"]);
    $cost_per_person = floatval($_POST["cost_per_person"]);
    $duration = intval($_POST["duration"]);
    $transport = $_POST["transport"];
    $total_cost = $cost_per_person * $people;

    $confirmation = "
    <div class='confirmation'>
        <h2>Trip Confirmed!</h2>
        <p>Destination: " . htmlspecialchars($destination) . "</p>
        <p>People: $people</p>
        <p>Duration: $duration days</p>
        <p>Transportation: " . htmlspecialchars($transport) . "</p>
        <p><strong>Total Cost: " . number_format($total_cost, 2) . " €</strong></p>
    </div>
    ";
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Checkout - <?php echo htmlspecialchars($destination); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navigation.php'; ?>
<header>
    <h1>Checkout</h1>
    <p>Complete your eco-friendly trip booking below</p>
</header>
<main>
    <div class="checkout-container">
        <h2>Checkout: <?php echo htmlspecialchars($destination); ?></h2>
        <p><?php echo htmlspecialchars($info["description"]); ?></p>
        <?php if ($confirmation): ?>
            <?php echo $confirmation; ?>
        <?php else: ?>
        <form method="post">
            <label for="people">Number of people:</label>
            <input type="number" id="people" name="people" min="1" value="1" required>

            <label for="cost_per_person">Travel cost per person (€):</label>
            <input type="number" id="cost_per_person" name="cost_per_person" min="0" step="0.01" value="<?php echo $info["base_price"]; ?>" required>

            <label for="duration">Duration (days):</label>
            <input type="number" id="duration" name="duration" min="1" value="<?php echo $info["default_duration"]; ?>" required>

            <label for="transport">Transportation type:</label>
            <select id="transport" name="transport" required>
                <option value="Train">Train</option>
                <option value="Bus">Bus</option>
                <option value="Car">Car</option>
                <option value="Plane">Plane</option>
            </select>

            <button type="submit">Confirm Selection</button>
        </form>
        <?php endif; ?>
    </div>
</main>
<?php include 'footer.php'; ?>
</body>
</html>