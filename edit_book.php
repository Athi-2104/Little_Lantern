<?php
include '../config/config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title  = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre  = $_POST['genre'] ?? '';
    $year   = $_POST['year'] ?? 0;
    $status = $_POST['status'] ?? '';
    $price  = $_POST['price'] ?? 0;
    $image  = $_POST['image'] ?? '';

    $stmt = $conn->prepare("UPDATE books SET title = ?, author = ?, genre = ?, year = ?, status = ?, price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssisisi", $title, $author, $genre, $year, $status, $price, $image, $id);
    $stmt->execute();

    // Redirect with success message
    header("Location: ../main_page.php?updated=1");
    exit();
} else {
    // Display edit form
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if (!$book) {
        echo "Book not found.";
        exit;
    }

    // Check for success message
    $success = isset($_GET['success']) && $_GET['success'] == '1';
    ?>

    <?php if ($success): ?>
        <p style="color: green;">✅ Book updated successfully!</p>
    <?php endif; ?>

    <!-- Edit Form -->
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
        <input name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br>
        <input name="author" value="<?= htmlspecialchars($book['author']) ?>" required><br>
        <input name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required><br>
        <input type="number" name="year" value="<?= htmlspecialchars($book['year']) ?>" required><br>

        <select name="status">
            <option value="Available" <?= $book['status'] === 'Available' ? 'selected' : '' ?>>Available</option>
            <option value="Out of Stock" <?= $book['status'] === 'Out of Stock' ? 'selected' : '' ?>>Out of Stock</option>
        </select><br>

        <input type="number" name="price" value="<?= htmlspecialchars($book['price']) ?>" required><br>
        <input name="image" value="<?= htmlspecialchars($book['image']) ?>"><br>

        <button type="submit">Update Book</button>
    </form>

<?php } ?>
