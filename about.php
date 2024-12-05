<?php
// about.php
include 'db.php'; // Include the database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Soft, neutral background */
            color: #333; /* Dark grey text for better readability */
        }

        header {
            background-image: url('https://example.com/hero-jewelry-bg.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 80px 20px;
            color: #fff;
            position: relative;
            background-color: rgba(0, 0, 0, 0.4); /* Slight dark overlay */
        }

        header h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin: 0;
        }

        header p {
            font-size: 1.4rem;
            margin-top: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            color: #6c5b3d; /* Muted goldish tone for a calm touch */
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.8;
            text-align: center;
            margin-bottom: 20px;
            color: #555; /* Softer text color */
        }

        .highlight {
            color: #6c5b3d; /* Muted goldish highlight */
            font-weight: bold;
        }

        .cta {
            text-align: center;
            margin-top: 30px;
        }

        .cta a {
            text-decoration: none;
            color: #fff;
            background: #6c5b3d; /* Muted gold */
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .cta a:hover {
            background: #4e3b2f; /* Darker gold for hover effect */
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: white;
            font-size: 0.9rem;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php
    // Updated query to use `about_id`
    $query = "SELECT * FROM about WHERE about_id = 1"; // Replace 'about' with your table name
    $result = $mysqli->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        $company_name = "Jewelry and Accessories"; // Hardcoded name
        $description = $row['description']; // Replace with actual column name
    } else {
        $company_name = "Jewelry and Accessories";
        $description = "Crafting timeless jewelry for every moment.";
    }
    ?>
    <header>
        <h1><?php echo htmlspecialchars($company_name); ?></h1>
        <p><?php echo htmlspecialchars($description); ?></p>
    </header>
    <div class="container">
        <h2>Welcome to <span class="highlight"><?php echo htmlspecialchars($company_name); ?></span></h2>
        <p>
            We are passionate about delivering high-quality jewelry that speaks of elegance, class, and timeless beauty. 
            Our journey began with the vision to craft exceptional pieces that resonate with your style and moments.
        </p>
        <p>
            At <span class="highlight"><?php echo htmlspecialchars($company_name); ?></span>, each piece of jewelry is designed with 
            precision, care, and a commitment to excellence. From necklaces to rings, every item is made to celebrate life's 
            most precious moments.
        </p>
        <div class="cta">
            <a href="shop.php">Explore Our Collection</a>
        </div>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($company_name); ?>. All rights reserved.</p>
    </footer>
</body>
</html>
