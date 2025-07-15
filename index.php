<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Little Lantern - Login / Register</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 50px auto; text-align: center;">
  <h2>Login</h2>
  <form method="POST" action="auth/login.php">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
  </form>

  <hr style="margin: 40px 0;">

  <h2>Register</h2>
  <form method="POST" action="auth/register.php">
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>