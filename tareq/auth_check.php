<?php
session_start();

if (!isset($_SESSION['admin_log_in'])) {

    // Redirect to login with redirect path
    header("Location: login.php?redirect=" . urlencode($_GET['path']));
    exit();
}

// User is logged in → continue to actual file
$path = $_GET['path'];

// Default page
if ($path == "" || $path == "/") {
    $path = "index.php";
}

// Security: Prevent directory traversal
$path = str_replace("..", "", $path);

// Load requested file
if (file_exists($path)) {
    include $path;
} else {
    echo "404 - Page not found";
}
?>
