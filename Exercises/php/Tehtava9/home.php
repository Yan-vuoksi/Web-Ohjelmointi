<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Home - EcoTravel Finland</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>EcoTravel Finland</h1>
    <p>Explore Finland the eco-friendly way</p>
</header>

<?php include 'navigation.php'; ?>

<main>
    <h2>Welcome to EcoTravel!</h2>
    <p>We organize sustainable tours that let you experience the beauty of Finland while protecting nature.</p>

    <?php
    // Function to display a fact list
    function displayFacts($facts) {
        echo "<ul>";
        foreach ($facts as $fact) {
            echo "<li>$fact</li>";
        }
        echo "</ul>";
    }

    $ecoFacts = ["Zero-emission transport", "Eco-certified lodges", "Local organic food"];
    displayFacts($ecoFacts);
    ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>