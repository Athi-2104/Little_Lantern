<?php
include '../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre',
            year='$year', status='$status', price='$price', image='$image' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: ../main_page.php");
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>
