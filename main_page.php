<?php
session_start();
include 'config/config.php';
$books = $conn->query("SELECT * FROM books");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Lantern - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/163ce4a9-1e62-47b3-9196-31ef83cd87bb.png" class="h-10 w-10" alt="Logo">
            <h1 class="text-xl font-bold text-gray-800">Little Lantern</h1>
        </div>
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-700 hover:text-amber-700">Home</a>
            <a href="store/cart.php" class="text-gray-700 hover:text-amber-700">Cart 🛒</a>
        </nav>
    </div>
</header>

<div class="container mx-auto px-4 mt-4">
<?php if (isset($_GET['added'])): ?>
    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
        Book successfully added to cart!
    </div>
<?php endif; ?>

<?php if (isset($_GET['updated'])): ?>
    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
        ✅ Book updated successfully!
    </div>
<?php endif; ?>
</div>

<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">All Books</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php while($book = $books->fetch_assoc()): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="<?= $book['image'] ?? 'https://via.placeholder.com/200x300' ?>" class="w-full h-64 object-cover" alt="Book Cover">
                <div class="p-4">
                    <h4 class="font-bold text-lg mb-1"><?= htmlspecialchars($book['title']) ?></h4>
                    <p class="text-gray-600 text-sm mb-2"><?= htmlspecialchars($book['author']) ?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-amber-600 font-bold">₹<?= htmlspecialchars($book['price']) ?></span>
                        <div class="flex flex-col items-end space-y-1">
    <form action="store/add_to_cart.php" method="POST">
        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
        <button type="submit" class="bg-amber-600 text-white px-3 py-1 rounded text-sm hover:bg-amber-700 transition">Add</button>
    </form>
    <a href="store/edit_book.php?id=<?= $book['id'] ?>" class="text-blue-600 text-sm">Edit</a>
    <a href="store/delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')" class="text-red-600 text-sm">Delete</a>
</div>

                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="text-center">© <?= date("Y") ?> Little Lantern. All rights reserved.</div>
</footer>

</body>
</html>
