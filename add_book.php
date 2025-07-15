<?php
include '../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO books (title, author, genre, year, status, price, image)
            VALUES ('$title', '$author', '$genre', '$year', '$status', '$price', '$image')";
    if ($conn->query($sql)) {
        header("Location: ../main_page.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    <input name="title" placeholder="Title" required><br>
    <input name="author" placeholder="Author" required><br>
    <input name="genre" placeholder="Genre" required><br>
    <input type="number" name="year" placeholder="Year" required><br>
    <select name="status">
        <option value="Available">Available</option>
        <option value="Out of Stock">Out of Stock</option>
    </select><br>
    <input type="number" name="price" placeholder="Price" required><br>
    <input name="image" placeholder="Image URL"><br>
    <button type="submit">Add Book</button>
</form>
