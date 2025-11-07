<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Products - Our Company</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ddd;
            font-size: 18px;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        nav ul li a:hover {
            background-color: #555;
            color: white;
        }

        nav ul li.active a {
            background-color: #007bff;
            color: white;
        }

        main {
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'navigation.php'; ?>
    </header>
    <main>
        <h1>Our Products</h1>
        <p>Explore the latest items we offer, including electric scooters and accessories.</p>
    </main>
</body>
</html>