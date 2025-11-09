<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Contact - EcoTravel Finland</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Circle logo at top left -->
<header>
     <div class="circle-logo">
        <img src="images/logo.png" alt="EcoTravel Logo">
    </div>
    <h1>Contact Us</h1>
    <p>We’d love to hear from you!</p>
</header>

<?php include 'navigation.php'; ?>

<main>
    <?php
    $name = $email = $message = $contact = "";
    $success = false;
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST["name"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $message = htmlspecialchars(trim($_POST["message"]));
        $contact = $_POST["contact_method"];

        if (empty($name) || empty($email) || empty($message)) {
            $error = "Please fill out all fields.";
        } else {
            $success = true;

            // Optional: send email (works on servers with mail enabled)
            /*
            $to = "youremail@example.com";
            $subject = "New contact message from $name";
            $body = "Message: $message\nContact via: $contact\nEmail: $email";
            mail($to, $subject, $body);
            */
        }
    }
    ?>

    <h2 align="center">Send us a message</h2>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>

        <label for="contact_method">Preferred Contact Method:</label>
        <select name="contact_method">
            <option value="email" <?php if ($contact == "email") echo "selected"; ?>>Email</option>
            <option value="phone" <?php if ($contact == "phone") echo "selected"; ?>>Phone</option>
        </select>

        <label for="message">Message:</label>
        <textarea name="message" rows="4" required><?php echo $message; ?></textarea>

        <button type="submit">Send</button>
    </form>

    <?php
    if ($error) {
        echo "<p style='color:red; text-align:center;'>$error</p>";
    }

    if ($success) {
        echo "<div class='result' style='text-align:center; background:#e6f4ea; padding:15px; border-radius:8px;'>";
        echo "<h3>Thank you, $name!</h3>";
        echo "<p>We will contact you soon via <strong>$contact</strong>.</p>";
        echo "</div>";
    }
    ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>