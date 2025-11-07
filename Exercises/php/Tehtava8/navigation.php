<?php
// Define the pages in an associative array (page name => file name)
$pages = [
    'Home' => 'homepage.php',
    'Products' => 'products.php',
    'Contact Information' => 'contact_information.php'
];

// Get the filename of the current page
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