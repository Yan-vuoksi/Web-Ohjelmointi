
<?php
$destination = isset($_GET['destination']) ? $_GET['destination'] : 'Unknown';

$trip_info = [
    "Lapland" => [
        "description" => "Lapland is Finland’s Arctic treasure — perfect for seeing the Northern Lights and experiencing snow adventures.",
        "base_price" => 500,
        "default_duration" => 5,
        "day_price" => 80 // price change per day
    ],
    "Saimaa" => [
        "description" => "Southern Finland offers lush forests and thousands of lakes — ideal for peaceful kayaking and cozy cabin stays.",
        "base_price" => 350,
        "default_duration" => 3,
        "day_price" => 60
    ],
    "Nuuksio National Park" => [
        "description" => "Lush forests and lakes, perfect for hiking and nature escapes.",
        "base_price" => 200,
        "default_duration" => 2,
        "day_price" => 40
    ],
    "Oulanka National Park" => [
        "description" => "Waterfalls, canyons, and vibrant wildlife. A paradise for hikers.",
        "base_price" => 300,
        "default_duration" => 4,
        "day_price" => 50
    ]
];

$info = $trip_info[$destination] ?? [
    "description" => "No information available.",
    "base_price" => 0,
    "default_duration" => 1,
    "day_price" => 0
];

$confirmation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $people = intval($_POST["people"]);
    $duration = intval($_POST["duration"]);
    $transport = $_POST["transport"];

    // Calculate cost per person based on duration
    $base_price = $info["base_price"];
    $default_duration = $info["default_duration"];
    $day_price = $info["day_price"];

    // Adjust price per person according to duration
    if ($duration > $default_duration) {
        $cost_per_person = $base_price + ($duration - $default_duration) * $day_price;
    } elseif ($duration < $default_duration) {
        $cost_per_person = $base_price - ($default_duration - $duration) * $day_price;
        if ($cost_per_person < 0) $cost_per_person = 0; // Prevent negative price
    } else {
        $cost_per_person = $base_price;
    }

    $total_cost = $cost_per_person * $people;

    $confirmation = "
    <div class='confirmation'>
        <h2>Trip Confirmed!</h2>
        <p>Destination: " . htmlspecialchars($destination) . "</p>
        <p>People: $people</p>
        <p>Duration: $duration days</p>
        <p>Transportation: " . htmlspecialchars($transport) . "</p>
        <p>Travel cost per person: " . number_format($cost_per_person, 2) . " €</p>
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
    <div class="circle-logo">
        <img src="images/logo.png" alt="EcoTravel Logo">
    </div>
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

            <label for="base_price">Basic cost per person (€):</label>
            <input type="text" id="base_price" name="base_price" value="<?php echo number_format($info["base_price"], 2); ?>" readonly style="background:#e6f2ec;">

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
        <p style="margin-top:16px; color:#40916c;">
            <strong>Note:</strong> The travel cost per person will increase if you add more days, and decrease if you choose fewer days.
        </p>
        <?php endif; ?>
    </div>
</main>
<?php include 'footer.php'; ?>
</body>
</html>