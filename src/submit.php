<?php

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (!$name || !$email || !$message) {
    echo "All fields are required";
    exit;
}

$host = "mysql";       // container name
$db   = "feedback_app";
$user = "appuser";
$pass = "apppass";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection failed");
}

$stmt = $conn->prepare(
    "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)"
);

$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

echo "Thank you! Your message has been saved in DB.";

$stmt->close();
$conn->close();
