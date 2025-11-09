<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>EcoTravel Finland - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navigation.php'; ?>

<header class="hero">
    <div class="hero-content">
        <h1>EcoTravel Finland</h1>
        <p>Discover Finland’s breathtaking nature with sustainable travel experiences.</p>
        <a href="destinations.php" class="cta-btn">Explore Destinations</a>
    </div>
</header>

<main>
    <section class="features">
        <div class="feature-card">
            <img src="images/forest.jpg" alt="Forest">
            <h3>Nature Adventures</h3>
            <p>Experience the wild beauty of Finland’s forests, lakes, and national parks.</p>
        </div>
        <div class="feature-card">
            <img src="images/sustainable.jpg" alt="Sustainable">
            <h3>Sustainable Travel</h3>
            <p>Travel responsibly and support eco-friendly tourism initiatives.</p>
        </div>
        <div class="feature-card">
            <img src="images/community.jpg" alt="Community">
            <h3>Local Communities</h3>
            <p>Connect with local guides and enjoy authentic Finnish hospitality.</p>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
</body>
</html>