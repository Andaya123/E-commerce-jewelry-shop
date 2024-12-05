<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelrystore"; // Replace with your actual database name

// Establish a connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming you're getting the login credentials (username/email and password) from a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user data
    $sql = "SELECT user_id, username, password, account_status FROM users WHERE username = ? OR email = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $username, $username);  // Binding username or email
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $db_username, $db_password, $account_status);
            $stmt->fetch();

            // Check if the account is active
            if ($account_status == 'inactive') {
                echo "<script>alert('Your account is deactivated. Please contact the admin to activate it.');</script>";
            } else {
                // Verify the password (assuming you're storing the password in a hashed format)
                if (password_verify($password, $db_password)) {
                    // Start the session and log the user in
                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $db_username;
                    header("Location: dashboard.php"); // Redirect to the dashboard
                    exit();
                } else {
                    echo "<script>alert('Invalid password.');</script>";
                }
            }
        } else {
            echo "<script>alert('No user found with that username or email.');</script>";
        }

        $stmt->close();
    }
}

// Close connection
$mysqli->close();
?>
