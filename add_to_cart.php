<?php
session_start();
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);

    $result = $conn->query("SELECT * FROM books WHERE id = $book_id");
    $book = $result->fetch_assoc();

    if ($book) {
        $_SESSION['cart'][$book_id] = $book;
        header("Location: ../main_page.php?added=$book_id");
        exit();
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid request.";
}
?>
