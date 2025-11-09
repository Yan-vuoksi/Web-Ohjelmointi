<?php
// Define site pages in an associative array
$pages = [
    "Home" => "home.php",
    "Destinations" => "destinations.php",
    "Checkout" => "checkout.php",
    "Contact" => "contact.php"
];

// Get current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <ul>
        <?php foreach ($pages as $name => $url): ?>
            <li class="<?php if ($current_page == $url) echo 'active'; ?>">
                <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>