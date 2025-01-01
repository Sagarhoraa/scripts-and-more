<?php
// Start the session
session_start();

// Database connection
$host = 'localhost';
$db = 'your_database_name';
$user = 'your_database_user';
$pass = 'your_database_password';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ?action=dashboard');
        exit;
    } else {
        echo "Invalid username or password.";
    }
}

// Handle logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: ?action=login');
    exit;
}

// Display login form
if (!isset($_SESSION['user_id']) && (!isset($_GET['action']) || $_GET['action'] == 'login')) {
    echo '
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    ';
    exit;
}

// Display dashboard
if (isset($_SESSION['user_id'])) {
    echo '
    <h1>Welcome to the Dashboard</h1>
    <a href="?action=logout">Logout</a>
    ';
    exit;
}
?>
