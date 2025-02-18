<?php
// index.php

// Start the session
session_start();

// Include necessary files
require_once '../config/config.php';
require_once '../lib/functions.php';

// Autoload classes
spl_autoload_register(function ($class_name) {
    include '../classes/' . $class_name . '.php';
});

// Example usage of a class
$example = new ExampleClass();
$example->doSomething();

// Include the header
include '../templates/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Project</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Welcome to My PHP Project</h1>
    <p>This is the index page.</p>

    <?php
    // Include the footer
    include '../templates/footer.php';
    ?>
</body>
</html>