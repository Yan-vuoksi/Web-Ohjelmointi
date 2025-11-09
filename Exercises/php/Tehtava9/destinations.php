<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Destinations - EcoTravel Finland</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="circle-logo">
        <img src="images/logo.png" alt="EcoTravel Logo">
    </div>
    <h1>Our Destinations</h1>
    <p>Discover Finland's most breathtaking eco-locations</p>
</header>

<?php include 'navigation.php'; ?>

<main>
    <h2 align="center">Top Eco Destinations</h2>

    <div class="destinations-container">
        <?php
        // Each destination has a name, region, and image filename
        $destinations = [
            ["Lapland", "northern", "lapland.jpg"],
            ["Saimaa", "southern", "saimaa.jpg"],
            ["Nuuksio National Park", "southern", "nuuksio.jpg"],
            ["Oulanka National Park", "central", "oulanka.jpg"]
        ];

        // Loop through destinations and use switch for descriptions
        foreach ($destinations as $place) {
            $name = $place[0];
            $region = $place[1];
            $image = $place[2];
            $description = "";

            switch ($region) {
                case "northern":
                    $description = "Lapland is Finland’s Arctic treasure — perfect for seeing the Northern Lights and experiencing snow adventures in pure silence.";
                    break;
                case "southern":
                    $description = "Southern Finland offers lush forests and thousands of lakes — ideal for peaceful kayaking and cozy cabin stays.";
                    break;
                case "central":
                    $description = "Central Finland is full of waterfalls, canyons, and vibrant wildlife. A paradise for hikers and photographers.";
                    break;
                default:
                    $description = "Explore Finland’s untouched beauty in every direction.";
            }

            echo "
            <div class='destination-card'>
                <div class='image-container'>
                 <a href='checkout.php?destination=" . urlencode($name) . "' style='text-decoration:none'>
                    <img src='images/$image' alt='$name' />

                    <div class='overlay'>
                        <h3>$name</h3>
                    </div>
                </div>
                <p class='destination-description'>$description</p>
            </div>
            ";
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>
</body>
</html>