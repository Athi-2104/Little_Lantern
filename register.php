<?php
include '../config/config.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($name) || empty($email) || empty($password)) {
    echo "<script>alert('All fields are required.'); window.location.href='../index.html';</script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    echo "<script>alert('Registration successful!'); window.location.href='../index.html';</script>";
} else {
    echo "<script>alert('Registration failed. Email may already exist.'); window.location.href='../index.html';</script>";
}
?>
