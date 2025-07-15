<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Your Cart 🛒</h1>
        <?php if (count($cart) === 0): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Author</th>
                        <th class="p-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; foreach ($cart as $item): $total += $item['price']; ?>
                    <tr class="border-b">
                        <td class="p-2"><?= $item['title'] ?></td>
                        <td class="p-2"><?= $item['author'] ?></td>
                        <td class="p-2">₹<?= $item['price'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="font-bold">
                        <td colspan="2" class="p-2 text-right">Total:</td>
                        <td class="p-2">₹<?= $total ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
